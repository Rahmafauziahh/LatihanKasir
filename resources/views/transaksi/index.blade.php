@extends ('kerangka.master')
@section ('content')
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{ route('transaksi.create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Jenis Pembayaran</th>
                <th>Total Bayar</th>
                <th>Kembalian</th>
                <th>Uang Pembeli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           

        </tbody>
    </table>

</div>
<!-- AKHIR DATA -->
@endsection
