@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')
<div class="container">
    <h1>Detail Pasien</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Pasien</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama:</strong> {{ $patient->name }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Jenis Kelamin:</strong> {{ $patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><strong>No. HP:</strong> {{ $patient->phone }}</p>
                </div>
            </div>
        </div>
    </div>

    <h3>Riwayat Pemeriksaan</h3>
    @if($patient->checkups->count() > 0)
        @foreach($patient->checkups as $checkup)
        <div class="card mb-3">
            <div class="card-header">
                Pemeriksaan #{{ $checkup->id }} - {{ $checkup->created_at->format('d/m/Y H:i') }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Perawat:</strong> {{ $checkup->nurse->name }}</p>
                        <p><strong>Berat Badan:</strong> {{ $checkup->weight }} kg</p>
                        <p><strong>Tekanan Darah:</strong> {{ $checkup->blood_pressure }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Dokter:</strong> {{ $checkup->doctor ? $checkup->doctor->name : '-' }}</p>
                        <p><strong>Keluhan:</strong> {{ $checkup->complaint ?? '-' }}</p>
                        <p><strong>Diagnosa:</strong> {{ $checkup->diagnosis ?? '-' }}</p>
                    </div>
                    <div class="col-md-4">
                        <h6>Resep Obat:</h6>
                        @if($checkup->prescriptions->count() > 0)
                            <ul>
                                @foreach($checkup->prescriptions as $prescription)
                                <li>
                                    {{ $prescription->medicine->name }} - 
                                    {{ $prescription->instruction }}
                                    (Oleh: {{ $prescription->pharmacist->name }})
                                </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Tidak ada resep</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-info">Belum ada riwayat pemeriksaan</div>
    @endif
</div>
@endsection