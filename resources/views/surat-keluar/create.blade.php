@extends('layouts.app')

@section('content')
    <h1>Tambah Surat Keluar</h1>
    <form class="create-form" method="POST" action="{{ route('surat-keluar.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
            <label>Nomor Surat</label>
            <input type="text" name="nomor_surat" placeholder="Contoh: 058/000-UKM/VI/2024">
            @error('nomor_surat')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>Perihal</label>
            <input type="text" name="perihal" placeholder="Contoh: Peminjaman Ruangan">
            @error('perihal')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>File Surat</label>
            <input type="file" name="file_surat" accept=".pdf, .doc, .docx">
            @error('file_surat')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
