{{-- Forrás: Megoldasok.zip / 04a-Dynamic layout design / components/mainpage.blade.php
     Módosítás: a Start Bootstrap "Modern Business" reszponzív téma szerkezetére építve,
     külön header (menü) és footer (készítők) nézettel. --}}
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Net Pizzéria – Laravel beadandó">
    <title>{{ $title ?? 'Net Pizzéria' }} | Net Pizzéria</title>
    <link rel="icon" href="/favicon.ico">
    {{-- A téma CSS fájlja (Bootstrap 5-öt is tartalmazza) --}}
    <link href="/theme/css/styles.css" rel="stylesheet">
    {{-- Saját kiegészítő stílusok --}}
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    @include('header')

    @if (session('success'))
        <div class="container px-5 mt-4"><div class="alert alert-success mb-0">{{ session('success') }}</div></div>
    @endif
    @if (session('failed'))
        <div class="container px-5 mt-4"><div class="alert alert-danger mb-0">{{ session('failed') }}</div></div>
    @endif

    {{ $slot }}
</main>

@include('footer')

{{-- A téma eredeti HTML fájljaihoz hasonlóan a Bootstrap JS a CDN-ről töltődik (mobil menü nyitása) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/theme/js/scripts.js"></script>
@stack('scripts')
</body>
</html>
