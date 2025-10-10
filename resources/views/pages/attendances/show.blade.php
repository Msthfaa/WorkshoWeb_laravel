@extends('layouts.master')
@section('title', 'Detail Absensi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0"><i class="bi bi-calendar-check me-2"></i> Detail Absensi</h4>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Karyawan:</strong>
                <p>{{ $attendance->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</p>
            </div>
            <div class="col-md-6">
                <strong>Jabatan:</strong>
                <p>{{ $attendance->employee->position->nama_jabatan ?? 'N/A' }}</p>
            </div>
        </div>

        <hr>

        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Tanggal Absensi:</strong>
                <p>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</p>
            </div>
            <div class="col-md-4">
                <strong>Waktu Masuk:</strong>
                <p>{{ $attendance->waktu_masuk ?? '-' }}</p>
            </div>
            <div class="col-md-4">
                <strong>Waktu Keluar:</strong>
                <p>{{ $attendance->waktu_keluar ?? '-' }}</p>
            </div>
        </div>

        <div class="mb-3">
            <strong>Status Absensi:</strong>
            <p>
                <span class="badge
                    @if($attendance->status_absensi == 'hadir') bg-success
                    @elseif($attendance->status_absensi == 'izin') bg-warning
                    @elseif($attendance->status_absensi == 'sakit') bg-info
                    @else bg-danger
                    @endif">
                    {{ ucfirst($attendance->status_absensi) }}
                </span>
            </p>
        </div>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('attendances.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
