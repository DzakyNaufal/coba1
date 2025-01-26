<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Buku;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all(); // Fetch all penulis data
        $buku = Buku::all(); // Fetch all buku data
        return view('admin.dashboard', compact('penulis', 'buku')); // Return the admin dashboard view
    }
}
