<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi; // Import the Registrasi model
use Illuminate\Database\Eloquent\ModelNotFoundException; // Import exception class

class CetakController extends Controller
{
    public function cetak($id)
    {
        try {
            $register = Registrasi::findOrFail($id); // Retrieve the register by ID
            return view('registrasi.cetak', compact('cetak')); // Pass the register to the view
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404); // Return a 404 error view if not found
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => 'required|date',
            'telp' => 'required|numeric',
            'buku' => 'required|integer',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'status' => 'required|integer',
            'alamat' => 'required|string',
        ]);

            $registrasi = new Registrasi();
            $registrasi->nama = $request->nama;
            $registrasi->email = $request->email;
            $registrasi->telp = $request->telp;
            $registrasi->buku_id= $request->buku;
            $registrasi->tanggal_peminjaman = $request->tanggal_peminjaman; // New field
            $registrasi->tanggal_pengembalian = $request->tanggal_pengembalian; // New field
            $registrasi->status_id = $request->status;
            $registrasi->alamat = $request->alamat;
            $registrasi->save();

            return redirect('/registrasi')->with('pesan', 'Pendaftaran berhasil');
    }

    public function downloadPDF($id)
    {
        $registrasi = Registrasi::find($id); // Retrieve the registration record
        $pdf = app('dompdf.wrapper'); // Create a new PDF instance
        $pdf->loadView('registrasi.cetak', compact('registrasi')); // Load the view with the registration data
        return $pdf->download('registrasi' . $registrasi->id . '.pdf'); // Download the PDF
    }
}
