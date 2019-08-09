
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        Electronic Store - Admin
    </title>
    <link rel="icon" href="{{ asset('client/img') }}/core-img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/tables/datatable/datatables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/core/menu/menu-types/horizontal-menu.css">
    @yield('css')
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/style.css">
    @yield('style')
    <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded"
      data-open="click" data-menu="horizontal-menu" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item" style="padding-top: 5px;">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h3 class="brand-text">Electronic Store</h3><br>
                        <h5 class="brand-text">Your stores. Your place.</h5>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container container center-layout">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">Hii!,
                              <span class="user-name text-bold-700">Username</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{ asset('app-assets/images/avatar.png') }}" alt="avatar"><i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item btnLogout" href="#"><i class="ft-power"></i> Logout</a>
                            <form action="{{ url('logout') }}" method="post" id="formLogout" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
     role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->is('admin/transaksi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/admin/transaksi') }}"><i class="la la-dollar"></i>
                    <span>Data Transaksi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/kategori*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/admin/kategori') }}"><i class="la la-pie-chart"></i>
                    <span>Data Kategori</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/barang*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/admin/barang') }}"><i class="la la-sort-alpha-asc"></i>
                    <span>Data Produk</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/admin/user') }}"><i class="la la-user"></i>
                    <span>Data User</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="app-content container center-layout mt-2">
    @yield('content')
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-transparent footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                                                     target="_blank">PIXINVENT </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('app-assets') }}/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
@yield('js')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('app-assets') }}/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{ asset('app-assets') }}/js/core/app.js" type="text/javascript"></script>
<script src="{{ asset('app-assets') }}/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->

<script src="{{ asset('app-assets') }}/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
@yield('script')

<script>
    $(document).ready(function() {
        $('.btnLogout').on('click', function(e){
            e.preventDefault();
            $('#formLogout').submit();
        });
        $('body').on('click', '.btnDelete', function(e){
            e.preventDefault();

            var url = $(this).data('url');
            swal({
                title: "Konfirmasi tindakan",
                text: "Apakah anda yakin ingin menghapus data ini?",
                icon: "info",
                buttons: true,
            }).then(function(isConfirm ) {
                if(isConfirm) {
                    $('#formDelete').attr('action', url);
                    $('#formDelete').submit();
                }
            });
        });
    });
</script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
