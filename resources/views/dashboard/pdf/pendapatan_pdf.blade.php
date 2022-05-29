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
    <h1>Data Pendapatan</h1>
    <table>
        <tr style="background-color: black; color: white">
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pendapatan</th>
        </tr>
            @foreach ($pendapatan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->total_harga }}</td>
                </tr>
            @endforeach
                
            @php
                $total = 0;
                foreach($pendapatan as $p) {
                    $total += $p->total_harga;
                }
            @endphp

            <tr class="table-secondary">
                <td colspan=2 class="text-ensd fw-bold">Total</td>
                <td>{{ $total }}</td>
            </tr>
    </table>
</body>
</html>