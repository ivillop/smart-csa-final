<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluars = SuratKeluar::all();
        return view('surat-keluar.index', compact('suratKeluars'));
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $data = $request->all();
        $data['tanggal_dibuat'] = now();
        $data['dibuat_oleh'] = auth()->id();

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('file_surat', 'public');
        }

        SuratKeluar::create($data);
        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil ditambahkan');
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('file_surat', 'public');
        }

        $suratKeluar->update($data);
        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil diperbarui');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        $suratKeluar->delete();
        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil dihapus');
    }
}
