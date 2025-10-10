@extends('layouts.master')
@section('title', 'Tambah Departemen')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><i class="bi bi-building-fill me-2"></i> Tambah Departemen Baru</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada masalah dengan input Anda.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departements.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_departemen" class="form-label">Nama Departemen:</label>
                <input type="text" name="nama_departemen" class="form-control" value="{{ old('nama_departemen') }}" placeholder="Contoh: IT & Development" required>
            </div>

            <a href="{{ route('departements.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection
