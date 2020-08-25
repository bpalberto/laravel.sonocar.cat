@extends('layouts.default')
@section('header')
@parent
@endsection

@section('content')

<?php

$siteData = array(
    '$nombre_empresa' => $nombre_empresa,
    'propietario' => $propietario,
    'nif_propietario' => $nif_propietario,
    'direccion_html' => $direccion_html,
    'dominio' => $dominio,
    'email' => $email,
    'telefono' => $telefono
);
        
?>

<!-- Legal Info -->
<section class="section-34">
    <div class="container">
        <!-- MAIN TITLE -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h1>{{ __('legal.mainTitle') }}</h1>
                <hr class="divider bg-red">
            </div>
        </div>

        <!-- LEGAL INFO -->
        <div class="row justify-content-center offset-top-30">
            <div class="col-12 col-md-10">
                <!-- LSSI INFO -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <h3>{{ __('legal.noticeTitle') }}</h3>
                        <hr class="divider bg-red">
                        {!! __('legal.noticeText', $siteData) !!}
                    </div>
                </div>

                <!-- RESPONSABILITY LIMIT INFO -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <h3>{{ __('legal.respLimitTitle') }}</h3>
                        <hr class="divider bg-red">
                        {!! __('legal.respLimitText', $siteData) !!}
                    </div>
                </div>

                <!-- INTELLECTUAL PROPERTY INFO -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <h3>{{ __('legal.industrialPropertyTitle') }}</h3>
                        <hr class="divider bg-red">
                        {!! __('legal.industrialPropertyText', $siteData) !!}
                    </div>
                </div>

            </div>
        </div>

        <!-- LOPD INFO -->
        <div class="row justify-content-center offset-top-66">
            <div class="col-12 col-md-10">
                <h1>{{ __('legal.lopdTitle') }}</h1>
                <hr class="divider bg-red">

                <h4>{{ __('legal.lopdTreatmentInfoTitle') }}</h4>
                {!! __('legal.lopdTreatmentInfoText', $siteData) !!}
                
                <h4>{{ __('legal.purposeTreatmentTitle') }}</h4>
                {!! __('legal.purposeTreatmentText', $siteData) !!}
                
                <h4>{{ __('legal.legitimationTreatmentTitle') }}</h4>
                {!! __('legal.legitimationTreatmentText', $siteData) !!}
                
                <h4>{{ __('legal.recipientsTitle') }}</h4>
                {!! __('legal.recipientsText', $siteData) !!}
                
                <h4>{{ __('legal.rightsTitle') }}</h4>
                {!! __('legal.rightsText', $siteData) !!}
                
                <h4>{{ __('legal.originTitle') }}</h4>
                {!! __('legal.originText', $siteData) !!}
                
            </div>
        </div>

        <!-- CONTACT INFO -->
        <div class="row justify-content-center offset-top-66">
            <div class="col-12 col-md-10">
                <h1>{{ __('translate.contactInfoTitle') }}</h1>
                <hr class="divider bg-red">
                <address class="contact-info offset-top-30">
                    <div class="h4 text-uppercase font-weight-bold text-orange letter-space-none offset-top-none">
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

@section('footer')
@parent
@endsection