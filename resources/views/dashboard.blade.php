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
</div>
@endsection