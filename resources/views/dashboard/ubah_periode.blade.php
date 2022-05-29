@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Ubah Periode</h2>
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
                <a href="/laporan_pendapatan" class="btn btn-danger me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Tampilkan</button>
            </div>
    </form>
@endsection