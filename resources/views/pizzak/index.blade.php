{{-- Forrás: Megoldasok.zip / 05-06-CRUD alkalmazás / persons/index.blade.php
     Módosítás: Tailwind helyett a téma (Bootstrap 5) osztályai, a saját x-mainpage layout-tal. --}}
<x-mainpage>
    <x-slot:title>CRUD – Pizzák</x-slot:title>

    <section class="py-5">
        <div class="container px-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <h1 class="fw-bolder mb-0">Pizzák kezelése (CRUD)</h1>
                <a href="{{ route('pizzak.create') }}" class="btn btn-primary">Új pizza</a>
            </div>
            <div class="table-wrap">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Név</th>
                            <th>Kategória</th>
                            <th class="text-end">Ár</th>
                            <th class="text-center">Vegetáriánus</th>
                            <th class="text-center">Műveletek</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pizzak as $pizza)
                            <tr>
                                <td>{{ $pizza->id }}</td>
                                <td class="fw-semibold">{{ $pizza->nev }}</td>
                                <td class="text-capitalize">{{ $pizza->kategorianev }}</td>
                                <td class="text-end">{{ $pizza->kategoria?->ar }} Ft</td>
                                <td class="text-center">{{ $pizza->vegetarianus ? 'igen' : '–' }}</td>
                                <td class="text-center text-nowrap">
                                    <a href="{{ route('pizzak.edit', $pizza->id) }}" class="btn btn-warning btn-sm">Szerkesztés</a>
                                    <form action="{{ route('pizzak.destroy', $pizza->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Biztosan törli?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted p-4">Még nincs pizza az adatbázisban.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-mainpage>
