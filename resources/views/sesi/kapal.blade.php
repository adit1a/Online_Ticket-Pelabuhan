<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kapal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #0f1923;
            --card-bg: #1f2937;
            --text-light: #d1d5db;
            --accent-green: #4caf50;
        }

        body {
            background-color: var(--primary-bg);
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .ship-selection-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .ship-card {
            background-color: var(--card-bg);
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .ship-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.4);
        }

        .ship-card-img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .ship-card:hover .ship-card-img {
            transform: scale(1.1);
        }

        .ship-card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .ship-card-title {
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .ship-card-text {
            color: #a0aec0;
            margin-bottom: 15px;
        }

        .btn-book {
            background-color: var(--accent-green);
            border-color: var(--accent-green);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-book:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .ship-card-img {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container ship-selection-container">
        <h2 class="text-center my-4">Pilih Kapal yang Akan Dipesan</h2>
        
        <div class="row g-4">
            <!-- Mawar Ferry Card -->
            <div class="col-md-6">
                <div class="ship-card card h-100">
                    <img src="{{ asset('gambar/ferry.png') }}" class="card-img-top ship-card-img" alt="Mawar Ferry">
                    <div class="ship-card-body card-body">
                        <div>
                            <h5 class="ship-card-title card-title">Mawar Ferry</h5>
                            <p class="ship-card-text card-text">Kapal ferry nyaman untuk perjalanan Anda. Dilengkapi fasilitas terbaik.</p>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('ticket.create', ['kapal' => 'Mawar ferry']) }}" class="btn btn-book btn-primary w-100">
                                <i class="fas fa-ship me-2"></i>Pesan - Rp60.000
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fiber Card -->
            <div class="col-md-6">
                <div class="ship-card card h-100">
                    <img src="{{ asset('gambar/fiber.png') }}" class="card-img-top ship-card-img" alt="Fiber">
                    <div class="ship-card-body card-body">
                        <div>
                            <h5 class="ship-card-title card-title">Fiber</h5>
                            <p class="ship-card-text card-text">Kapal modern dengan kecepatan tinggi. Pengalaman berlayar yang premium.</p>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('ticket.create', ['kapal' => 'Fiber']) }}" class="btn btn-book btn-primary w-100">
                                <i class="fas fa-ship me-2"></i>Pesan - Rp90.000
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>
</html>