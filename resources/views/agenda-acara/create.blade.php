@extends('layouts.app')

@section('content')
    <h1>Tambah Agenda Acara</h1>
    <form class="create-form" method="POST" action="{{ route('agenda-acara.store') }}">
        @csrf
        <div class="input-list">
            <div class="input-flex">
                <div class="input-item">
                    <label>Nama Acara</label>
                    <input type="text" name="nama_acara" value="{{ old('nama_acara') }}">
                    @error('nama_acara')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan') }}">
                    @error('tanggal_pelaksanaan')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
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
            </div>
            <div class="input-flex">

                <div class="input-item">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Penyelenggara</label>
                    <input type="text" name="penyelenggara" value="{{ old('penyelenggara') }}">
                    @error('penyelenggara')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Prioritas</label>
                    <select name="prioritas">
                        <option value="High" {{ old('prioritas') == 'High' ? 'selected' : '' }}>High</option>
                        <option value="Medium" {{ old('prioritas') == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Low" {{ old('prioritas') == 'Low' ? 'selected' : '' }}>Low</option>
                    </select>
                    @error('prioritas')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Status</label>
                    <select name="status">
                        <option value="Planned" {{ old('status') == 'Planned' ? 'selected' : '' }}>Planned</option>
                        <option value="Ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit">Tambah</button>
    </form>
@endsection
