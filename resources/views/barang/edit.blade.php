<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

@if ($errors->any())
  <div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
  </div>  
@endif

<!-- START FORM -->
<form action='{{ route('barang.update', $barang->id) }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="kd_barang" class="col-sm-2 col-form-label">KODE</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kd_barang' value="{{ $barang->kd_barang }}" id="kd_barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_produk" class="col-sm-2 col-form-label">Jenis Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_produk' value="{{ $barang->id_produk }}" id="id_produk">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_produk' value="{{ $barang->nama_produk }}" id="nama_produk">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga' value="{{ $barang->harga }}" id="harga">
            </div>
        <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='stok' value="{{ $barang->stok }}" id="stok">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
