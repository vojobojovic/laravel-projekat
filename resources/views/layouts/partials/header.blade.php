<header class="item header margin-top-0">
    <div class="wrapper">
        <nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- Ispravan link za Home -->
                    <a href="{{ route('home') }}" class="navbar-brand brand d-flex align-items-center" style="padding-top: 5px; padding-bottom: 5px;">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 70px;">
                    </a>
                </div>
                <div id="navbar-collapse-02" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Ispravan link za Home -->
                        <li class="propClone"><a href="{{ route('home') }}">Home</a></li>
                        <li class="propClone"><a href="{{ route('katalog') }}">Shop</a></li>
                        <li class="propClone"><a href="{{ route('kontakt') }}">Contact</a></li>
                         <li class="propClone"><a href="{{ route('login') }}">login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
