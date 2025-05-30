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
</div>
@endsection