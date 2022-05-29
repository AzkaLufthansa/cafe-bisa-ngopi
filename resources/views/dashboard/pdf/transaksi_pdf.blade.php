<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Data Transaksi</h1>
    <table>
        <tr style="background-color: black; color: white">
            <th scope="col">#</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Nama Kasir</th>
            <th scope="col">Tanggal</th>
        </tr>
            @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->nama_pelanggan }}</td>
                    <td>{{ $t->nama_menu }}</td>
                    <td>{{ $t->jumlah }}</td>
                    <td>{{ $t->total_harga }}</td>
                    <td>{{ $t->nama_kasir }}</td>
                    <td>{{ $t->tanggal }}</td>
                </tr>
            @endforeach
    </table>
</body>
</html>