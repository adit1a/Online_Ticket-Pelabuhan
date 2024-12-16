<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f1923; /* Warna latar belakang sesuai tema */
            color: #ffffff; /* Warna teks putih agar kontras */
            font-family: 'Arial', sans-serif;
        }
        .register-container {
            margin-top: 100px;
            background-color: #1f2937; /* Warna panel */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }
        .register-container h2 {
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
        <div class="col-md-6 col-lg-4 register-container">
            <h2>Register</h2>

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

            <form action="/sesi/create" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
                    @error('name')
                    <div class='invalid-feedback'>
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                    <div class='invalid-feedback'>
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="email_confirmation">Konfirmasi Email</label>
                        <input type="email" name="email_confirmation" class="form-control" placeholder="Konfirmasi Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                    <div class='invalid-feedback'>
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
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