@extends('layouts.app')

@section('content')
    <h1>Tambah Ruangan</h1>
    <form class="create-form" method="POST" action="{{ route('ruangan.store') }}">
        @csrf
        <div class="input-list">
            <div class="input-flex">
                <div class="input-item">
                    <label>Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" value="{{ old('nama_ruangan') }}">
                    @error('nama_ruangan')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Kapasitas</label>
                    <input type="number" name="kapasitas" value="{{ old('kapasitas') }}">
                    @error('kapasitas')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Status Ruangan</label>
                    <select name="status_ruangan">
                        <option value="Available" {{ old('status_ruangan') == 'Available' ? 'selected' : '' }}>Available
                        </option>
                        <option value="Booked" {{ old('status_ruangan') == 'Booked' ? 'selected' : '' }}>Booked</option>
                        <option value="Maintenance" {{ old('status_ruangan') == 'Maintenance' ? 'selected' : '' }}>
                            Maintenance
                        </option>
                    </select>
                    @error('status_ruangan')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}">
                    @error('tanggal_peminjaman')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="input-flex">
                <div class="input-item">
                    <label>Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" value="{{ old('waktu_mulai') }}">
                    @error('waktu_mulai')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Waktu Selesai</label>
                    <input type="time" name="waktu_selesai" value="{{ old('waktu_selesai') }}">
                    @error('waktu_selesai')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Peminjam</label>
                    <input type="text" name="peminjam" value="{{ old('peminjam') }}">
                    @error('peminjam')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Kontak Peminjam</label>
                    <input type="text" name="kontak_peminjam" value="{{ old('kontak_peminjam') }}">
                    @error('kontak_peminjam')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit">Tambah</button>
    </form>
@endsection
