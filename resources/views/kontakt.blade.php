@extends('layouts.app')

@section('title', 'Kontakt')

@section('content')

<!-- CONTENT =============================-->
<section class="item content">
    <div class="container toparea py-5">
        <div class="underlined-title">
            <div class="editContent">
                <h1 class="text-center latestitems">Get in Touch</h1>
            </div>
            <div class="wow-hr type_short">
                <span class="wow-hr-h">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </span>
            </div>
        </div>

        <div class="row">
            <!-- Mapa sa leve strane -->
            <div class="col-lg-6 mb-4">
                <h3 class="text-center mb-3">Our Location</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46204.21706116446!2d20.131888449999998!3d43.6322797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4757974acbf04171%3A0x13376be2926145c2!2sPrilike!5e0!3m2!1sen!2srs!4v1748270034966!5m2!1sen!2srs" 
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Forma za kontakt sa desne strane -->
            <div class="col-lg-6 mb-4">
                <h3 class="text-center mb-3">Contact Us</h3>
                <div class="done">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Your message has been sent. Thank you!
                    </div>
                </div>
                <form method="post" action="contact.php" id="contactform">
                    <div class="form">
                        <input type="text" name="name" placeholder="Your Name *" class="form-control mb-3" required>
                        <input type="email" name="email" placeholder="Your E-mail Address *" class="form-control mb-3" required>
                        <textarea name="comment" rows="7" placeholder="Type your Message *" class="form-control mb-3" required></textarea>
                        <input type="submit" id="submit" class="btn btn-primary w-100" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- O NAMA SEKCIJA -->
<section class="item content py-5">
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
                    Naša firma je prisutna na tržištu već više od 15 godina, specijalizovani smo za proizvodnju i prodaju ručno rađene odeće. Kroz godine rada stekli smo veliki broj vernih kupaca koji prepoznaju naš kvalitet i posvećenost svakom komadu. 
                    <br><br>
                    Naš tim sastoji se od stručnjaka koji koriste najkvalitetnije materijale za proizvodnju, a posebnu pažnju posvećujemo detaljima u svakom delu procesa. 
                    <br><br>
                    Materijale nabavljamo od renomiranih dobavljača širom Evrope, garantujući dugotrajan kvalitet i komfor za naše kupce. Naš proizvodni proces je transparentan i fleksibilan, što znači da možemo da se prilagodimo specifičnim zahtevima naših klijenata.
                    <br><br>
                    Kroz dugogodišnje iskustvo i stalnu inovaciju, nastojimo da budemo lideri na tržištu i pružimo najbolje proizvode, kao i izuzetnu uslugu kupcima.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
