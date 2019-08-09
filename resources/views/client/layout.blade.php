
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Gadget - Electronic Store</title>

    <link rel="icon" href="{{ asset('client/img') }}/core-img/favicon.png">

    <link rel="stylesheet" href="{{ asset('client/css') }}/core-style.css">
    <link rel="stylesheet" href="{{ asset('client') }}/style.css">
</head>
<body>

<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form action="{{ url('/produk') }}" method="get">
                        <input type="search" name="search" id="search" placeholder="Type your keyword..." value="{{ @request()->search }}">
                        <button type="submit"><img src="{{ asset('client/img') }}/core-img/search.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main-content-wrapper d-flex clearfix">

    <div class="mobile-nav">

        <div class="amado-navbar-brand">
            <a href="{{ url('/') }}"><img src="{{ asset('client/img') }}/core-logoimg/logo.jpg" alt=""></a>
        </div>

        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

    <header class="header-area clearfix">

        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>

        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('client/img') }}/core-img/logo.jpg" alt=""></a>
        </div>

        <nav class="amado-nav">
            <ul>
                <li class="{{ request()->is('produk*') ? 'active' : '' }}"><a href="{{ url('/produk') }}">Shop</a></li>
                <li class="{{ request()->is('order*') ? 'active' : '' }}"><a href="{{ url('/order') }}">My Orders</a></li>
                @if(@auth()->user())
                    <li>
                        <a href="#" class="btnLogout">Logout</a>
                        <form action="{{ url('logout') }}" method="post" id="formLogout" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @endif
            </ul>
        </nav>

        <div class="cart-fav-search mb-100">
            <a href="{{ url('/cart') }}" class="cart-nav"><img src="{{ asset('client/img') }}/core-img/cart.png" alt=""> Cart
                <span>
                    @if(@auth()->user() && (auth()->user()->cart->count() > 0))
                        ({{ auth()->user()->cart->count() }})
                    @else
                        {{ '(0)' }}
                    @endif
                </span></a>
            <a href="#" class="search-nav"><img src="{{ asset('client/img') }}/core-img/search.png" alt=""> Search</a>
        </div>
    </header>

    @yield('content')
</div>

<footer class="footer_area clearfix">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-12 col-lg-4">
                <div class="single_widget_area">

                    <div class="footer-logo mr-50">
                        
                    </div>

                    <p class="copywrite">
                        Copyright &copy;<script type="5838f921840d42f76bcec10e-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="single_widget_area">

                    <div class="footer_menu">
                        <nav class="navbar navbar-expand-lg justify-content-end">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                            <div class="collapse navbar-collapse" id="footerNavContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item {{ request()->is('produk*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ url('/produk') }}">Shop</a>
                                    </li>
                                    <li class="nav-item {{ request()->is('order*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ url('/order') }}">My Orders</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('client/js') }}/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{{ asset('client/js') }}/popper.min.js" type="text/javascript"></script>
<script src="{{ asset('client/js') }}/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('client/js') }}/plugins.js" type="text/javascript"></script>
<script src="{{ asset('client/js') }}/active.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('.btnLogout').on('click', function (e) {
            e.preventDefault();
            $('#formLogout').submit();
        });
    });
</script>
</body>
</html>
