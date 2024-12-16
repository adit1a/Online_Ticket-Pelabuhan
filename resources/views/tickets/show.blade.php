<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Detail Tiket</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $ticket->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $ticket->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $ticket->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Asal</th>
                            <td>{{ $ticket->asal }}</td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>{{ $ticket->tujuan }}</td>
                        </tr>
                        <tr>
                            <th>kapal</th>
                            <td>{{ $ticket->kapal }}</td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('ticket.create') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('ticket.downloaPDF', $ticket->id) }}" class="btn btn-primary">Unduh PDF</a>
                        <a href="/" class="btn btn-danger">Home</a>
                    </div>
                    <div class="text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>