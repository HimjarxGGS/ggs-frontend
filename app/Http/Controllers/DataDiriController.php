<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    public function index()
    {
        return view('member..datadiri.index');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'instansi' => 'nullable|string|max:255',
            'usia' => 'nullable|integer',
            'telepon' => 'nullable|string|max:20',
            'riwayat_penyakit' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);        
        dd($request->all());
    }
}
