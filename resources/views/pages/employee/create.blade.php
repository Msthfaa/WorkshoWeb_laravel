@extends('layouts.master')
@section('title', 'Tambah Karyawan Baru')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><i class="bi bi-person-plus me-2"></i> Tambah Karyawan Baru</h4>
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

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                    <input type="text" name="nama_lengkap" class="form-control" required value="{{ old('nama_lengkap') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                    <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                    <input type="date" name="tanggal_masuk" class="form-control" required value="{{ old('tanggal_masuk') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="departemen_id" class="form-label">Departemen:</label>
                    <select name="departemen_id" class="form-select" required>
                        <option value="">Pilih Departemen</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}" {{ old('departemen_id') == $departement->id ? 'selected' : '' }}>
                                {{ $departement->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jabatan_id" class="form-label">Jabatan:</label>
                    <select name="jabatan_id" class="form-select" required>
                        <option value="">Pilih Jabatan</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ old('jabatan_id') == $position->id ? 'selected' : '' }}>
                                {{ $position->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" class="form-select" required>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
            </div>

            <a href="{{ route('employees.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Karyawan</button>
        </form>
    </div>
</div>
@endsection
