@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Laporan Pendapatan</h2>
    </div>

    <a href="/ubah_periode" class="btn btn-success mb-3"><i class="fa fa-calendar"></i> Ubah Periode</a>

    @if (request('start_date') && request('end_date'))
        <h5>Laporan Pendapatan dari {{ request('start_date') }} - {{ request('end_date') }}</h5>
    @endif
    <div class="table-responsive-md">
        <table class="table table-striped table-hover shadow-sm">
            <thead>
                <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @if ($pendapatan->count())
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
                @else
                    <tr>
                        <td class="text-center table-warning" colspan="3">Data pendapatan masih kosong!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection