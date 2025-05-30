@extends('layouts.app')

@section('title', 'Buat Pemeriksaan Baru')

@section('content')
<div class="container">
    <h1>Buat Pemeriksaan Baru</h1>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('checkups.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="patient_id" class="form-label">Pilih Pasien</label>
                    <select class="form-select" id="patient_id" name="patient_id" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }} ({{ $patient->phone }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Pilih Dokter</label>
                    <select class="form-select" id="doctor_id" name="doctor_id" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buat Pemeriksaan</button>
                <a href="{{ route('checkups.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection