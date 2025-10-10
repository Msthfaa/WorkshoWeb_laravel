@extends('layouts.master')
@section('title', 'Buat Slip Gaji')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><i class="bi bi-coin me-2"></i> Buat Slip Gaji Baru</h4>
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

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="karyawan_id" class="form-label">Karyawan:</label>
                    <select name="karyawan_id" class="form-select" required>
                        <option value="">Pilih Karyawan</option>
                        {{-- $employees harus dipassing dari SalaryController@create --}}
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->position->nama_jabatan ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bulan" class="form-label">Periode Bulan:</label>
                    <input type="text" name="bulan" class="form-control" value="{{ old('bulan', \Carbon\Carbon::now()->subMonth()->format('F Y')) }}" placeholder="Contoh: Januari 2024" required>
                </div>
            </div>

            <h5 class="mt-4 mb-3">Komponen Gaji</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp):</label>
                    <input type="number" name="gaji_pokok" step="0.01" class="form-control" value="{{ old('gaji_pokok') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan (Rp):</label>
                    <input type="number" name="tunjangan" step="0.01" class="form-control" value="{{ old('tunjangan', 0) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="potongan" class="form-label">Potongan (Rp):</label>
                    <input type="number" name="potongan" step="0.01" class="form-control" value="{{ old('potongan', 0) }}" required>
                </div>
            </div>

            <div class="alert alert-info mt-4">
                **Total Gaji Bersih** akan dihitung saat penyimpanan (Gaji Pokok + Tunjangan - Potongan).
                <input type="hidden" name="total_gaji" value="0">
            </div>

            <a href="{{ route('salaries.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Proses dan Simpan Gaji</button>
        </form>
    </div>
</div>
@endsection
