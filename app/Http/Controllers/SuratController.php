<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaSurat = Surat::with('penduduk')->get();
        return view('surat', compact('semuaSurat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penduduk = Penduduk::all();
        return view('surat.create', compact('penduduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:50|unique:surats,nomor_surat',
            'jenis_surat' => 'required|string|max:100',
            'tanggal_ajuan' => 'required|date',
            'penduduk_id' => 'required|exists:penduduks,id',
            'berkas_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('berkas_pendukung')) {
            $namaFile = time() . '_' . $request->file('berkas_pendukung')->getClientOriginalName();
            $path = $request->file('berkas_pendukung')->storeAs('berkas_surat', $namaFile, 'public');

            $validated['berkas_pendukung'] = $path;
        }


        Surat::create($validated);

        return redirect()->route('surat.create')
            ->with('success', 'Surat berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat = Surat::with('penduduk')->findOrFail($id);
        return view('surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat = Surat::findOrFail($id);
        $penduduk = Penduduk::all();
        return view('surat.edit', compact('surat', 'penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:50|unique:surats,nomor_surat,' . $id,
            'jenis_surat' => 'required|string|max:100',
            'tanggal_ajuan' => 'required|date',
            'penduduk_id' => 'required|exists:penduduks,id',
            'berkas_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:2048',
        ]);

        $surat = Surat::findOrFail($id);

        if ($request->hasFile('berkas_pendukung')) {
            if ($surat->berkas_pendukung) {
                Storage::disk('public')->delete($surat->berkas_pendukung);
            }
            $namaFile = time() . '_' . $request->file('berkas_pendukung')->getClientOriginalName();
            $path = $request->file('berkas_pendukung')->storeAs('berkas_surat', $namaFile, 'public');
            $validated['berkas_pendukung'] = $path;
        }

        $surat->update($validated);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = Surat::findOrFail($id);
        if ($surat->berkas_pendukung) {
            Storage::disk('public')->delete($surat->berkas_pendukung);
        }
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }

    public function uploadBerkas(Request $request, string $id)
    {
        $request->validate([
            'berkas_pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $surat = Surat::findOrFail($id);

        if ($request->hasFile('berkas_pendukung')) {
            if ($surat->berkas_pendukung) {
                Storage::disk('public')->delete($surat->berkas_pendukung);
            }

            $namaFile = time() . '_' . $request->file('berkas_pendukung')->getClientOriginalName();
            $path = $request->file('berkas_pendukung')->storeAs('berkas_surat', $namaFile, 'public');
            $surat->update(['berkas_pendukung' => $path]);
        }

        return redirect()->route('surat.index')->with('success', 'Berkas pendukung berhasil diupload.');
    }

    public function cetakPdf(string $id)
    {
        $surat = Surat::findOrFail($id);

        $pdf = Pdf::loadView('surat.cetak', compact('surat'));

        $namaFile = 'Surat_Kelurahan_' . str_replace(['/', '\\'], '_', $surat->nomor_surat) . '.pdf';
        return $pdf->stream($namaFile);
    }
}
