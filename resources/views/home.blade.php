@extends('layouts.app')

@section('title', 'Početna')

@section('content')

<!-- POČETNA SLIKA ODMAH ISPOD HEDERA -->
<section class="hero-image" style="position: relative;">
    <img src="{{ asset('images/pocetna.jpg') }}"
         alt="Početna slika"
         style="width: 100%; max-height: 500px; object-fit: cover; display: block; margin-bottom: 30px;">
    
    <!-- Tekst centriran na slici -->
    <div class="text-overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center; font-size: 2rem; font-weight: bold;">
        <h1 style="background: linear-gradient(135deg, #9e9e9e, #ffffff); -webkit-background-clip: text; color: transparent;">
            Dobrodošli u naš butik
        </h1>
        <p style="background: linear-gradient(135deg, #9e9e9e, #ffffff); -webkit-background-clip: text; color: transparent;">
            Elegancija na dohvat ruke
        </p>
    </div>
</section>




<!-- STEPS SEKCIJA -->
<div class="item content py-5">
    <div class="container toparea">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="col editContent">
                    <span class="numberstep"><i class="fa fa-shopping-cart"></i></span>
                    <h3 class="numbertext">Izaberite proizvod</h3>
                    <p>Pregledajte našu ponudu ručno rađenih proizvoda i pronađite idealan komad za vas.</p>
                </div>
            </div>

            <div class="col-md-4 editContent">
                <div class="col">
                    <span class="numberstep"><i class="fa fa-gift"></i></span>
                    <h3 class="numbertext">Platite karticom ili pouzećem</h3>
                    <p>Sigurna i brza kupovina uz mogućnost plaćanja po preuzimanju ili elektronski.</p>
                </div>
            </div>

            <div class="col-md-4 editContent">
                <div class="col">
                    <span class="numberstep"><i class="fa fa-truck"></i></span>
                    <h3 class="numbertext">Brza isporuka</h3>
                    <p>Vaš paket šaljemo u roku od 48h putem kurirske službe na vašu adresu.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ISTAKNUTI PROIZVODI -->
<section class="item content">
    <div class="container">
        <div class="underlined-title">
            <h1 class="text-center latestitems">Featured products</h1>
            <div class="wow-hr type_short">
                <span class="wow-hr-h">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </span>
            </div>
        </div>

        <div class="row">
            @if(isset($istaknuti))
                @foreach($istaknuti as $proizvod)
                    <div class="col-md-4 mb-4">
                        <div class="productbox">
                            <div class="fadeshop">
                                <div class="captionshop text-center" style="display: none;">
                                    <h3>{{ $proizvod->naziv }}</h3>
                                    <p>{{ \Illuminate\Support\Str::limit($proizvod->opis, 80) }}</p>
                                    <p>
                                        <a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i> Detalji</a>
                                    </p>
                                </div>
                                <span class="maxproduct">
                                    <img src="{{ asset('storage/proizvodi/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}" class="img-responsive">
                                </span>
                            </div>
                            <div class="product-details text-center">
                                <a href="#"><h1>{{ $proizvod->naziv }}</h1></a>
                                <span class="price">
                                    <span class="edd_price">{{ number_format($proizvod->cena, 2) }} RSD</span>
                                </span>

                                <!-- STILIZOVANO DUGME DETALJNije -->
                                <div class="text-center mt-3">
                                    <a href="{{ route('proizvod.show', $proizvod->id) }}"
                                      class="btn btn-sm"
                                      style="background-color: #00bba7; color: white; padding: 8px 20px; border-radius: 4px;">
                                        <i class="fa fa-info-circle"></i> Detaljnije
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            @else
                <p class="text-center">Nema istaknutih proizvoda za prikaz.</p>
            @endif
        </div>
    </div>
</section>


<!-- O NAMA SEKCIJA -->
<section class="item content">
    <div class="container">
        <div class="underlined-title">
            <h1 class="text-center latestitems">About Us</h1>
            <div class="wow-hr type_short">
                <span class="wow-hr-h">
                    <i class="fa fa-heart"></i><i class="fa fa-heart"></i><i class="fa fa-heart"></i>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <p style="font-size: 18px; line-height: 1.8;">
                    Naš butik je porodična firma koja se bavi šivenjem unikatne garderobe po meri.
                    Već više od 10 godina spajamo kvalitet, stil i tradiciju kako bismo našim klijentima
                    pružili vrhunsko iskustvo. Svaki komad izrađujemo ručno, sa puno pažnje i ljubavi.
                    Verujemo u autentičnost i prilagođavamo se svakom kupcu.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- CALL TO ACTION -->
<section class="content-block" style="background-color:#00bba7;">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
                    <h1 class="callactiontitle mb-4">
                          Pogledajte celu kolekciju u našem katalogu
                    </h1>
                        <a href="{{ route('katalog') }}" class="btn btn-lg btn-outline-light px-5 py-3">
                            <i class="fa fa-eye"></i> Pogledaj katalog
                        </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
