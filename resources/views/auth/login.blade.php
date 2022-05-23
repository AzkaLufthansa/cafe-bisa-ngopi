@extends('auth.layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <h5 class="card-header judul-kartu text-center fw-bold">Login</h5>
                <div class="card-body p-5">
                    <form action="/authenticate" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                            <label for="floatingInput">Alamat Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn tombol-auth w-100 mb-2">Login</button>
                        <a href="/register" class="d-block text-center">Belum punya akun?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection