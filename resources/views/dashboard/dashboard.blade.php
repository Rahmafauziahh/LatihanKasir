@extends('kerangka.master')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <h3 class="mb-4">Dashboard Kasir</h3>
            <div class="row">
                <!-- Total Penjualan Hari Ini -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Penjualan Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0">Rp 5.000.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Transaksi -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-receipt-cutoff"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Transaksi</h6>
                                    <h6 class="font-extrabold mb-0">250</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Produk Terjual -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Produk Terjual</h6>
                                    <h6 class="font-extrabold mb-0">1.200</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Stok Produk Tersisa -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi bi-box"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Stok Produk</h6>
                                    <h6 class="font-extrabold mb-0">800</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 

@endsection
