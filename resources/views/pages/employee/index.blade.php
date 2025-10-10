@extends('layouts.master')
@section('title', 'Daftar Karyawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Daftar Karyawan</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> Tambah Karyawan</a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th width="200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->nama_lengkap }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->departement->nama_departemen ?? '-' }}</td>
                        <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Hapus karyawan {{ $employee->nama_lengkap }}?');">
                                <a class="btn btn-info btn-sm" href="{{ route('employees.show', $employee->id) }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{ route('employees.edit', $employee->id) }}"><i class="bi bi-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data Karyawan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
