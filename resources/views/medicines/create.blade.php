@extends('layouts.app')

@section('title', 'Tambah Obat Baru')

@section('content')
<div class="container">
    <h1>Tambah Obat Baru</h1>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('medicines.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Obat</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection