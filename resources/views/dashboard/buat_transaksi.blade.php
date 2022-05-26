@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Buat Transaksi</h2>
    </div>

    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" aria-describedby="emailHelp" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="menu" class="form-label">Menu</label>
                            <select class="form-select @error('menu') is-invalid @enderror" id="menu" name="menu" aria-label="Default select example">
                                
                            @if ($menus->count())
                                @foreach ($menus as $menu)
                                    @if (old('menu') == $menu->nama)
                                        <option value="{{ $menu->id }}" selected>{{ $menu->nama }}</option>
                                    @endif
                                        <option value="{{ $menu->id }}">{{ $menu->nama }}</option>
                                @endforeach
                            @else
                                <option value="">--Data menu masih kosong--</option>
                            @endif

                            </select>
                            @error('menu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" aria-describedby="emailHelp" value="0" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" aria-describedby="emailHelp" placeholder="Quantity" value="{{ old('quantity') }}">
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_meja" class="form-label">Nomor Meja</label>
                            <input type="number" class="form-control @error('no_meja') is-invalid @enderror" id="no_meja" name="no_meja" aria-describedby="emailHelp" placeholder="Nomor Meja" value="{{ old('no_meja') }}">
                            @error('no_meja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <a href="/transaksi" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card bg-light">
                <div class="card-header">
                    Nomor Transaksi - <span class="fw-bold"></span>
                </div>
                <div class="card-body">
                    <div class="table-responsize-md">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <hr>
                    <form action="">
                        <div class="mb-3">
                            <label for="total_keseluruhan" class="form-label">Total Keseluruhan</label>
                            <input type="number" class="form-control" id="total_keseluruhan" name="total_keseluruhan" placeholder="0" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="total_bayar" class="form-label">Total Bayar</label>
                            <input type="number" class="form-control @error('total_bayar') is-invalid @enderror" id="total_bayar" name="total_bayar" placeholder="0">
                            @error('total_bayar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Total Kembali" class="form-label">Total Keseluruhan</label>
                            <input type="number" class="form-control" id="total_kembali" name="total_kembali" placeholder="0" disabled>
                        </div>
                        <button type="submit" class="btn btn-success">Bayar</button>
                    </form>
                </div>
        </div>
    </div>
@endsection