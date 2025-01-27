<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Registrasi;
use App\Models\Status; // Import Status model
use App\Models\Buku; // Import Buku model
use Illuminate\Support\Facades\Log; // Import Log facade

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agama = Agama::get();
        $status = Status::get(); // Fetch status options
        $buku = Buku::get(); // Fetch book options
        $data = Registrasi::with(['agama', 'status'])->get(); // Fetch registration data with relationships

        return view('registrasi.index', compact('agama', 'status', 'buku', 'data')); // Pass data to the view
    }

    public function create()
    {
        $agama = Agama::get(); // Fetch agama options
        $status = Status::get(); // Fetch status options
        $buku = Buku::get(); // Fetch book options
        return view('registrasi.create', compact('agama', 'buku','status')); // Pass agama and buku to the view
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => 'required|date',
            'telp' => 'required|numeric',
            'status' => 'required|integer',
            'agama' => 'required|integer',
            'buku' => 'required|integer',
            'alamat' => 'required|string',
        ]);

        try {
            $registrasi = new Registrasi();
            $registrasi->nama = $request->nama;
            $registrasi->email = $request->email;
            $registrasi->tanggal_lahir = $request->tanggal_lahir;
            $registrasi->telp = $request->telp;
            $registrasi->status_id = $request->status; // Updated to status_id
            $registrasi->agama_id = $request->agama;
            $registrasi->alamat = $request->alamat;
            $registrasi->tanggal_peminjaman = $request->tanggal_peminjaman; // New field
            $registrasi->tanggal_pengembalian = $request->tanggal_pengembalian; // New field
            $registrasi->jumlah_buku_tersisa = $request->jumlah_buku_tersisa; // New field
            $registrasi->buku_id= $request->buku;
            $registrasi->save();

            return redirect('/registrasi/index')->with('pesan', 'Pendaftaran berhasil');
        } catch (\Exception $e) {
            Log::error('Error saving registration: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Data could not be saved.']);
        }
    }

    public function cetak($id)
    {
        $registrasi = Registrasi::find($id);
        return view('registrasi.cetak', compact('registrasi'));
    }

    public function downloadPDF($id)
    {
        $registrasi = Registrasi::find($id);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('cetak', compact('registrasi'));
        return $pdf->download('registrasi'. $registrasi->id.'.pdf');
    }
}
