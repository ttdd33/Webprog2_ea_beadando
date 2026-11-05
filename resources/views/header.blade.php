{{-- Forrás: Megoldasok.zip / 07-08-Authentication / header.blade.php (menü szerepkörök szerint)
     és 04a-Dynamic layout design / header.blade.php (aktív menüpont jelölése Request::is-szel) --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand fw-bolder" href="/">Net Pizzéria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Menü"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{-- Mindenki látja (látogató is) --}}
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Főoldal</a></li>

                @if (Auth::check())
                    <li class="nav-item">
                        <form method="post" action="/logout" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Kijelentkezés ({{ Auth::user()->name }})</button>
                        </form>
                    </li>
                @else
                    {{-- Csak a nem bejelentkezett látogató --}}
                    <li class="nav-item"><a class="nav-link" href="/login">Bejelentkezés</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Regisztráció</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
