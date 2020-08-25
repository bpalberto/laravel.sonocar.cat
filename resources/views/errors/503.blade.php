@extends('layouts.maintenance')

@section('content')
<section class="section-34">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 rounded-20 col-lg-7 alert alert-warning text-center p-3 mt-5">
                <span class="mdi mdi-48px mdi-progress-wrench mdi-spin-slow"></span>
                <h1 class="text-warning">Volvemos enseguida</h1>
                <h3 class="alert-warning">En estos momentos estamos realizando tareas de mantenimiento.</h3>
                <p>Disculpa las molestias, estaremos de vuelta en breve.</p>
            </div>
        </div>
    </div>
</section>
<section class="section-bottom-34">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3>{{ __('translate.contactInfoTitle') }}</h3>
                <hr class="divider bg-red">
                <address class="contact-info offset-top-30">
                    <div class="h6 text-uppercase font-weight-bold text-orange letter-space-none offset-top-none">
                        <p>
                            <?php echo $nombre_empresa . ' ' . $poblacion; ?>
                        </p>
                    </div>
                    <dl>
                        <dt class="text-bold">{{ __('translate.addressTitle') }} </dt>
                        <dd><?php echo $direccion_html; ?></dd>
                    </dl>
                    <dl>
                        <dt class="text-bold">{{ __('translate.timeTableTitle') }} </dt>
                        <dd>{{ __('translate.timeTable') }}</dd>
                    </dl>
                    <dl>
                        <dt class="text-bold">{{ __('translate.phoneTitle') }} </dt>
                        <dd><?php echo $telefono; ?></dd>
                    </dl>
                    <dl>
                        <dt class="text-bold">{{ __('translate.mailTitle') }} </dt>
                        <dd><?php echo $email; ?></dd>
                    </dl>
                </address>
            </div>
        </div>
    </div>
</section>
@endsection

