@extends('layouts.app')

@section('title', 'Tambah Resep Obat')

@section('content')
<div class="container">
    <h1>Tambah Resep Obat untuk Pemeriksaan #{{ $checkup->id }}</h1>
    <p>Pasien: {{ $checkup->patient->name }}</p>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('prescriptions.store', $checkup->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="medicine_id" class="form-label">Pilih Obat</label>
                    <select class="form-select" id="medicine_id" name="medicine_id" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="instruction" class="form-label">Instruksi Pemakaian</label>
                    <textarea class="form-control" id="instruction" name="instruction" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Resep</button>
                <a href="{{ route('checkups.show', $checkup->id) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection