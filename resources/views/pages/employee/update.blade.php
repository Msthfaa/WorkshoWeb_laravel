<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Employee</title>
</head>
<body>
    <h1>Halaman Update Employee</h1>

    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap</label></td>
                <td>
                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                           value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
                    @error('nama_lengkap')
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="email">Email</label></td>
                <td>
                    <input type="email" name="email" id="email"
                           value="{{ old('email', $employee->email) }}" required>
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="nomor_telepon">Nomor Telepon</label></td>
                <td>
                    <input type="text" name="nomor_telepon" id="nomor_telepon"
                           value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required>
                    @error('nomor_telepon')
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                <td>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                           value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>
                    @error('tanggal_lahir')
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td>
                    <input type="text" name="alamat" id="alamat"
                           value="{{ old('alamat', $employee->alamat) }}" required>
                    @error('alamat')
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk</label></td>
                <td>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                           value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
                    @error('tanggal_masuk')
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="status">Status</label></td>
                <td>
                    <select name="status" id="status" required>
                        <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ old('status', $employee->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>
        </table>

        <button type="submit">Update Karyawan</button>
    </form>
</body>
</html>
