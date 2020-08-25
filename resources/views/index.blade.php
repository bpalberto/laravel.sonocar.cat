@extends('layouts.default')
@section('header')
@parent
@endsection

@section('content')
<!--Welcome-->
<section class="section-34 " data-preset='{"title":"Content block 1","category":"content","id":"content-block-1"}'>
  <div class="container">
    <h1>{{ __('translate.welcomeTo', ['companyName' => $nombre_empresa]) }}</h1>
    <hr class="divider bg-red">

    <div class="row justify-content-center offset-top-66">
      <div class="col-12">
        <h3>{{ $nombre_empresa }} {{ __('translate.indexSubTitle') }}</h3>
      </div>
    </div>

    <div class="row justify-content-center grid-group-lg offset-top-98">
      <div class="col-md-8 col-lg-4">
        <!-- Icon Box Type 5-->
        <div class="box-icon box-icon-bordered"><span class="  icon icon-outlined icon-sm mdi mdi-star-outline"></span>
          <h4 class="text-orange offset-top-20">{{ __('translate.indexQualifiedTitle') }}</h4>
          <p>{{ __('translate.indexQualifiedText') }}</p>
        </div>
      </div>

      <div class="col-md-8 col-lg-4">
        <!-- Icon Box Type 5-->
        <div class="box-icon box-icon-bordered"><span class="  icon icon-outlined icon-xs mdi mdi-thumb-up-outline"></span>
          <h4 class="text-orange offset-top-20">{{ __('translate.indexTrustedTitle') }}</h4>
          <p>{{ __('translate.indexTrustedText') }}</p>
          <p>
              <a href="https://www.carfax.es" target="_blank">
                  <img class="col-6 col-md-7 col-lg-9 col-xl-7" src="{{ $rootURL }}/images/carfax.png">
              </a>
          </p>
        </div>
      </div>

      <div class="col-md-8 col-lg-4">
        <!-- Icon Box Type 5-->
        <div class="box-icon box-icon-bordered"><span class="icon icon-outlined icon-sm mdi mdi-account-check-outline"></span>
          <h4 class="text-orange offset-top-20">{{ __('translate.indexApproachTitle') }}</h4>
          <p>{{ __('translate.indexApproachText', ['companyName' => $nombre_empresa]) }}</p>
        </div>
      </div>
    </div>

    <div class="row justify-content-center offset-top-98">
      <div class="col-12 col-md-10 col-lg-8 col-xl-6 flex-column">
        <h6>{{ __('translate.indexComeIn') }}</h6>
        <p>
            <a class="btn btn-block btn-success" href="{{ $catalogueURL }}">{{ __('translate.catalogueMenuName') }}</a>
        </p>
      </div>
    </div>
  </div>
</section>
@endsection

@section('footer')
@parent
@endsection