@extends('layouts.app')
@section('content')
<h1>Detail Transaksi: {{ $transaksi->kode_transaksi }}</h1>
<p>Produk: {{ $transaksi->barang->nama_produk }}</p>
<p>Jumlah: {{ $transaksi->jumlah }}</p>
<p>Total Harga: {{ $transaksi->total_harga }}</p>
<p>Tanggal Transaksi: {{ $transaksi->tanggal_transaksi }}</p>
<a href="{{ route('transaksis.index') }}">Kembali</a>
@endsection
