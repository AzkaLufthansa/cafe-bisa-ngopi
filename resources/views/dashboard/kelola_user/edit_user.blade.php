@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Edit User</h2>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="/user/{{ $user->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" placeholder="Nama" value="{{ $user->name }}" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Alamat Email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" aria-label="Default select example">
                                    @foreach ($roles as $role)
                                    @if (old('role', $user->getRoleNames()->first()) == $role->name)
                                        <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                    @else
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <a href="/user" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection