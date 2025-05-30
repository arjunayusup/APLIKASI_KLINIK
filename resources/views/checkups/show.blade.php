@extends('layouts.app')

@section('title', 'Detail Pemeriksaan')

@section('content')
<div class="container">
    <h1>Detail Pemeriksaan #{{ $checkup->id }}</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Pasien</h5>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Nama:</strong> {{ $checkup->patient->name }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($checkup->patient->birth_date)->format('d/m/Y H:i') }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Jenis Kelamin:</strong> {{ $checkup->patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><strong>No. HP:</strong> {{ $checkup->patient->phone }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Tanggal Pemeriksaan:</strong> {{ $checkup->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Status:</strong> 
                        @if($checkup->diagnosis)
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-warning text-dark">Proses</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Data Perawat
                </div>
                <div class="card-body">
                    <p><strong>Nama Perawat:</strong> {{ $checkup->nurse->name }}</p>
                    <p><strong>Berat Badan:</strong> {{ $checkup->weight ?? '-' }} kg</p>
                    <p><strong>Tekanan Darah:</strong> {{ $checkup->blood_pressure ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    Data Dokter
                </div>
                <div class="card-body">
                    <p><strong>Nama Dokter:</strong> {{ $checkup->doctor ? $checkup->doctor->name : '-' }}</p>
                    <p><strong>Keluhan:</strong> {{ $checkup->complaint ?? '-' }}</p>
                    <p><strong>Diagnosa:</strong> {{ $checkup->diagnosis ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-info text-white">
            Resep Obat
            @if(auth()->user()->role === 'apoteker')
                <a href="{{ route('prescriptions.create', $checkup->id) }}" class="btn btn-sm btn-light float-end">Tambah Resep</a>
            @endif
        </div>
        <div class="card-body">
            @if($checkup->prescriptions->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Instruksi</th>
                            <th>Apoteker</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkup->prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->medicine->name }}</td>
                            <td>{{ $prescription->instruction }}</td>
                            <td>{{ $prescription->pharmacist->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mb-0">Belum ada resep obat</p>
            @endif
        </div>
    </div>
</div>
@endsection