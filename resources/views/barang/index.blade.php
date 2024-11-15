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
      <a href='{{ route('barang.create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $item->nama_produk }}</td> <!-- Nama Produk -->
                    <td>{{ $item->harga }}</td>       <!-- Harga -->
                    <td>{{ $item->stok }}</td>        <!-- Stok -->
                <td>
                    <a href='{{ route('barang.edit', ['id' => $item->id]) }}' class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <form action="{{ route('barang.destroy', ['id' => $item->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $barang->links() }} --}}
</div>
<!-- AKHIR DATA -->
@endsection
