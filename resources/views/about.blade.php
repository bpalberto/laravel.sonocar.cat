@extends('layouts.default')


@section('content')
<!-- About-->
<section class="section-34 " data-preset='{"title":"Content block 2","category":"content","reload":true,"id":"content-block-2"}'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h1>{{ __('about.aboutUsTitle') }}</h1>
                <hr class="divider bg-red">
                {!! __('about.aboutUsText') !!}
            </div>
        </div>
        
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-10">
                <h1>{{ __('about.aboutUsWhoTitle') }}</h1>
                <hr class="divider bg-red">
                {!! __('about.aboutUsWhoText') !!}
            </div>
        </div>
        
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-10">
                <img class="rounded-20 border-2 border-secondary" src="{{ $imagesURL }}/sonocar-tienda.jpg">
            </div>
        </div>
    </div>
</section>

@endsection
