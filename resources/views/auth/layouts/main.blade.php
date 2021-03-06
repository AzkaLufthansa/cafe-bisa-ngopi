<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cafe Bisa Ngopi | {{ $title }}</title>
        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/713f5c53f1.js" crossorigin="anonymous"></script>
        {{-- My CSS --}}
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        @include('partials.navbar')

        {{-- Form --}}
        <main id="form">
            <div class="container">
                @yield('container')
            </div>
        </main>
        {{-- Form End --}}

        {{-- JS Bundle --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>