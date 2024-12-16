<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran Tiket</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }
        .receipt-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .receipt {
            width: 350px;
            background-color: white;
            border: 2px solid #333;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .receipt-header {
            text-align: center;
            border-bottom: 2px dashed #333;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .receipt-body {
            margin-bottom: 10px;
        }
        .receipt-footer {
            border-top: 2px dashed #333;
            padding-top: 10px;
            text-align: center;
        }
        .receipt-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt">
            <div class="receipt-header">
                <h2>STRUK PEMBAYARAN</h2>
                <p>Tiket Perjalaran Kapal</p>
            </div>
            
            <div class="receipt-body">
                <div class="receipt-row">
                    <span>Nama Penumpang</span>
                    <span>{{ $ticket->nama }}</span>
                </div>
                <div class="receipt-row">
                    <span>Tanggal Keberangkatan</span>
                    <span>{{ $ticket->tanggal }}</span>
                </div>
                <div class="receipt-row">
                    <span>Asal</span>
                    <span>{{ $ticket->asal }}</span>
                </div>
                <div class="receipt-row">
                    <span>Tujuan</span>
                    <span>{{ $ticket->tujuan }}</span>
                </div>
                <div class="receipt-row">
                    <span>Jenis Kapal</span>
                    <span>{{ $ticket->kapal == 'ferry' ? 'Ferry' : 'Fiber' }}</span>
                </div>
                <div class="receipt-row">
                    <span>Jumlah Tiket</span>
                    <span>{{ $ticket->jumlah }} Orang</span>
                </div>
                <div class="receipt-row total">
                    <span>Total Pembayaran</span>
                    <span>
                        @if($ticket->kapal == 'ferry')
                            Rp {{ number_format($ticket->jumlah * 60000, 0, ',', '.') }}
                        @elseif($ticket->kapal == 'fiber')
                            Rp {{ number_format($ticket->jumlah * 90000, 0, ',', '.') }}
                        @else
                            Rp 0
                        @endif
                    </span>
                </div>
            </div>
            
            <div class="receipt-footer">
                <p>Terima Kasih</p>
                <p>Selamat Berlayar</p>
            </div>
        </div>
    </div>
</body>
</html>