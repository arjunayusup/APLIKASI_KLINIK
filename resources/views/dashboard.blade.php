@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Selamat datang, {{ $user->name }}</h5>
                    <p class="card-text">Anda login sebagai {{ $user->role }}</p>
                </div>
            </div>
        </div>
    </div>

     @if($user->role === 'pendaftaran')
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Menu Pendaftaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex">
                            <a href="{{ route('patients.create') }}" class="btn btn-primary me-md-2">
                                <i class="fas fa-user-plus"></i> Tambah Pasien Baru
                            </a>
                            <a href="{{ route('patients.index') }}" class="btn btn-success">
                                <i class="fas fa-list"></i> Daftar Pasien
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($user->role === 'perawat' || 'dokter')
    <div class="container mt-3">
    <h1>Daftar Pemeriksaan</h1>
        @if(auth()->user()->role === 'perawat')
            <a href="{{ route('checkups.create') }}" class="btn btn-primary mb-3">Buat Pemeriksaan Baru</a>
        @endif
    
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pasien</th>
                            <th>Tanggal</th>
                            <th>Perawat</th>
                            <th>Dokter</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkups as $checkup)
                        <tr>
                            <td>{{ $checkup->id }}</td>
                            <td>{{ $checkup->patient->name }}</td>
                            <td>{{ $checkup->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $checkup->nurse->name }}</td>
                            <td>{{ $checkup->doctor ? $checkup->doctor->name : '-' }}</td>
                            <td>
                                @if($checkup->diagnosis)
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-warning text-dark">Proses</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('checkups.show', $checkup->id) }}" class="btn btn-sm btn-info">Detail</a>
                                @if(auth()->user()->role === 'perawat' && !$checkup->weight)
                                    <a href="{{ route('checkups.edit', $checkup->id) }}" class="btn btn-sm btn-primary">Isi Data</a>
                                @elseif(auth()->user()->role === 'dokter' && !$checkup->diagnosis)
                                    <a href="{{ route('checkups.edit', $checkup->id) }}" class="btn btn-sm btn-primary">Diagnosa</a>
                                @elseif(auth()->user()->role === 'apoteker')
                                    <a href="{{ route('prescriptions.create', $checkup->id) }}" class="btn btn-sm btn-light float-end">Tambah Resep</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection