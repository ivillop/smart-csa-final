@extends('layouts.app')

@section('content')
    <h1>Tambah Disposisi Surat</h1>
    <form class="create-form" method="POST" action="{{ route('surat-masuk.store-disposisi') }}">
        @csrf
        <div class="input-item">
            <label>Pemberi Disposisi</label>
            <input type="text" name="pemberi_disposisi" value="{{ old('pemberi_disposisi') }}">
            @error('pemberi_disposisi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>Penerima Disposisi</label>
            <input type="text" name="penerima_disposisi" value="{{ old('penerima_disposisi') }}">
            @error('penerima_disposisi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>Instruksi Disposisi</label>
            <input type="text" name="instruksi_disposisi" value="{{ old('instruksi_disposisi') }}">
            @error('instruksi_disposisi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label>Status Disposisi</label>
            <select name="status_disposisi">
                <option value="Pending" {{ old('status_disposisi') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ old('status_disposisi') == 'In Progress' ? 'selected' : '' }}>In Progress
                </option>
                <option value="Completed" {{ old('status_disposisi') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status_disposisi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Tambah</button>
    </form>
@endsection
