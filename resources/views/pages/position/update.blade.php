@extends('layouts.master')
@section('title', 'Edit Jabatan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0"><i class="bi bi-pencil me-2"></i> Edit Jabatan: {{ $position->nama_jabatan }}</h4>
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

        <form action="{{ route('positions.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan:</label>
                <input type="text" name="nama_jabatan" class="form-control" value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required>
            </div>

            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp):</label>
                <input type="number" name="gaji_pokok" step="0.01" class="form-control" value="{{ old('gaji_pokok', $position->gaji_pokok) }}" required>
            </div>

            <a href="{{ route('positions.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-warning"><i class="bi bi-arrow-clockwise"></i> Perbarui</button>
        </form>
    </div>
</div>
@endsection
