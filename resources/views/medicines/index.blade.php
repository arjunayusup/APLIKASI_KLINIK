@extends('layouts.app')

@section('title', 'Daftar Obat')

@section('content')
<div class="container">
    <h1>Daftar Obat</h1>
    <a href="{{ route('medicines.create') }}" class="btn btn-primary mb-3">Tambah Obat Baru</a>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Obat</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->id }}</td>
                        <td>{{ $medicine->name }}</td>
                        <td>{{ $medicine->description ?? '-' }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection