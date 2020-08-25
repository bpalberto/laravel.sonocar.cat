@extends('layouts.app')


@section('htmlHead')
@yield('head')
@endsection


@section('pageHead')

<!-- Page Loader screen -->
<div class="page-loader page-loader-variant-1 bg-orange">
    <div><img src="{{ $imagesURL }}/logo.png" alt='<?php echo $nombre_empresa ?> Logo' />
        <div class="offset-top-41 text-center">
            <div class="inline">
                <span class="mdi mdi-64px mdi-cog mdi-spin-slow"></span>
                <span class="mdi mdi-96px mdi-cog mdi-spin-slow mdi-spin-reverse"></span>
            </div>
        </div>
    </div>
</div>
<!-- Page-->
<div class="page text-center">

    <!-- Page Head-->
    <header class="page-head slider-menu-position" data-preset='{"title":"Header with slider","category":"header, slider","reload":true,"id":"header-1"}'>
        <!-- RD Navbar Dark-->
        <div class="rd-navbar-wrap bg-orange">
            <nav class="rd-navbar container rd-navbar-floated rd-navbar-dark" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-auto-height="true" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
                <div class="rd-navbar-inner bg-orange">
                    <!-- RD Navbar Top Panel-->
                    <div class="rd-navbar-top-panel context-dark bg-orange">

                        <div class="left-side">
                            <address class="contact-info text-right"><span class="icon mdi mdi-cellphone-android"></span><?php echo $telefono; ?></address>
                        </div>
                        <div class="center">
                            <address class="contact-info text-right"><span class="icon mdi mdi-map-marker-radius"></span><?php echo $direccion_html; ?></address>
                        </div>
                        <div class="right-side">
                            <address class="contact-info text-right"><span class="icon mdi mdi-alarm"></span>{{ __('translate.timeTable') }}</address>
                        </div>

                    </div>
                    <div>
                        <!-- RD Navbar Panel -->
                        <div class="rd-navbar-panel bg-orange">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Top Panel Toggle-->
                            <button class="rd-navbar-top-panel-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-top-panel"><span></span></button>
                            <!--Navbar Brand-->
                            <div class="rd-navbar-brand col-6 col-md-4 col-xl-3 col-xxl-2 offset-top-10">
                                <a href="{{ $baseURL }}/"><img src="{{ $imagesURL }}/logo.png" alt="<?php echo $nombre_empresa ?> Logo" /></a>
                            </div>
                        </div>
                        <div class="rd-navbar-menu-wrap offset-top-10">
                            <div class="rd-navbar-nav-wrap offset-top-20">
                                <div class="rd-navbar-mobile-scroll">
                                    <!--Navbar Brand Mobile-->
                                    <div class="rd-navbar-mobile-brand">
                                        <a href="{{ $baseURL }}/"><img src="{{ $imagesURL }}/logo.png" alt="<?php echo $nombre_empresa ?> Logo" /></a>
                                    </div>
                                    <ul class="rd-navbar-nav">

                                    </ul>
                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        <!-- Authentication Links -->
                                        @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}"><span class="icon-xs mdi mdi-login text-green"></span></a>
                                        </li>
                                        @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span class="icon-xs mdi mdi-account"></span><span class="icon-xs mdi mdi-dots-vertical"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ $baseURL }}/home">{{ __('translate.dashboard') }}</a>
                                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                    {{ __('translate.logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @endguest
                                        <!-- /Authentication Links -->
                                        <li class="nav-item">
                                            <select id="language" class="selectpicker show-tick" name="language" data-style="rounded nav-link btn btn-sm btn-dark">
                                                @foreach(array_values(config('locale.languages')) as $language)
                                                <option class="" value="{{$language[0]}}" @if ($language[0]===App::getLocale()) selected @endif>{{ $language[3]}}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-success" href="{{ $catalogueURL }}">{{ __('translate.catalogueMenuName') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-dark" href="{{ $baseURL }}/contact">{{ __('translate.contactMenuName') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-dark" href="{{ $baseURL }}/about">{{ __('translate.aboutMenuName') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-dark" href="{{ $baseURL }}/legal">{{ __('translate.legalMenueName') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @endsection

    @section('pageContent')
    @yield('content')
    @endsection

    @section('pageFooter')
    <!-- Page Footer-->
    <section class="section-50">
    </section>
    <footer class="section-relative section-top-34 section-bottom-34 bg-orange page-footer context-dark" data-preset='{"title":"Footer","category":"footer","reload":true,"id":"footer"}'>
        <div class="m-3 p-3">
            <div class="row justify-content-md-center text-xl-left">
                <div class="col-md-12">
                    <div class="row justify-content-sm-center">
                        <div class="col-sm-10 col-md-3 text-left order-md-4 col-md-10 col-xl-3 offset-md-top-50 offset-xl-top-0 order-xl-2">

                        </div>
                        <div class="col-sm-10 col-md-3 offset-top-66 order-md-3 col-md-10 col-xl-2 offset-xl-top-0 order-xl-3">

                        </div>
                        <div class="col-sm-10 col-md-3 offset-top-66 order-md-2 offset-md-top-0 col-md-6 col-xl-4 order-xl-4">
                            <!-- newsletter Feed -->
                            <div class="inset-xl-left-20">
                                <h6 class="text-uppercase text-spacing-60 text-center text-md-right">{{ __('translate.subscribeTitle') }}</h6>
                                <p class="text-center text-md-right">
                                    {{ __('translate.subscribeText') }}
                                </p>
                                <div class="offset-top-30">
                                    <form class="subscribe-form" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="{{ $baseURL }}/subscribe">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text input-group-icon">
                                                        <span class="mdi mdi-email">
                                                        </span>
                                                    </span>
                                                </span>
                                                <input class="form-control" placeholder="{{ __('translate.subscribeEmailPlaceholder') }}" type="email" name="email">
                                                @csrf
                                                <span class="input-group-append">
                                                    <button class="btn btn-sm btn-dark" id="subscribe-button" type="submit">{{ __('translate.subscribeButtonName') }}</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="small">
                                            <a class="btn btn-xs btn-danger btn-block rounded" href="{{ $baseURL }}/unsubscribe">{{ __('translate.unsubscribeLinkTitle') }}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Footer brand-->
                        <div class="col-sm-10 col-md-3 offset-top-66 order-md-1 offset-md-top-0 col-md-6 col-xl-3 order-xl-1 text-center text-md-left">
                            <div class="footer-social">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a class="icon icon-xxs icon-circle icon-darkest-filled mdi mdi-facebook" href="https://www.facebook.com/sonocar" target="_blank"></a></li>
                                    <li class="list-inline-item"><a class="icon icon-xxs icon-circle icon-darkest-filled mdi mdi-instagram" href="https://www.instagram.com/sonocar/" target="_blank"></a></li>
                                    <li class="list-inline-item"><a class="icon icon-xxs icon-circle icon-darkest-filled mdi mdi-twitter" href="https://twitter.com/SONOCAR_" target="_blank"></a></li>
                                </ul>
                            </div>
                            <div class="footer-brand offset-top-66">
                                <a href="{{ $baseURL }}/">
                                    <img src="{{ $imagesURL }}/logo.png" alt="<?php echo $nombre_empresa; ?> Logo" />
                                </a>
                                <p class="text-darker offset-top-20 ">
                                    <span class="mdi mdi-18px mdi-registered-trademark"> </span>
                                    <?php $actualYear = date("Y", time());
                                     echo $actualYear." ".$nombre_empresa; ?>.<br/>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global">
</div>
@endsection


@section('pageScripts')
@yield('scripts')
@endsection