<x-mainpage>
    <x-slot:title>Főoldal</x-slot:title>

    {{-- Fejléc (hero) rész – a téma index.html oldalának header szekciója alapján --}}
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Net Pizzéria – éjjel-nappal</h1>
                        <p class="lead fw-normal text-white-50 mb-4">
                            Óriási pizzaválaszték, rendelés SMS-ben, gyors kiszállítás.
                            Ez az alkalmazás a pizzéria pizzáit, kategóriáit és rendeléseit mutatja be.
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/adatbazis">Pizzáink</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="/diagram">Statisztika</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <img class="img-fluid rounded-3 my-5 hero-kep" src="/img/pizza1.jpg" alt="Pizza">
                </div>
            </div>
        </div>
    </header>

    {{-- Számok az adatbázisból --}}
    <section class="py-5 border-bottom">
        <div class="container px-5">
            <div class="row gx-5 text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="stat-szam text-primary">{{ $pizzaDb }}</div>
                    <div class="text-muted">féle pizza</div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="stat-szam text-primary">{{ $kategoriaDb }}</div>
                    <div class="text-muted">árkategória</div>
                </div>
                <div class="col-md-4">
                    <div class="stat-szam text-primary">{{ number_format($rendelesDb, 0, ',', ' ') }}</div>
                    <div class="text-muted">teljesített rendelés</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bemutató kártyák – a téma "features" és "blog preview" szekciói alapján --}}
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Mit talál az oldalon?</h2>
                        <p class="lead fw-normal text-muted mb-5">A pizzériába nem lehet beülni, de az oldalon mindent megtudhat a kínálatunkról.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top pizza-kep" src="/img/pizza2.jpg" alt="Pizzák">
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Adatbázis</div>
                            <h5 class="card-title mb-3">Pizzák és kategóriák</h5>
                            <p class="card-text mb-0">Mind a {{ $pizzaDb }} pizzánk kategóriával, árral és az eddig eladott mennyiséggel.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <a class="btn btn-outline-primary" href="/adatbazis">Megnézem</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top pizza-kep" src="/img/pizza3.jpg" alt="Statisztika">
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Diagram</div>
                            <h5 class="card-title mb-3">Rendelési statisztika</h5>
                            <p class="card-text mb-0">Havi rendelésszám és a kategóriák szerinti eladások Chart.js diagramokon.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <a class="btn btn-outline-primary" href="/diagram">Megnézem</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top pizza-kep" src="/img/pizza4.jpg" alt="Kapcsolat">
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Kapcsolat</div>
                            <h5 class="card-title mb-3">Írjon nekünk!</h5>
                            <p class="card-text mb-0">Kérdése, ötlete van? Az üzeneteket a regisztrált látogatók az Üzenetek menüben látják.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <a class="btn btn-outline-primary" href="/kapcsolat">Üzenetet küldök</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-mainpage>
