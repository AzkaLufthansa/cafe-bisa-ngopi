@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Menu</h2>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
        <a href="/menu/create" class="btn btn-success"><i class="fa-solid fa-plus"></i> Buat Menu</a>
        <a href="/export_menu" class="btn btn-info"><i class="fa-solid fa-file-pdf"></i> Export PDF</a>
    </div>

    <div class="row justify-content-end">
        <div class="col-lg-4">
            <form action="/menu" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request('keyword') }}">
                    <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive-md">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="20%">Nama</th>
                    <th scope="col" width="25%">Deskripsi</th>
                    <th scope="col" width="15%">Harga</th>
                    <th scope="col" width="25%">Gambar</th>
                    <th scope="col" width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @if($menus->count())
                @foreach ($menus as $menu)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $menu->nama }}</td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td>Rp. {{ number_format($menu->harga) }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}" class="img-thumbnail" width="170">
                    </td>
                    <td>
                        <a href="/menu/{{ $menu->id }}/edit"><span class="badge bg-warning"><i class="fa-solid fa-edit"></i></span></a>
                        <form action="/menu/{{ $menu->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Hapus menu ini?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center table-warning" colspan="7">Data menu masih kosong!</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $menus->links() }}
    </div>
@endsection