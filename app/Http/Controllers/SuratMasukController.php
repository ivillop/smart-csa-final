<?php

namespace App\Http\Controllers;

use App\Models\DisposisiSurat;
use App\Models\RevisiSurat;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $disposisiSurats = DisposisiSurat::all();
        $revisiSurats = RevisiSurat::all();
        return view('surat-masuk.index', compact('disposisiSurats', 'revisiSurats'));
    }

    public function createDisposisi()
    {
        return view('surat-masuk.create-disposisi');
    }

    public function storeDisposisi(Request $request)
    {
        $request->validate([
            'pemberi_disposisi' => 'required|string',
            'penerima_disposisi' => 'required|string',
            'instruksi_disposisi' => 'required|string',
            'status_disposisi' => 'required|string|in:Pending,In Progress,Completed',
        ]);

        DisposisiSurat::create($request->all());
        return redirect()->route('surat-masuk.index')->with('success', 'Disposisi Surat berhasil ditambahkan');
    }

    public function createRevisi()
    {
        return view('surat-masuk.create-revisi');
    }

    public function storeRevisi(Request $request)
    {
        $request->validate([
            'pemberi_revisi' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx',
            'status_revisi' => 'required|string|in:Pending,In Progress,Completed',
        ]);

        $file_surat = $request->file('file_surat') ? $request->file('file_surat')->store('revisi_surat_files', 'public') : null;

        RevisiSurat::create([
            'pemberi_revisi' => $request->input('pemberi_revisi'),
            'file_surat' => $file_surat,
            'status_revisi' => $request->input('status_revisi'),
        ]);

        return redirect()->route('surat-masuk.index')->with('success', 'Revisi Surat berhasil ditambahkan');
    }

    public function destroyDisposisi($id)
    {
        $disposisi = DisposisiSurat::findOrFail($id);
        $disposisi->delete();
        return redirect()->route('surat-masuk.index')->with('success', 'Disposisi Surat berhasil dihapus');
    }

    public function destroyRevisi($id)
    {
        $revisi = RevisiSurat::findOrFail($id);
        $revisi->delete();
        return redirect()->route('surat-masuk.index')->with('success', 'Revisi Surat berhasil dihapus');
    }
}
