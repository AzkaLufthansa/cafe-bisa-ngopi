@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Buat Transaksi</h2>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card bg-light mb-3 shadow-sm">
                <div class="card-body">
                    <form action="/store" method="post">
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
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan" name="nama_pelanggan" aria-describedby="emailHelp" placeholder="Nama Pelanggan" value="{{ old('nama_pelanggan') }}">
                            @error('nama_pelanggan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu</label>
                            <select class="form-select @error('nama_menu') is-invalid @enderror" id="nama_menu" name="nama_menu" aria-label="Default select example">
                                
                            @if ($menus->count())
                                <option value="">=== Pilih Menu ===</option>
                                @foreach ($menus as $menu)
                                    @if (old('nama_menu') == $menu->id)
                                        <option value="{{ $menu->id }}" selected>{{ $menu->nama }} | {{ $menu->harga }}</option>
                                    @else
                                        <option value="{{ $menu->id }}">{{ $menu->nama }} | {{ $menu->harga }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">===Data menu masih kosong===</option>
                            @endif

                            </select>
                            @error('nama_menu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" aria-describedby="emailHelp" placeholder="Jumlah" value="{{ old('jumlah') }}">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="number" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" name="total_harga" aria-describedby="emailHelp" value="0" readonly>
                            @error('total_harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_kasir" class="form-label">Nama Kasir</label>
                            <input type="text" class="form-control" id="nama_kasir" name="nama_kasir" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="justify-content-between d-flex">
                            <a href="/transaksi" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Buat Transaksi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        {{-- <div class="col-lg-7">
            <div class="card bg-light shadow-sm">
                <div class="card-header">
                    Nomor Transaksi - <span class="fw-bold"></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                            <label for="total_transaksi" class="form-label">Total Keseluruhan</label>
                            <input type="number" class="form-control" id="total_transaksi" name="total_transaksi" placeholder="0" disabled>
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
        </div> --}}
    </div>
@endsection