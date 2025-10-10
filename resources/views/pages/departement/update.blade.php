@extends('layouts.master')
@section('title', 'Edit Departemen')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0"><i class="bi bi-pencil me-2"></i> Edit Departemen: {{ $departement->nama_departemen }}</h4>
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

        <form action="{{ route('departements.update', $departement->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_departemen" class="form-label">Nama Departemen:</label>
                <input type="text" name="nama_departemen" class="form-control" value="{{ old('nama_departemen', $departement->nama_departemen) }}" required>
            </div>

            <a href="{{ route('departements.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-warning"><i class="bi bi-arrow-clockwise"></i> Perbarui</button>
        </form>
    </div>
</div>
@endsection
