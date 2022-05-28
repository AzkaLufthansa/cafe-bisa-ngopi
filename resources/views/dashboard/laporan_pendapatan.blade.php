@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Laporan Pendapatan</h2>
    </div>

    <form action="/laporan_pendapatan" method="get">
        <div class="row mb-3">
            <div class="col">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" aria-describedby="emailHelp" value="{{ request('start_date') }}">
            </div>
            <div class="col">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" aria-describedby="emailHelp" value="{{ request('end_date') }}">
            </div>
        </div>
            <div class="mb-3 justify-content-end d-flex">
                <a href="/laporan_pendapatan" class="btn btn-danger me-2">Reset</a>
                <button type="submit" class="btn btn-success">Tampilkan</button>
            </div>
    </form>

    @if (request('start_date') && request('end_date'))
        <h5>Laporan Pendapatan dari {{ request('start_date') }} - {{ request('end_date') }}</h5>
    @else
        <h5>Semua Laporan Pendapatan</h5>
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