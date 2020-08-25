@extends('layouts.default')

@section('content')
<section class="section-34">
    <div class="container">
        <h3>{{ __('subscribers.title') }}</h3>
        <h6>{{ __('subscribers.instructionsTitle') }}</h6>
        
        {!! __('subscribers.instructionsText') !!}
        
        <hr class="divider bg-red" />
        @if ( $subscribers !== null )
        <div class="row justify-content-center">
            <div class="col-6">
                <ul class="list-group">
                    @foreach ( $subscribers as $subscriber )
                    <li class="list-group-item">{{ $subscriber->email }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @else
        {!! __('subscribers.notFound') !!}
        @endif


    </div>
</section>
@endsection
