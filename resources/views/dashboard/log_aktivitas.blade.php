@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Log Aktivitas Pegawai</h2>
    </div>

    <a href="/export_log" class="btn btn-info mb-3"><i class="fa-solid fa-file-pdf"></i> Export PDF</a>

    <div class="row justify-content-end">
        <div class="col-lg-4">
            <form action="/log_aktivitas" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request('keyword') }}">
                    <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive-md">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="25%">Nama User</th>
                    <th scope="col" width="25%">Role</th>
                    <th scope="col" width="25%">Aksi</th>
                    <th scope="col" width="20%">Tanggal</th>
                </tr>
            </thead>
            <tbody>
            @if ($activities->count())
                @foreach ($activities as $activity)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
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

    <div class="d-flex justify-content-end">
        {{ $activities->links() }}
    </div>
@endsection