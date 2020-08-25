@extends('layouts.default')
@section('header')
@parent
@endsection

@section('content')
<section class="section-34 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>{{ __('contact.contactWhereTitle') }}</h1>
                <hr class="divider bg-red">
                <div class="google-map-container">
                    <iframe class="rounded-20 border-3 border-secondary" src="{{ $google_maps_iframeURL }}" 
                            width="100%" height="550px" allowfullscreen aria-hidden="false"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-34" data-preset='{"title":"Contact form","category":"content, form","reload":true,"id":"form"}'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 offset-bottom-50">
                <div class="inset-md-right-80 text-md-left">
                    <h3>{{ __('translate.contactInfoTitle') }}</h3>
                    <hr class="divider bg-red hr-md-left-0">
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

            <div class="col-md-6 text-md-right">
                <h3>{{ __('contact.contactSendUsTitle') }}</h3>
                <hr class="divider bg-red hr-md-right-0">
                <!-- RD Mailform-->
                <form class="rd-mailform text-left offset-top-50" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{ $rootURL }}/bat/rd-mailform.php">
                    <div class="row novi-excluded">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label form-label-outside" for="contact-us-name">{{ __('translate.formNameLabel') }}</label>
                                <input class="form-control" id="contact-us-name" type="text" name="name" data-constraints="@Required">
                            </div>
                        </div>
                        <div class="col-xl-6 offset-top-20 offset-xl-top-0">
                            <div class="form-group">
                                <label class="form-label form-label-outside" for="contact-us-email">{{ __('translate.formEmailLabel') }}</label>
                                <input class="form-control" id="contact-us-email" type="email" name="email" data-constraints="@Required @Email">
                            </div>
                        </div>
                        <div class="col-xl-12 offset-top-20">
                            <div class="form-group">
                                <label class="form-label form-label-outside" for="contact-us-message">{{ __('translate.formMsgLabel') }}</label>
                                <textarea class="form-control" id="contact-us-message" name="message" data-constraints="@Required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="group-sm text-center text-xl-left offset-top-30">
                        @csrf
                        
                        <button class="btn btn-primary" type="submit">{{ __('translate.formBtnSend') }}</button>
                        <button class="btn btn-default" type="reset">{{ __('translate.formBtnReset') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
@parent
@endsection