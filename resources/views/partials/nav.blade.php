{{-- <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{ menu('main', 'partials.menu.main') }}
            <div>
                <input id="search" name="search" style="width:400px; margin:0;" id="search" class="form-control custom-border" placeholder="Search" aria-label="Search">
            </div>
        </div>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            @if (auth()->user()->can('browse_admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin') }}">Admin Panel</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/cart') }}">Your cart</a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                            {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
    </div>
</nav>
<div id="cont">
    <ul style="height:4em">

    </ul>
</div> --}}

<header class="header">
    <div class="container">
        <nav class="navbar-expand-lg">
            <div class="container-fluid">
                <div class="row page-header">
                    <div class="col-md-2">
                        <a href="{{ url('/') }}">
                            <img src="{{ '/images/logo.png' }}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-md-10">
                        <div class="utils">
                            <div class="utils-btn" id="search-show">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <div class="search-bar">
                                <div class="search-bar__container">
                                    <div id="search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <form action="#" method="get" class="search-form" role="search">
                                        <input type="search" name="search" id="open-search-closed"
                                            placeholder="Search our store" class="search-form__input">
                                    </form>
                                    <div id="search-hide">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="utils-btn user-btn">
                                <i class="fa-solid fa-user"></i>
                                <ul class="account-menu">
                                    <li class="account-menu__link"><a href="{{ route('login') }}">Log in</a></li>
                                    <li class="account-menu__link"><a href="{{ route('register') }}">Create an
                                            account</a></li>
                                </ul>
                            </div>
                            <div class="utils-btn" id="open-cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav site-nav">
                            <li class="site-nav__item">
                                <a href="{{ url('/') }}" class="site-nav__link">Home</a>
                            </li>
                            <li class="site-nav__item site-nav__item--has-dropdown">
                                <a href="{{ url('/shop') }}" class="site-nav__link">
                                    Shop
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <div class="site-nav__dropdown small-dropdown">
                                    <ul class="small-dropdown__container">
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">PCB</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Case</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Plate</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">KIT</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Switches</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Keycaps</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Deskmats</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Wrist
                                                Rest</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Tape
                                                Mod</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Keyboard</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">B-Stock</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Accessories</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="site-nav__item site-nav__item--has-dropdown">
                                <a href="#" class="site-nav__link">
                                    Keyboard Category
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <div class="site-nav__dropdown small-dropdown">
                                    <ul class="small-dropdown__container">
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tiger-Lite</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Solar</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu60</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu65</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu68</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu84</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu96</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Blade60</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Blade65</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="site-nav__item site-nav__item--has-dropdown">
                                <a href="#" class="site-nav__link">
                                    Group buy
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <div class="site-nav__dropdown small-dropdown">
                                    <ul class="small-dropdown__container">
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Live</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Coming
                                                Soon</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">In
                                                Production</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Updates</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">End</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="site-nav__item site-nav__item--has-dropdown">
                                <a href="#" class="site-nav__link">
                                    Ready to use
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <div class="site-nav__dropdown small-dropdown">
                                    <ul class="small-dropdown__container">
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">20%
                                                Keyboard</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">60%
                                                Keyboard</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">65%
                                                Keyboard</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">75%
                                                Keyboard</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">80%
                                                Keyboard</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">95%
                                                Keyboard</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="site-nav__item site-nav__item--has-dropdown">
                                <a href="#" class="site-nav__link">
                                    PBT's fans
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <div class="site-nav__dropdown small-dropdown">
                                    <ul class="small-dropdown__container">
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tiger-Lite</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#" class="site-nav__link site-nav__dropdown-link">Solar</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu60</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu65</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu68</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu84</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Tofu96</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Blade60</a>
                                        </li>
                                        <li class="small-dropdown__item">
                                            <a href="#"
                                                class="site-nav__link site-nav__dropdown-link">Blade65</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>

        </nav>

    </div>
</header>

<script>
    var searcher = $('#open-search-closed');
    var searchButton = $('#search');

    function performSearch() {
        if (searcher.val().length > 2) {
            location.href = '/shop/search/' + searcher.val();
        } else {
            alert('Độ dài tối thiểu của truy vấn là 3');
        }
    }

    searcher.on('keypress', function(e) {
        if (e.which == 13) {
            performSearch();
        }
    });

    searchButton.on('click', function() {
        console.log('click clicked')
        performSearch();
    });
    // var searcher = $('#open-search-closed')
    // searcher.on('keypress', function(e) {
    //     if (e.which == 13) {
    //         if (searcher.val().length > 2) {
    //             location.href = '/shop/search/' + searcher.val();
    //         } else {
    //             alert('Minimun query length is 3');
    //         }
    //     }
    // });
</script>
