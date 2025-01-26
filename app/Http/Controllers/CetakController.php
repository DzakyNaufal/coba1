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
            return view('registrasi.cetak', compact('registrasi')); // Pass the register to the view
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404); // Return a 404 error view if not found
        }
    }
}
