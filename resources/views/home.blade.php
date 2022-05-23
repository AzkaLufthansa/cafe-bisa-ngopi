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

        {{-- Main --}}
        <main id="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h2>Cafe Bisa Ngopi</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit expedita laboriosam similique quae officiis accusamus rem magni, ea, perspiciatis atque adipisci eveniet saepe quaerat! Hic mollitia quae earum deserunt repudiandae!</p>

                        <a href="#" class="readMore">NGOPI</a>
                    </div>
                </div>
            </div>
        </main>
        {{-- Main End --}}

        {{-- Content --}}
        <section id="content">
            <div class="container pt-5">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <p>neque vitae tempus quam pellentesque nec nam aliquam sem et tortor consequat id porta nibh venenatis cras sed felis eget</p>
                        <p>nunc lobortis mattis aliquam faucibus purus in massa tempor nec feugiat nisl pretium fusce id velit ut tortor pretium viverra</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus voluptates eius maxime repellat, minima iusto aspernatur consectetur illo, voluptas vitae nam quaerat veniam hic ab.</p>
                        <p>mi eget mauris pharetra et ultrices neque ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae proin sagittis nisl</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- Content End --}}

        {{-- Footer --}}
        <footer id="footer" class="text-light text-center p-3">
            <p class="mb-0">Created with <i class="fa-solid fa-brain" style="color: rgb(248, 169, 182)"></i> by <span class="fw-bold">Muhammad Azka Lufthansa</span> 2022</p>
        </footer>
        {{-- Footer End --}}

        {{-- JS Bundle --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>