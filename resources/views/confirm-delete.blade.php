@extends('layouts.default')

@section('content')
<section class='section-34'>
    <div class='container'>
        <!-- BODY content-->
        @if ($vehicle !== null)

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-danger text-center p-5 mb-5" role="alert">
                    <h3 class="text-danger">{{ __('catalogue.deleteQuestionText') }}</h3>
                    <p>
                        id: {{ $vehicle->id }}<br/>
                        {{ $vehicle->maker->name }}<br/>
                        {{ $vehicle->model->name }} - {{ $vehicle->modelVersion }}<br/>
                    </p>
                    <p><a href="{{ $baseURL }}/delete/vehicle/{{ $vehicle->id }}/yes" class="nav-item btn btn-danger mr-4 my-2">{{ __('catalogue.deleteConfirmButton') }}</a></p>
                    <p class="rounded-20 text-danger text-uppercase text-bold bg-warning p-3">{{ __('catalogue.notUndoText') }}</p>
                </div>
            </div>
        </div>
        
        @else

        @if (isset($confirm))
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modalTrigger" data-toggle="modal" data-target="#modalResult">Launch modal</button>

        @if ($confirm)
        <div class="modal fade" id="modalResult" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('catalogue.successTitle') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>{{ __('catalogue.deletedSuccessText') }}</h3>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ $catalogueURL }}" class="btn btn-success">{{ __('translate.goBackButton') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="modal fade" id="modalResult" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">{{ __('catalogue.errorTitle') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('catalogue.errorText') }}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ $catalogueURL }}" class="btn btn-danger text-white">{{ __('translate.goBackButton') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @endif
    </div>

    @endif
    <div class="row justify-content-center">
        <p><a href='{{ $catalogueURL }}' class='btn btn-primary'>{{ __('translate.goBackButton') }}</a></p>
    </div>


</section>
@endsection

@section('scripts')
<script type="text/javascript">
    window.onload = document.getElementById('modalTrigger').click();
</script>
@endsection