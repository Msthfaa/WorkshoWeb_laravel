@extends('layouts.master')
@section('title', 'Detail Karyawan')

@section('content')
<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white border-0 py-3">
        <h4 class="mb-0"><i class="bi bi-person-badge me-2"></i> Detail Karyawan: {{ $employee->nama_lengkap }}</h4>
    </div>
    <div class="card-body p-4">

        <h5 class="mb-3 text-primary">Informasi Dasar</h5>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <strong>Nama Lengkap:</strong>
                <p class="mb-0">{{ $employee->nama_lengkap }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Email:</strong>
                <p class="mb-0">{{ $employee->email }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Nomor Telepon:</strong>
                <p class="mb-0">{{ $employee->nomor_telepon }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Tanggal Lahir:</strong>
                <p class="mb-0">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}</p>
            </div>
        </div>

        <h5 class="mb-3 text-primary">Status & Penempatan</h5>
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <strong>Tanggal Masuk:</strong>
                <p class="mb-0">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}</p>
            </div>
            <div class="col-md-4 mb-3">
                <strong>Status Karyawan:</strong>
                <p class="mb-0">
                    <span class="badge fs-6 {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($employee->status) }}
                    </span>
                </p>
            </div>
            <div class="col-md-4 mb-3">
                <strong>Jabatan:</strong>
                <p class="mb-0">{{ $employee->position->nama_jabatan ?? 'N/A' }}</p>
            </div>
            <div class="col-md-4 mb-3">
                <strong>Departemen:</strong>
                <p class="mb-0">{{ $employee->departement->nama_departemen ?? 'N/A' }}</p>
            </div>
        </div>

        <h5 class="mb-3 text-primary">Alamat</h5>
        <div class="row mb-3">
             <div class="col-12">
                <p class="mb-0 border p-3 rounded bg-light">{{ $employee->alamat }}</p>
            </div>
        </div>

        <hr>
        <div class="d-flex justify-content-end">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning me-2"><i class="bi bi-pencil me-1"></i> Edit Data</a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Daftar</a>
        </div>

    </div>
</div>
@endsection
