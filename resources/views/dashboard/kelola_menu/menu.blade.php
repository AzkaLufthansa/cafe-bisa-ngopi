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

    <a href="/menu/create" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Buat Menu</a>

    <div class="table-responsive-md">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @if($menus->count())
                @foreach ($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->nama }}</td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td>{{ $menu->harga }}</td>
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
@endsection