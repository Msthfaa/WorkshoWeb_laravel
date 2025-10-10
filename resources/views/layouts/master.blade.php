<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Msthfaa - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            padding: 1rem;
            background-color: #f8f9fa;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-people-fill me-2"></i> CRUD
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('employees*') ? 'active' : '' }}" href="{{ route('employees.index') }}">Karyawan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('positions*') ? 'active' : '' }}" href="{{ route('positions.index') }}">Jabatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('departements*') ? 'active' : '' }}" href="{{ route('departements.index') }}">Departemen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}" href="{{ route('attendances.index') }}">Absensi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}" href="{{ route('salaries.index') }}">Gaji</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container mt-4 mb-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
