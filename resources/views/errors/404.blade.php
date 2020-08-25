@extends('layouts.default')

@section('content')
<section class="section-34">
    <div class="container mt-5 m-b5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-danger text-center p-5 mb-5" role="alert">
                    <span class="mdi mdi-64px mdi-magnify-close"></span>
                    <h1>ERROR</h1>
                    <h3>404</h3>
                    <h6>{{ __('translate.errorNotFoundText') }}</h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

