<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::get();

        $count = $data->count();

        return view('Buku.index', compact('data', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
        ]);

        $Buku = new Buku();
        $Buku->nama = $request->nama;
        $Buku->save();

        return redirect('/Buku')->with('pesan', 'Data berhasil disimpan');
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
        $Buku = Buku::find($id);
        return view('Buku.edit', compact('Buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
        ]);
        $Buku = Buku::find($id);
        $Buku->nama = $request->input('nama');
        $Buku->save();

        return redirect('/Buku')->with('pesan', 'Item updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Buku = Buku::find($id);
        $Buku->delete();

        return redirect('/Buku');
    }
}
