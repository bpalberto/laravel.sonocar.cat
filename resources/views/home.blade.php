@extends('layouts.default')

@section('content')
<section class="section-34">
    <div class="container">
        <h3>{{ __('translate.welcome-word') }} {{ Auth::user()->name }}</h3>
        <hr class="divider bg-red">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('translate.dashboard') }}</div>

                    <div class="card-body">
                        <div class="row">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <a href="{{ $baseURL }}/submit-vehicle" class="nav-item btn btn-warning my-2">{{ __('translate.add-vehicle') }}</a>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="{{ $catalogueURL }}" class="nav-item btn btn-warning my-2">{{ __('translate.admin-catalogue') }}</a>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="{{ $baseURL }}/admin/subscribers" class="nav-item btn btn-warning my-2">{{ __('translate.admin-subscribers') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
