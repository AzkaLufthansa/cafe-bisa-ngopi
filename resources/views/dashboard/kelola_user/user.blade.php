@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Users</h2>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/user/create" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Buat User</a>

    <div class="table-responsive-md">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @if($users->count())
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->first() }}</td>
                    <td>
                        <a href="/user/{{ $user->id }}/edit"><span class="badge bg-warning"><i class="fa-solid fa-edit"></i></span></a>
                        <form action="/user/{{ $user->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Hapus user ini?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center table-warning" colspan="4">Data user masih kosong!</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection