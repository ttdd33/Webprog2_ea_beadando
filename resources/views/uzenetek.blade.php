<x-mainpage>
    <x-slot:title>Üzenetek</x-slot:title>

    <header class="py-5 bg-light border-bottom">
        <div class="container px-5">
            <h1 class="fw-bolder">Üzenetek</h1>
            <p class="lead text-muted mb-0">A Kapcsolat űrlapon érkezett üzenetek, a legfrissebb elöl. (Csak bejelentkezett felhasználóknak.)</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-5">
            <div class="table-wrap">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 160px">Küldés ideje</th>
                            <th>Név</th>
                            <th>E-mail</th>
                            <th>Tárgy</th>
                            <th>Üzenet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($uzenetek as $uzenet)
                            <tr>
                                <td class="text-nowrap">{{ $uzenet->created_at->format('Y.m.d H:i:s') }}</td>
                                <td>{{ $uzenet->nev }}</td>
                                <td>{{ $uzenet->email }}</td>
                                <td class="fw-semibold">{{ $uzenet->targy }}</td>
                                <td>{{ $uzenet->uzenet }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted p-4">Még nem érkezett üzenet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-mainpage>
