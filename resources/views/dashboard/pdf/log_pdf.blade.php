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
    <h1>Data Log Aktivitas</h1>
    <table>
        <tr style="background-color: black; color: white">
            <th scope="col">#</th>
            <th scope="col">Nama User</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
            <th scope="col">Tanggal</th>
        </tr>
            @foreach ($activities as $activity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->user->name }}</td>
                    <td>{{ $activity->user->getRoleNames()->first() }}</td>
                    <td>{{ $activity->activity_name }}</td>
                    <td>{{ $activity->created_at }}</td>d>
                </tr>
            @endforeach
    </table>
</body>
</html>