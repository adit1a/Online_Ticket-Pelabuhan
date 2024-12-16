<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f1923; /* Warna latar belakang */
            color: #ffffff; /* Warna teks */
            font-family: 'Arial', sans-serif;
        }
        .verify-container {
            margin-top: 100px;
            background-color: #1f2937; /* Warna panel */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }
        .verify-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #4caf50; /* Warna tombol */
            border-color: #4caf50;
        }
        .btn-primary:hover {
            background-color: #45a049; /* Warna hover tombol */
            border-color: #45a049;
        }
        .btn-secondary {
            background-color: #374151; /* Warna tombol sekunder */
            border-color: #374151;
        }
        .btn-secondary:hover {
            background-color: #4b5563; /* Warna hover tombol sekunder */
            border-color: #4b5563;
        }
        input.form-control {
            background-color: #2d3748;
            color: #ffffff;
            border: 1px solid #4a5568;
        }
        input.form-control:focus {
            background-color: #2d3748;
            color: #ffffff;
            border-color: #4caf50;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 verify-container">
            <h2>Verifikasi OTP</h2>

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

            <form method="POST" action="{{ route('verify_otp') }}">
                @csrf
                <div class="form-group">
                    <label for="otp">Kode OTP</label>
                    <input id="otp" type="text" 
                           class="form-control @error('otp') is-invalid @enderror" 
                           name="otp" required autocomplete="off" maxlength="6" 
                           placeholder="Masukkan 6 digit kode OTP">
                    @error('otp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block">Verifikasi</button>
                    <a href="{{ route('resend.otp') }}" class="btn btn-secondary btn-block">Kirim Ulang OTP</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Link Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
