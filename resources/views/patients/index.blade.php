@extends('layouts.app')

@section('title', 'Daftar Pasien')

@section('content')
<div class="container">
    <h1>Daftar Pasien</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Tambah Pasien Baru</a>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') }}</td>
                        <td>{{ $patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection