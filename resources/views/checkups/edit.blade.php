@extends('layouts.app')

@section('title', 'Edit Pemeriksaan')

@section('content')
<div class="container">
    <h1>Edit Pemeriksaan Pasien: {{ $checkup->patient->name }}</h1>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('checkups.update', $checkup->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                @if(auth()->user()->role === 'perawat')
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat Badan (kg)</label>
                        <input type="number" step="0.1" class="form-control" id="weight" name="weight" required>
                    </div>
                    <div class="mb-3">
                        <label for="blood_pressure" class="form-label">Tekanan Darah</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" placeholder="Contoh: 120/80" required>
                    </div>
                @elseif(auth()->user()->role === 'dokter')
                    <div class="mb-3">
                        <label for="complaint" class="form-label">Keluhan Pasien</label>
                        <textarea class="form-control" id="complaint" name="complaint" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="diagnosis" class="form-label">Hasil Diagnosa</label>
                        <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3" required></textarea>
                    </div>
                @endif
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('checkups.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection