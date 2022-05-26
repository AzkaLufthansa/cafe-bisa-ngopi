@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Catatan Transaksi</h2>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @can('transaksi-pemesanan-makanan')
    <a href="/buat_transaksi" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Buat Transaksi</a>
    @endcan

    <div class="table-responsive-md">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Nama Kasir</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
            @if ($transaksi->count())
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
            @else
                <tr>
                    <td class="text-center table-warning" colspan="7">Data transaksi masih kosong!</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection