@extends('layouts.app')

@section('title', $proizvod->naziv)

@section('content')

<div class="d-flex flex-column min-vh-100">
    <main class="flex-fill">
        <div class="container" style="padding-top: 100px;">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/proizvodi/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-3">{{ $proizvod->naziv }}</h2>
                    <p class="text-muted">{{ $proizvod->opis }}</p>
                    <h4 class="mt-3 mb-4">Cena: {{ number_format($proizvod->cena, 2) }} RSD</h4>

                    <a href="{{ route('katalog') }}" class="btn btn-outline-secondary mt-2">
                        ← Nazad na katalog
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer iz app.blade će se ovde automatski zalepiti dole -->
</div>

@endsection


