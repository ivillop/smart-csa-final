@extends('layouts.app')

@section('content')
    <h1>Tambah Revisi Surat</h1>
    <form class="create-form" method="POST" action="{{ route('surat-masuk.store-revisi') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
            <label>Pemberi Revisi</label>
            <input type="text" name="pemberi_revisi" value="{{ old('pemberi_revisi') }}">
            @error('pemberi_revisi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>File Surat</label>
            <input type="file" name="file_surat">
            @error('file_surat')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>Status Revisi</label>
            <select name="status_revisi">
                <option value="Pending" {{ old('status_revisi') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ old('status_revisi') == 'In Progress' ? 'selected' : '' }}>In Progress
                </option>
                <option value="Completed" {{ old('status_revisi') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status_revisi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Tambah</button>
    </form>
@endsection
