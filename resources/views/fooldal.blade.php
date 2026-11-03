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

</x-mainpage>
