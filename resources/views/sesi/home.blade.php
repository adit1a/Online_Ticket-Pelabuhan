<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .welcome-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .ticket-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Menu -->
            <nav class="col-md-3 sidebar bg-dark text-white">
                <div class="sidebar-sticky pt-4">
                    <h2 class="text-center mb-4">Dashboard Menu</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white" href="/users">
                                <i class="fas fa-database me-2"></i>Database
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white" href="{{ route('kapal') }}">
                                <i class="fas fa-ticket-alt me-2"></i>Pesan Tiket
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white" href="{{ route('report') }}">
                                <i class="fas fa-chart-bar me-2"></i>Laporan
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Logout Button -->
                    <div class="mt-auto p-3 text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="text-primary">Pesan Tiket</h1>
                        <h4 class="text-muted">Kelola tiket Anda dengan mudah melalui dashboard ini</h4>
                    </div>
                </div>

                <!-- Welcome Section -->
                <div class="welcome-section mb-4">
                    <h2 class="mb-3">Selamat Datang di Menu Pesan Tiket</h2>
                    <p class="text-muted">Gunakan menu navigasi di sisi kiri untuk menjelajahi database, laporan, atau memesan tiket.</p>
                </div>

                <!-- Ticket Ordering Section -->
                <div class="ticket-section">
                    <h2 class="mb-3">Tiket Pesanan</h2>
                    <p>Gunakan bagian ini untuk memesan tiket dan melakukan verifikasi pesanan Anda dengan cepat dan praktis.</p>
                    
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle me-2"></i>Pastikan untuk memeriksa semua detail sebelum menyelesaikan pemesanan tiket Anda.
                    </div>
                    
                    <a href="{{ route('kapal') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Pesan Tiket Sekarang
                    </a>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>
</html>