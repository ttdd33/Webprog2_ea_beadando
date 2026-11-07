{{-- Forrás: Megoldasok.zip / 05-06-CRUD alkalmazás / persons/edit.blade.php --}}
<x-mainpage>
    <x-slot:title>Pizza szerkesztése</x-slot:title>
    <section class="py-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow border-0"><div class="card-body p-4">
                        <h1 class="h3 fw-bolder mb-4">Pizza szerkesztése</h1>
                        <form action="{{ route('pizzak.update', $pizza->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('pizzak._urlap')
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pizzak.index') }}" class="btn btn-outline-secondary">Mégse</a>
                                <button type="submit" class="btn btn-warning">Módosítás</button>
                            </div>
                        </form>
                    </div></div>
                </div>
            </div>
        </div>
    </section>
</x-mainpage>
