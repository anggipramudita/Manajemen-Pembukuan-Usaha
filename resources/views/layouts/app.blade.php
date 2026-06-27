<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - FinTrack UMKM</title>
    <!-- AdminLTE & Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
        <!-- Navbar -->
        <nav class="app-header navbar navbar-expand">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-grid-fill"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="toggleDarkMode" title="Toggle Theme"><i class="bi bi-moon-fill"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="bi bi-bell-fill"></i></a>
                    </li>
                    <li class="nav-item d-flex align-items-center ms-3">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'Owner+UMKM' }}&background=6366f1&color=fff" class="rounded-circle" width="35" alt="User">
                        <span class="ms-2 text-white fw-medium">{{ Auth::user()->name ?? 'Owner UMKM' }}</span>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Sidebar -->
        <aside class="app-sidebar shadow-lg">
            <div class="sidebar-brand text-center">
                <a href="{{ route('dashboard') }}" class="brand-link text-decoration-none">
                    <span class="brand-text fw-bold text-white fs-4">FinTrack <span class="text-primary">•</span></span>
                </a>
            </div>
            <div class="sidebar-wrapper mt-3">
                <nav>
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-house-door-fill"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('incomes.index') }}" class="nav-link {{ request()->routeIs('incomes.*') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-wallet2"></i>
                                <p>Data Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('expenses.index') }}" class="nav-link {{ request()->routeIs('expenses.*') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-cart-dash-fill"></i>
                                <p>Data Pengeluaran</p>
                            </a>
                        </li>
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('reports.index') }}" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-pie-chart-fill"></i>
                                <p>Laporan Keuangan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="app-main">
            <div class="app-content-header pb-0">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h3 class="mb-0 fw-bold fs-2 text-white mt-3 mb-4">@yield('title')</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
        
        <footer class="app-footer text-center border-0" style="background: transparent; color: #64748b;">
            <strong>Copyright &copy; 2026 FinTrack UMKM.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('scripts')
</body>
</html>