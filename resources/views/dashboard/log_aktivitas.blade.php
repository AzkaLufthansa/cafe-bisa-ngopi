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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center table-warning" colspan="4">Data log masih kosong!</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection