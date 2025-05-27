@extends('layouts.app')

@section('title', 'Katalog proizvoda')

@section('content')
<div class="container py-5" style="padding-top: 100px;">
    <h1 class="text-center mb-5" style="font-size: 36px; font-weight: 700;">Naš katalog proizvoda</h1>

    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm p-3">
                <h5>Filtriraj proizvode</h5>

                <form method="GET" action="{{ route('katalog') }}">
                    <!-- Filter po tipu proizvoda -->
                    <div class="mb-3">
                        <label for="tip" class="form-label">Tip proizvoda</label>
                        <select name="tip" id="tip" class="form-select">
                            <option value="">Svi tipovi</option>
                            <option value="haljina" {{ request('tip') == 'haljina' ? 'selected' : '' }}>Haljina</option>
                            <option value="suknja" {{ request('tip') == 'suknja' ? 'selected' : '' }}>Suknja</option>
                            <option value="kosulja" {{ request('tip') == 'kosulja' ? 'selected' : '' }}>Košulja</option>
                            <option value="sako" {{ request('tip') == 'sako' ? 'selected' : '' }}>Sako</option>
                        </select>
                    </div>

                    <!-- Filter po ceni -->
                    <div class="mb-3">
                        <label for="cena" class="form-label">Cena (RSD)</label>
                        <input type="number" name="min_cena" id="min_cena" class="form-control" placeholder="Min" value="{{ request('min_cena') }}">
                        <input type="number" name="max_cena" id="max_cena" class="form-control mt-2" placeholder="Max" value="{{ request('max_cena') }}">
                    </div>

                    <button type="submit" class="btn btn-outline-primary w-100">Filtriraj</button>
                </form>
            </div>
        </div>

        <!-- Katalog proizvoda -->
        <div class="col-md-9">
            <div class="row gx-5 gy-4">
                @forelse($proizvodi as $proizvod)
                    <div class="col-md-6 col-lg-4 d-flex">
                        <div class="card w-100 shadow-sm d-flex flex-column" style="font-size: 13px; height: 100%;">
                            <!-- Slika proizvoda -->
                            <div style="height: 220px; overflow: hidden;">
                                <img src="{{ asset('storage/proizvodi/' . $proizvod->slika) }}"
                                     class="card-img-top"
                                     alt="{{ $proizvod->naziv }}"
                                     style="width: 100%; height: 100%; object-fit: contain;">
                            </div>

                            <!-- Telo kartice -->
                            <div class="card-body d-flex flex-column py-3 px-3">
                                <h5 class="card-title mb-2" style="font-size: 18px; font-weight: 600;">{{ $proizvod->naziv }}</h5>
                                <p class="card-text text-muted mb-3" style="font-size: 14px;">{{ \Illuminate\Support\Str::limit($proizvod->opis, 80) }}</p>

                                <!-- Cena + dugme -->
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <strong style="font-size: 16px;">{{ number_format($proizvod->cena, 2) }} RSD</strong>
                                    <a href="{{ route('proizvod.show', $proizvod->id) }}"
                                       class="btn btn-sm"
                                       style="background-color: #00bba7; color: white; border-radius: 5px; padding: 8px 16px; font-size: 14px;">
                                        <i class="fa fa-info-circle"></i> Detaljnije
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Trenutno nema dostupnih proizvoda.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
