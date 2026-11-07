{{-- Közös űrlapmezők az új pizza és a szerkesztés oldalhoz --}}
<div class="mb-3">
    <label class="form-label" for="nev">Név</label>
    <input type="text" id="nev" name="nev" class="form-control @error('nev') is-invalid @enderror" value="{{ old('nev', $pizza->nev ?? '') }}" required>
    @error('nev')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label" for="kategorianev">Kategória</label>
    <select id="kategorianev" name="kategorianev" class="form-select @error('kategorianev') is-invalid @enderror" required>
        <option value="">– válasszon –</option>
        @foreach ($kategoriak as $kategoria)
            <option value="{{ $kategoria->nev }}" @selected(old('kategorianev', $pizza->kategorianev ?? '') == $kategoria->nev)>
                {{ $kategoria->nev }} ({{ $kategoria->ar }} Ft)
            </option>
        @endforeach
    </select>
    @error('kategorianev')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="form-check mb-4">
    <input type="checkbox" id="vegetarianus" name="vegetarianus" value="1" class="form-check-input" @checked(old('vegetarianus', $pizza->vegetarianus ?? false))>
    <label class="form-check-label" for="vegetarianus">Vegetáriánus</label>
</div>
