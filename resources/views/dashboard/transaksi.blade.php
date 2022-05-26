@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Catatan Transaksi</h2>
    </div>

    @can('transaksi-pemesanan-makanan')
    <a href="/buat_transaksi" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Buat Transaksi</a>
    @endcan

    <div class="table-responsive-md">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Transaksi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Total</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center table-warning" colspan="7">Data transaksi masih kosong!</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection