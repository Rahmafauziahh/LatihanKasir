<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang; // Model Barang untuk data produk
use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        
        return view('transaksi.index');
    }

    public function create()
    {
        $barang = Barang::all();
        $pembayarans = JenisPembayaran::all();
        return view('transaksi.create', compact('barang','pembayarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksis',
            'id_produk' => 'required|exists:barang,id_produk',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
            ' '
        ]);

        Transaksi::create($request->all());
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('barang')->findOrFail($id);
        return view('transaksis.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::all();
        return view('transaksis.edit', compact('transaksi', 'barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksis,kode_transaksi,'.$id,
            'id_produk' => 'required|exists:barang,id_produk',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_produk', 'id_produk');
    }

}
