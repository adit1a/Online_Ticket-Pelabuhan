<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tiket</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .report-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 30px;
        }
        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .table {
            margin-bottom: 0;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: rgba(0,123,255,0.05);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0,123,255,0.1);
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            color: #6c757d;
        }
        .btn-custom {
            margin-right: 10px;
        }
        @media print {
            body {
                background-color: white;
            }
            .report-container {
                box-shadow: none;
            }
            .print-hidden {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="report-container">
            <div class="report-header print-hidden">
                <h1 class="text-primary">Laporan Tiket</h1>
                <div class="action-buttons">
                    <a href="{{ route('ticket.create') }}" class="btn btn-success btn-custom">
                        <i class="fas fa-plus me-2"></i>Buat Tiket Baru
                    </a>
                    <a href="{{ route('tickets.pdf_report') }}" class="btn btn-danger btn-custom">
                        <i class="fas fa-file-pdf me-2"></i>Download PDF
                    </a>
                    <a href="/" class="btn btn-secondary btn-custom">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <!-- Date Range Filter -->
            <div class="row mb-3 print-hidden">
                <div class="col-md-12">
                    <form action="{{ route('tickets.index') }}" method="GET" class="d-flex align-items-center">
                        <div class="me-2">
                            <label for="start_date" class="form-label">Dari Tanggal:</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" 
                                   value="{{ request('start_date') }}">
                        </div>
                        <div class="me-2">
                            <label for="end_date" class="form-label">Sampai Tanggal:</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" 
                                   value="{{ request('end_date') }}">
                        </div>
                        <div class="align-self-end">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                                <i class="fas fa-redo me-2"></i>Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Jumlah</th>
                            <th>Kapal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $ticket->nama }}</td>
                                <td>{{ $ticket->tanggal }}</td>
                                <td>{{ $ticket->asal }}</td>
                                <td>{{ $ticket->tujuan }}</td>
                                <td>{{ $ticket->jumlah }}</td>
                                <td>{{ $ticket->kapal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="footer">
                <p class="mb-1">Terima kasih telah menggunakan layanan kami!</p>
                <p class="text-muted">&copy; {{ date('Y') }} Perusahaan Anda. Semua hak dilindungi.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>
</html>