@extends('auth.layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg">
                <h5 class="card-header judul-kartu text-center fw-bold">Login</h5>
                <div class="card-body p-5">
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" style="background-color: #eeeeee" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                            <label for="floatingInput">Alamat Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" style="background-color: #eeeeee" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn tombol-auth w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection