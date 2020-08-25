@extends('layouts.default')

@section('content')
<section class="section-34">
    <div class="container">
        <h3 class="font-weight-bold">Eliminar su correo de la lista.</h3>
        <hr class="divider bg-red">
        <div class="row justify-content-center">
            <div class="offset-top-30 col-12 col-md-8 col-lg-6 col-xl-4">
                <!-- Unsubscribe Form -->
                <form class="subscribe-form" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="{{ $baseURL }}/unsubscribe">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text input-group-icon">
                                    <span class="mdi mdi-email">
                                    </span>
                                </span>
                            </span>
                            <input class="form-control" placeholder="Escribe tu e-mail" type="email" name="email" required>
                            @csrf
                            <span class="input-group-append">
                                <span class="input-group-text input-group-icon">
                                    <span class="mdi mdi-email  ">
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="grid-group-sm">
                            <button class="btn btn-sm btn-danger" id="subscribe-button" type="submit">Elimíname de la lista!</button>
                        </span>
                    </div>
                    <div class="form-output" id="form-output-footer">></div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
