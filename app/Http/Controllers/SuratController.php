<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class SuratController extends Controller
{
    public function create(){
        $semuaSurat = Surat::with('penduduk')->get();
        return view('surat', compact('semuaSurat'));
        
    }
    
}
