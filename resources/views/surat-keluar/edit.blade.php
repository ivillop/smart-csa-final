@extends('layouts.app')

@section('content')
    <h1>Edit Surat Keluar</h1>
    <form class="edit-form" method="POST" action="{{ route('surat-keluar.update', $suratKeluar->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-item">
            <label>Nomor Surat</label>
            <input type="text" name="nomor_surat" value="{{ $suratKeluar->nomor_surat }}">
            @error('nomor_surat')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>Perihal</label>
            <input type="text" name="perihal" value="{{ $suratKeluar->perihal }}">
            @error('perihal')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>File Surat</label>
            <input type="file" name="file_surat" accept=".pdf, .doc, .docx">
            @if ($suratKeluar->file_surat)
                <a href="{{ asset('storage/' . $suratKeluar->file_surat) }}" target="_blank">Lihat File Lama</a>
            @endif
            @error('file_surat')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
