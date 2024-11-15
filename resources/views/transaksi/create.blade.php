@extends('kerangka.master')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h5>Tambah Transaksi</h5>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                
                <!-- Input Barang -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="barang_id">Jenis Barang</label>
                            <select id="barang_id" name="barang_id" class="form-control">
                                <option value="" disabled selected>Pilih Barang</option>
                                @foreach($barang as $item)
                                    <option value="{{ $item->id }}" data-harga="{{ $item->harga }}" data-stok="{{ $item->stok }}">
                                        {{ $item->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" id="harga" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" id="stok" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="number" id="qty" class="form-control" min="1">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-secondary mt-4" id="add-barang">Tambah Barang</button>
                    </div>
                </div>

                <!-- Daftar Barang -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Jenis Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="barang-list"></tbody>
                </table>

                <!-- Total Harga -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
                        </div>
                    </div>
                </div>

                <!-- Data Transaksi -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="text" class="form-control" name="tgl_transaksi" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis_pembayaran_id">Jenis Pembayaran</label>
                            <select name="jenis_pembayaran_id" id="jenis_pembayaran_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                                 @foreach($pembayarans as $pembayaran)
                                    <option value="{{ $pembayaran->id }}">{{ $pembayaran->nama_pembayaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Uang Pembeli dan Kembalian -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="uang_pembeli">Uang Pembeli</label>
                            <input type="number" name="uang_pembeli" class="form-control" id="uang_pembeli" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kembalian">Kembalian</label>
                            <input type="number" name="kembalian" class="form-control" id="kembalian" readonly>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" disabled>Simpan Transaksi</button>
            </form>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let totalHarga = 0;
        const barangList = document.getElementById('barang-list');
        const totalHargaInput = document.getElementById('total_harga');
        const submitButton = document.querySelector('button[type="submit"]');

        // Mengambil harga dan stok ketika barang dipilih
        document.getElementById('barang_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('harga').value = selectedOption.getAttribute('data-harga');
            document.getElementById('stok').value = selectedOption.getAttribute('data-stok');
        });

        // Menambahkan barang ke dalam list transaksi
        document.getElementById('add-barang').addEventListener('click', function() {
            const barangSelect = document.getElementById('barang_id');
            const harga = parseFloat(document.getElementById('harga').value) || 0;
            const stok = parseInt(document.getElementById('stok').value) || 0;
            const qty = parseInt(document.getElementById('qty').value) || 0;
            const selectedBarangText = barangSelect.options[barangSelect.selectedIndex].text;
            const barangId = barangSelect.value;

            // Validasi input
            if (!barangId || qty <= 0 || qty > stok) {
                alert("Mohon masukkan barang yang valid dan pastikan jumlah tidak melebihi stok.");
                return;
            }

            const subtotal = harga * qty;
            totalHarga += subtotal;

            // Menambahkan barang ke tabel
            const row = `<tr>
                <td><input type="hidden" name="barang_id[]" value="${barangId}">${selectedBarangText}</td>
                <td>${harga}</td>
                <td><input type="hidden" name="qty[]" value="${qty}">${qty}</td>
                <td>${subtotal}</td>
                <td><button type="button" class="btn btn-danger remove-item">Hapus</button></td>
            </tr>`;
            barangList.insertAdjacentHTML('beforeend', row);
            totalHargaInput.value = totalHarga;

            // Mengosongkan input setelah menambahkan barang
            barangSelect.selectedIndex = 0;
            document.getElementById('harga').value = '';
            document.getElementById('stok').value = '';
            document.getElementById('qty').value = '';

            toggleSubmitButton();
        });

        // Menghitung kembalian berdasarkan total harga dan uang pembeli
        document.getElementById('uang_pembeli').addEventListener('input', function() {
            const uangPembeli = parseFloat(this.value) || 0;
            const kembalian = uangPembeli - totalHarga;
            document.getElementById('kembalian').value = kembalian >= 0 ? kembalian : 0;
        });

        // Menghapus barang dari tabel dan memperbarui total harga
        barangList.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                const row = event.target.closest('tr');
                const subtotal = parseFloat(row.cells[3].textContent) || 0;
                totalHarga -= subtotal;
                row.remove();
                totalHargaInput.value = totalHarga;

                toggleSubmitButton();
            }
        });

        // Fungsi untuk mengaktifkan atau menonaktifkan tombol submit
        function toggleSubmitButton() {
            submitButton.disabled = barangList.children.length === 0;
        }

        toggleSubmitButton();
    });
</script>

@endsection
