@extends('layouts.default')

@section('content')
<section class="section-66">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-sm-8 col-md-6">
                <h3 class="font-weight-bold">{{ __('translate.login') }}</h3>
                <hr class="divider bg-red">


                <!-- Login Form -->
                <form class="offset-top-50" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col form-group text-left">
                            <label class="form-label form-label-outside has-error rd-input-label focus not-empty" for="email">{{ __('translate.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group text-left offset-top-20">
                            <label class="form-label form-label-outside has-error rd-input-label focus not-empty" for="password">{{ __('translate.password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col form-check text-left offset-top-20 text-center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('translate.remember-me') }}
                            </label>
                        </div>
                    </div>
                    <div class="row justify-content-center offset-top-20">
                        @if (Route::has('password.request'))
                        <div class="col text-center order-2 col-xl-7 text-xl-left order-xl-1 offset-top-20">
                            <a class="btn btn-warning" href="{{ route('password.request') }}">
                                {{ __('translate.forgot-pwd') }}
                            </a>
                        </div>
                        @endif
                        <div class="col text-center order-1 col-xl-5 text-xl-right order-xl-2 offset-top-20">
                            <button type="submit" class="btn btn-primary">
                                {{ __('translate.btn-send') }}
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
