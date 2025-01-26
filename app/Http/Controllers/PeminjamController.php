<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam; // Ensure the Peminjam model is imported
use Illuminate\Support\Facades\Log; // Import Log class

class PeminjamController extends Controller
{
    public function index()
    {
        $data = Peminjam::all(); // Fetch all borrowing records
        $count = $data->count();
        return view('peminjam.index', compact('data', 'count')); // Pass data to the view
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'telp' => 'required|numeric',
            'alamat' => 'required|string',
            'status' => 'required|string',
            'judul_buku' => 'required|string',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
        ]);

        // Create a new borrowing record
        Peminjam::create($validated);

        // Redirect back with a success message
        return redirect()->route('peminjam.index')->with('success', 'Data peminjaman berhasil disimpan.');
    }
}
