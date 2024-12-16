<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pesanan Tiket</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f1923; /* Warna latar belakang utama */
            color: #ffffff; /* Warna teks */
            font-family: 'Arial', sans-serif;
        }

        /* Container utama */
        .ticket-container {
            margin-top: 50px;
            background-color: #1f2937;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        /* Warna tombol */
        .btn-primary {
            background-color: #4caf50;
            border-color: #4caf50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-secondary {
            background-color: #374151;
            border-color: #374151;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
            border-color: #4b5563;
        }

        /* Input form */
        input.form-control,
        select.form-control {
            background-color: #2d3748;
            color: #ffffff;
            border: 1px solid #4a5568;
        }

        input.form-control:focus,
        select.form-control:focus {
            background-color: #2d3748;
            color: #ffffff;
            border-color: #4caf50;
        }

        /* Tambahan untuk judul formulir */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        label {
            color: #d1d5db;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 ticket-container">
                <h1>Formulir Pesanan Tiket</h1>

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('ticket.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                               value="{{ auth()->user()->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                               required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                               min="1" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="asal">Asal</label>
                        <input type="text" name="asal" id="asal" class="form-control @error('asal') is-invalid @enderror"
                               required>
                        @error('asal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <select name="tujuan" id="tujuan"
                                class="form-control @error('tujuan') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih Tujuan</option>
                            <option value="siwa-tobaku">Siwa - Tobaku</option>
                            <option value="tobaku-siwa">Tobaku - Siwa</option>
                        </select>
                        @error('tujuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kapal">Kapal</label>
                        <select name="kapal" id="kapal" class="form-control @error('kapal') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Kapal</option>
                            <option value="ferry">Ferry</option>
                            <option value="fiber">Fiber</option>
                        </select>
                        @error('kapal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Buat Pesanan</button>
                        <a href="/" class="btn btn-secondary btn-block">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript tambahan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
