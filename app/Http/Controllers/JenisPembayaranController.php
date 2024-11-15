<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    public function index(){
        $pembayaran= JenisPembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }
    public function create(){
        return view ('pembayaran.create');
    }
    public function store (Request $request){
        $request->validate([
            'nama_pembayaran' => 'required',
            'jenis_pembayaran' => 'required',
        ]);
        JenisPembayaran::create([
            'nama_pembayaran' => $request->nama_pembayaran ,
            'jenis_pembayaran' =>$request->jenis_pembayaran,
        ]);
        return redirect()->route('pembayaran.index')->with('success', 'data berhasil di tambahkan');
    }

    public function edit($id)
    {
        return view('pembayaran.edit');
    }
    public function destroy($id)
    {
        return redirect()->route('haha');
    }

}
