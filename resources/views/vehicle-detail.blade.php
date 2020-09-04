@extends('layouts.default')

@section('content')

<section class='section-34'>
    <div class="container">
        <!-- ADMIN NAV BAR -->
        @auth
        <!-- Admin Options -->
        <div class="row section-34">
            <nav id="adminMenuBar" class="col-12 justify-content-end navbar navbar-expand-lg navbar-light bg-light d-flex align-items-end">
                <a href="{{ $baseURL }}/modify/vehicle/{{ $vehicle->id }}" class="nav-item btn btn-warning mr-4 my-2">{{ __('catalogue.modifyButton') }}</a>
                <?php echo $menuSeparator; ?>
                <a href="{{ $baseURL }}/delete/vehicle/{{ $vehicle->id }}" class="nav-item btn btn-danger mr-4 my-2">{{ __('catalogue.deleteButton') }}</a>
            </nav>
        </div>
        @endauth

    </div>
    <div class='container'>
        <!-- BODY content-->
        <div class="container">
            <div class="row justify-content-center px-3 mt-5">
                <div class="col-12 col-md-8 col-lg-9 col-xxl-10 text-center text-md-left">
                    @if ( $vehicle->sold )
                    <h3 class="mt-0 text-danger">{{ __('catalogue.soldLabel') }}</h3>
                    @endif
                    <h2 class="mt-0 display-3">{{ $vehicle->maker->name }} - {{ $vehicle->model->name }}</h2>
                    <h4 class="mt-0 display-5">{{ $vehicle->modelVersion }}</h4>
                    <h3 class="mt-0"><span>{{ __('catalogue.priceLabel') }}: {{ number_format( $vehicle->price, 0, ',', '.') }}</span> €</h3>
                </div>

                <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                    <img class="img-cover rounded-20 border-1 border-orange" src="{{ $baseURL }}/getVehicleQRCodeBySKU?sku={{ $vehicle->crossReference }}&print=0">
                </div>

            </div>
        </div>

        <div class='row'>
            <div class="col-12">
                <!-- CARD START -->
                <div class='card'>
                    @if ( $vehicle->images->isNotEmpty() )
                    <div id="carousel" class="carousel slide bg-dark" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($vehicle->images as $key => $image)
                            @if ($key == 0)
                            <div class="carousel-item active" style="background-image: url('{{ $image->url ?? $image->fileName }}');"></div>
                            @else
                            <div class="carousel-item" style="background-image: url('{{ $image->url ?? $image->fileName }}');"></div>
                            @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                            <span class="btn btn-sm mdi mdi-48px mdi-chevron-left bg-orange"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                            <span class="btn btn-sm mdi mdi-48px mdi-chevron-right bg-orange"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <ol class="carousel-indicators">
                            @foreach ($vehicle->images as $key => $image)
                            @if ($key == 0)
                            <li data-target="#carousel" data-slide-to="{{ $key }}" class="active"></li>
                            @else
                            <li data-target="#carousel" data-slide-to="{{ $key }}"></li>
                            @endif
                            @endforeach
                        </ol>
                    </div>
                    @else
                    <div id="carouselVehicle{{ $vehicle->id }}Images" class="carousel slide bg-dark" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="catalogue carousel-item active">
                                <!--<div class="mdi mdi-128px {{ $mdiIconNoImage }} text-orange">-->
                                <div class="text-orange">
                                    <img class="no-image-svg" src="{{ $imagesURL }}/no-image.svg">
                                    <span class="no-image-text">{{ __('catalogue.noImageLabel') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class='card-body'>
                        <h3 class="text-center text-md-right"><span>{{ __('catalogue.priceLabel') }}: {{ number_format( $vehicle->price, 0, ',', '.') }}</span> €</h3>

                        @if ($vehicle->description !== null && !empty($vehicle->description))
                        <!-- DESCRIPTION -->
                        <div class=" text-left">
                            <div class="">
                                <div class="col-12">
                                    <p>
                                        <a class="btn btn-block btn-primary" data-toggle="collapse" href="#vehicleDescription" role="button" aria-expanded="false" aria-controls="vehicleDescription">
                                            {{ __('catalogue.descriptionLabel') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="collapse show" id="vehicleDescription">
                                <div class="card pb-5 p-md-5">
                                    {{ $vehicle->description }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class=" text-left">
                            <div class="">
                                <div class="col-12">
                                    <p>
                                        <a class="btn btn-block btn-primary" data-toggle="collapse" href="#vehicleDetails" role="button" aria-expanded="false" aria-controls="vehicleDetails">
                                            {{ __('catalogue.detailsLabel') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="collapse show" id="vehicleDetails">
                                <div class="card pb-5 p-md-5">

                                    <!-- GENERAL GROUP -->
                                    <div class="row">
                                        <div class="col-12 col-lg-6 order-2 order-lg-1">

                                            <!-- STATE -->
                                            <div class="row ">
                                                <div class="col-12">
                                                    <div class="">
                                                        <h4>{{ __('catalogue.stateLabel') }}</h4>
                                                    </div>
                                                    <div class="vehicle-details">
                                                        <dl>
                                                            <dt>{{ __('catalogue.offerTypeLabel') }}</dt>
                                                            <dd>
                                                                {{ __($vehicle->vehicleOfferType->nameTranslate) }}
                                                            </dd>
                                                            <dt class="">{{ __('catalogue.warrantyLabel') }}</dt>
                                                            <dd>
                                                                {{ $vehicle->warrantyMonths }} Meses
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TRACTION -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="">
                                                        <h4>{{ __('catalogue.tractionLabel') }}</h4>
                                                    </div>
                                                    <div class="vehicle-details">
                                                        <dl>
                                                            <dt class="">{{ __('catalogue.transmissionLabel') }}</dt>
                                                            <dd>
                                                                {{ __($vehicle->transmission->nameTranslate) }}
                                                            </dd>
                                                            <dt>{{ __('catalogue.gearsLabel') }}</dt>
                                                            <dd>
                                                                {{ $vehicle->gears }}
                                                            </dd>
                                                            <dt>{{ __('catalogue.weightLabel') }}</dt>
                                                            <dd>
                                                                {{ number_format( $vehicle->emptyWeight, 0, ',', '.') }} Kg
                                                            </dd>
                                                            <dt>{{ __('catalogue.tractionLabel') }}</dt>
                                                            <dd>
                                                                {{ __($vehicle->driveType->nameTranslate) }}
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DETAILS -->
                                        <div class="col-12 col-lg-6 order-1 order-lg-2">
                                            <div class="">
                                                <h4>{{ __('catalogue.detailsLabel') }}</h4>
                                            </div>
                                            <div class="vehicle-details">
                                                <dl>
                                                    <dt>{{ __('catalogue.makerLabel') }}</dt>
                                                    <dd>
                                                        {{ $vehicle->maker->name }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.modelLabel') }}</dt>
                                                    <dd>
                                                        {{ $vehicle->model->name }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.firstRegistrationLabel') }}</dt>
                                                    <dd>
                                                        {{ $vehicle->firstRegistration }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.bodyColorLabel') }}</dt>
                                                    <dd>
                                                        {{ __($vehicle->bodyColor->nameTranslate) }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.interiorColorLabel') }}</dt>
                                                    <dd>
                                                        {{ __($vehicle->interiorColor->nameTranslate) }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.categoryLabel') }}</dt>
                                                    <dd>
                                                        {{ __($vehicle->vehicleBody->nameTranslate) }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.doorsLabel') }}</dt>
                                                    <dd>
                                                        {{ $vehicle->doors }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.seatsLabel') }}</dt>
                                                    <dd>
                                                        {{ $vehicle->seats }}
                                                    </dd>
                                                </dl>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- ENVIRONMENT GROUP -->
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="">
                                                <h4>{{ __('catalogue.environmentLabel') }}</h4>
                                            </div>
                                            <div class="vehicle-details">
                                                <dl>
                                                    <dt class="">{{ __('catalogue.fuelLabel') }}</dt>
                                                    <dd>
                                                        {{ __($vehicle->fuelCategory->nameTranslate) }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.emissionsLabel') }}</dt>
                                                    <dd>
                                                        {{ $vehicle->co2 }} {{ __('catalogue.emissionsUnities') }}
                                                    </dd>
                                                    <dt>{{ __('catalogue.emissionsStickerLabel') }}</dt>
                                                    <dd>
                                                        {{ __($vehicle->emissionsSticker->nameTranslate) }}
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- EQUIPMENT -->
                        <div class=" text-left">
                            <div class="">
                                <div class="col-12">
                                    <p>
                                        <a class="btn btn-block btn-primary" data-toggle="collapse" href="#vehicleEquipment" role="button" aria-expanded="false" aria-controls="vehicleEquipment">
                                            {{ __('catalogue.equipmentLabel') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="collapse show" id="vehicleEquipment">
                                <div class="card pt-5 pb-5 pr-md-5 pl-md-5">
                                    <div class="row">
                                        <div class="col-12">

                                            @if ( $vehicle->equipment->isNotEmpty() )

                                            <ul>
                                                @foreach ($vehicle->equipment as $equipment)

                                                <li>
                                                    {{ __($equipment->nameTranslate) }}
                                                    @if ($equipment->id == 15)
                                                    ({{ $vehicle->alloyWheelSize }} {{ __('catalogue.inchesLabel') }})
                                                    @endif
                                                </li>

                                                @endforeach
                                            </ul>

                                            @else
                                            <h4>{{ __('catalogue.noEquipmentLabel') }}</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='card-footer'>
                    <h3 class="text-center"><span>{{ __('catalogue.priceLabel') }}: {{ number_format( $vehicle->price, 0, ',', '.') }}</span> €</h3>
                    @if ( $vehicle->sold )
                    <h3 class="text-center text-danger">{{ __('catalogue.soldLabel') }}</h3>
                    @else
                    <form class="rd-mailform text-left offset-top-50" data-form-output="form-output-global" data-form-type="order" method="post" action="{{ $rootURL }}/send-mail">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label-outside" for="contact-us-name">{{ __('translate.formNameLabel') }}</label>
                                    <input class="form-control" id="contact-us-name" type="text" name="name" data-constraints="@Required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group offset-top-20 offset-md-top-0">
                                    <label class="form-label-outside" for="contact-us-email">{{ __('translate.formEmailLabel') }}</label>
                                    <input class="form-control" id="contact-us-email" type="email" name="email" data-constraints="@Required @Email">
                                </div>
                            </div>
                            <div class="col-lg-12 offset-top-20">
                                <div class="form-group">
                                    <label class="form-label-outside" for="contact-us-message">{{ __('translate.formMsgLabel') }}</label>
                                    <textarea style="height:auto" rows="6" class="form-control" id="contact-us-message" name="message" data-constraints="@Required">{{ __('catalogue.orderMessageText', [ "maker" =>$vehicle->maker->name , "model" => $vehicle->model->name , "version" => $vehicle->modelVersion , "color" => __($vehicle->bodyColor->nameTranslate), "ref" => $vehicle->crossReference ]) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="group-sm text-center offset-top-20">
                            @csrf
                            <button class="btn btn-primary text-uppercase" type="submit">{{ __('catalogue.orderMessageButton') }}</button>
                            <input type="hidden" name="vehicleId" value="{{ $vehicle->crossReference }}">
                        </div>
                    </form>
                    @endif
                </div>
            </div>
            <!-- CARD END -->
        </div>
    </div>
    <div class="row justify-content-center">
        <p><a href='javascript:history.back()' class='btn btn-primary'>{{ __('translate.goBackButton') }}</a></p>
    </div>
</section>
@endsection