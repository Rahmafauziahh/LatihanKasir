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
 <form action='{{ route('pembayaran.store') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nama_pembayaran" class="col-sm-2 col-form-label">Nama Pembayaran</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_pembayaran' id="nama_pembayaran">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_pembayaran" class="col-sm-2 col-form-label">Jenis Pembayaran</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jenis_pembayaran' id="jenis_pembayaran">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      </form>
    </div>
    <!-- AKHIR FORM -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>