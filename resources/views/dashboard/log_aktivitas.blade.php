@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Log Aktivitas Pegawai</h2>
    </div>

    <div class="table-responsive-md">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
            @if ($activities->count())
                @foreach ($activities as $activity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->user->name }}</td>
                    <td>{{ $activity->user->getRoleNames()->first() }}</td>
                    <td>{{ $activity->activity_name }}</td>
                    <td>{{ $activity->created_at }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center table-warning" colspan="5">Data log masih kosong!</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection