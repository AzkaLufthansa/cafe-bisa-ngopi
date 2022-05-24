{{-- Header --}}
<header id="header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="/" class="navbar-brand"><i class="fa-solid fa-mug-hot"></i> c b n</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/#content" class="nav-link">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="nav-link {{ Request::is('login', 'register') ? 'aktif' : '' }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
{{-- Header End --}}