<x-mainpage>
    <x-slot:title>Kapcsolat</x-slot:title>

    {{-- A téma contact.html oldalának űrlap-elrendezése alapján --}}
    <section class="py-5">
        <div class="container px-5">
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Kapcsolat</h1>
                    <p class="lead fw-normal text-muted mb-0">Írjon a Net Pizzéria tulajdonosának!</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- novalidate: a böngésző nem ellenőriz, így a szerver oldali validáció látszik --}}
                        <form method="post" action="/kapcsolat" novalidate>
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('nev') is-invalid @enderror" id="nev" name="nev" type="text" placeholder="Név" value="{{ old('nev') }}">
                                <label for="nev">Név</label>
                                @error('nev')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="nev@pelda.hu" value="{{ old('email', Auth::user()->email ?? '') }}">
                                <label for="email">E-mail cím</label>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('targy') is-invalid @enderror" id="targy" name="targy" type="text" placeholder="Tárgy" value="{{ old('targy') }}">
                                <label for="targy">Tárgy</label>
                                @error('targy')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('uzenet') is-invalid @enderror" id="uzenet" name="uzenet" placeholder="Üzenet" style="height: 10rem">{{ old('uzenet') }}</textarea>
                                <label for="uzenet">Üzenet</label>
                                @error('uzenet')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Küldés</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-mainpage>
