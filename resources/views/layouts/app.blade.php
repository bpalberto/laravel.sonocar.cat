<!DOCTYPE html>
<html class="wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @section('generalHTLMHead')
        <title><?php echo $nombre_empresa ?></title>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="Cache-control" content="no-cache">

        <link rel="icon" href="{{ $imagesURL }}/favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="{{ $cssURL }}/bootstrap.css">
        <link rel="stylesheet" href="{{ $cssURL }}/bootstrap-select.css">
        <link rel="stylesheet" href="{{ $cssURL }}/materialdesignicons.css">
        <link rel="stylesheet" href="{{ $cssURL }}/style.css">
        @show
        @yield('htmlHead')
    </head>

    <body>
        @yield('pageHead')

        @yield('pageContent')

        @yield('pageFooter')


        <div class="design-by">
            <p>
                <span class="mdi mdi-24px mdi-ruler-square-compass"> </span>
                <a href="mailto:bp.alberto@gmail.com">{{ __('translate.designedBy') }} Alberto Blanco Pereiro</a>
            </p>
        </div>


        @section('generalScripts')

        <!-- Java script-->

        <script src="{{ $jsURL }}/jquery-3.5.1.min.js"></script>
        <script src="{{ $jsURL }}/bootstrap.bundle.js"></script>

        <script src="{{ $jsURL }}/bootstrap-select.min.js"></script>
        <script src="{{ $jsURL }}/i18n/defaults-es_ES.js"></script>

        <script src="{{ $jsURL }}/extra.js"></script>
        <script src="{{ $jsURL }}/script.js"></script>
        <script type="application/javascript">
            $("#language").change(function () {
            window.location = './lang/' + $("#language").val();
            });
        </script>
        @show
        @yield('pageScripts')
        
    </body>

</html>
