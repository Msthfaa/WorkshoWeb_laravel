@extends('layouts.master')
@section('title', 'Catat Absensi Manual')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><i class="bi bi-calendar-plus me-2"></i> Catat Absensi Karyawan (Manual)</h4>
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

        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="karyawan_id" class="form-label">Karyawan:</label>
                    <select name="karyawan_id" class="form-select" required>
                        <option value="">Pilih Karyawan</option>
                        {{-- $employees harus dipassing dari AttendanceController@create --}}
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->position->nama_jabatan ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal Absensi:</label>
                    <input type="date" name="tanggal" class="form-control" required value="{{ old('tanggal', date('Y-m-d')) }}">
                </div>
            </div>

            <div class="row">
                 <div class="col-md-4 mb-3">
                    <label for="waktu_masuk" class="form-label">Waktu Masuk:</label>
                    <input type="time" name="waktu_masuk" class="form-control" value="{{ old('waktu_masuk') }}">
                    <div class="form-text">Kosongkan jika status Izin/Sakit/Alpha.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="waktu_keluar" class="form-label">Waktu Keluar:</label>
                    <input type="time" name="waktu_keluar" class="form-control" value="{{ old('waktu_keluar') }}">
                    <div class="form-text">Kosongkan jika belum keluar.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status_absensi" class="form-label">Status Absensi:</label>
                    <select name="status_absensi" class="form-select" required>
                        <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </div>
            </div>

            <a href="{{ route('attendances.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Catatan</button>
        </form>
    </div>
</div>
@endsection
