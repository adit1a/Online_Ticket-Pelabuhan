<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tiket</title>
    <style>
        /* Tambahkan CSS sesuai kebutuhan */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Tiket</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Jumlah</th>
                <th>kapal</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $ticket)
                <tr>
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
</body>
</html>