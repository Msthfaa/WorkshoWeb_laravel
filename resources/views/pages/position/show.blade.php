@extends('layouts.master')
@section('title', 'Detail Jabatan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i> Detail Jabatan</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4"><strong>Nama Jabatan:</strong></div>
            <div class="col-md-8">{{ $position->nama_jabatan }}</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><strong>Gaji Pokok:</strong></div>
            <div class="col-md-8">Rp{{ number_format($position->gaji_pokok, 2, ',', '.') }}</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><strong>Dibuat Pada:</strong></div>
            <div class="col-md-8">{{ $position->created_at->format('d M Y, H:i') }}</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><strong>Diperbarui Pada:</strong></div>
            <div class="col-md-8">{{ $position->updated_at->format('d M Y, H:i') }}</div>
        </div>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('positions.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
