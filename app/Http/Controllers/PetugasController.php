<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $petugas=Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
        
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'no_telp.required' => 'Password wajib diisi',
            'alamat.required' => 'Alamat wajib diisi'
        ]);

        Petugas::create($request->all());
        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $petugas = Petugas::findOrFail($id);
    return view('petugas.edit', compact('petugas'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required'=> 'Nama wajib diisi',
            'email.required'=> 'Email wajib diisi',
            'password.required'=> 'Password wajib diisi',
            'no_telp.required'=> 'NO.Hp wajib diisi',
            'alamat.required'=> 'Alamat wajib diisi',
        ]);
        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->all());

        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Find Petugas by ID and delete
         $data = Petugas::findOrFail($id);
         $data->delete();
 
         // Redirect back to petugas list with a succes massage
         return redirect()->route('petugas.index')->with('succes', 'Data konsumen berhasil dihapus!');
    }
}
