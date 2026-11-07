<x-mainpage>
    <x-slot:title>Adatbázis</x-slot:title>

    <header class="py-5 bg-light border-bottom">
        <div class="container px-5">
            <h1 class="fw-bolder">Adatbázis</h1>
            <p class="lead text-muted mb-0">A pizzéria adatai három táblából: <strong>kategoria</strong>, <strong>pizza</strong> és <strong>rendeles</strong>.</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-5">
            <h2 class="fw-bolder mb-3">Kategóriák</h2>
            <div class="row gx-4 mb-5">
                @foreach ($kategoriak as $kategoria)
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">{{ $kategoria->nev }}</h5>
                                <div class="stat-szam text-primary">{{ $kategoria->ar }} Ft</div>
                                <div class="text-muted small">{{ $kategoria->pizzak_count }} féle pizza</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h2 class="fw-bolder mb-3">Pizzák</h2>
            <div class="table-wrap mb-5">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Pizza neve</th>
                            <th>Kategória</th>
                            <th class="text-end">Ár</th>
                            <th class="text-center">Vegetáriánus</th>
                            <th class="text-end">Eladott db</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pizzak as $pizza)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $pizza->nev }}</td>
                                <td class="text-capitalize">{{ $pizza->kategorianev }}</td>
                                <td class="text-end">{{ $pizza->kategoria?->ar }} Ft</td>
                                <td class="text-center">{{ $pizza->vegetarianus ? 'igen' : '–' }}</td>
                                <td class="text-end">{{ (int) $pizza->rendelesek_sum_darab }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h2 class="fw-bolder mb-3">A 10 legutolsó rendelés</h2>
            <div class="table-wrap">
                <table class="table table-sm table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Azonosító</th>
                            <th>Pizza</th>
                            <th class="text-end">Darab</th>
                            <th class="text-end">Fizetendő</th>
                            <th>Felvétel</th>
                            <th>Kiszállítás</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rendelesek as $rendeles)
                            <tr>
                                <td>{{ $rendeles->id }}</td>
                                <td>{{ $rendeles->pizzanev }}</td>
                                <td class="text-end">{{ $rendeles->darab }}</td>
                                <td class="text-end">{{ $rendeles->darab * ($rendeles->pizza?->kategoria?->ar ?? 0) }} Ft</td>
                                <td>{{ $rendeles->felvetel->format('Y.m.d H:i') }}</td>
                                <td>{{ $rendeles->kiszallitas->format('Y.m.d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-mainpage>
