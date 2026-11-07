<x-mainpage>
    <x-slot:title>Diagram</x-slot:title>

    <header class="py-5 bg-light border-bottom">
        <div class="container px-5">
            <h1 class="fw-bolder">Diagram</h1>
            <p class="lead text-muted mb-0">Statisztikák a rendeles, pizza és kategoria táblák adataiból (Chart.js).</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-lg-8 mb-5">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body p-4">
                            <h5 class="fw-bolder">Rendelések száma havonta</h5>
                            <div class="chart-box"><canvas id="haviDiagram"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body p-4">
                            <h5 class="fw-bolder">Eladott pizzák kategóriánként</h5>
                            <div class="chart-box"><canvas id="kategoriaDiagram"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow border-0">
                        <div class="card-body p-4">
                            <h5 class="fw-bolder">A 10 legnépszerűbb pizza (eladott darab)</h5>
                            <div class="chart-box"><canvas id="topDiagram"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        {{-- Chart.js – a https://www.chartjs.org/ oldalról letöltött fájl --}}
        <script src="/js/chart.umd.min.js"></script>
        <script>
            new Chart(document.getElementById('haviDiagram'), {
                type: 'line',
                data: {
                    labels: @json($haviCimkek),
                    datasets: [{
                        label: 'Rendelések száma',
                        data: @json($haviAdatok),
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.15)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: { maintainAspectRatio: false, plugins: { legend: { display: false } } }
            });

            new Chart(document.getElementById('kategoriaDiagram'), {
                type: 'doughnut',
                data: {
                    labels: @json($katCimkek),
                    datasets: [{
                        data: @json($katAdatok),
                        backgroundColor: ['#0d6efd', '#dc3545', '#ffc107', '#198754']
                    }]
                },
                options: { maintainAspectRatio: false }
            });

            new Chart(document.getElementById('topDiagram'), {
                type: 'bar',
                data: {
                    labels: @json($topCimkek),
                    datasets: [{
                        label: 'Eladott darab',
                        data: @json($topAdatok),
                        backgroundColor: '#dc3545'
                    }]
                },
                options: { maintainAspectRatio: false, plugins: { legend: { display: false } } }
            });
        </script>
    @endpush
</x-mainpage>
