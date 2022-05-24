@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Dashboard</h2>
    </div>
    <h6>Selamat datang kembali, {{ auth()->user()->name }}!</h6>
@endsection