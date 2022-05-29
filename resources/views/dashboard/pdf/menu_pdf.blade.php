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
    <h1>Data Menu</h1>
    <table>
        <tr style="background-color: black; color: white">
            <th>#</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
        </tr>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->nama }}</td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td>{{ $menu->harga }}</td>
                    <td>
                        <img src="{{ public_path() . $menu->gambar }}" alt="{{ $menu->nama }}" width="170">
                    </td>
                </tr>
            @endforeach
    </table>
</body>
</html>