@extends('layouts.default')

@section('content')
<?php
$atributo = "Atributo";
$valor = "Valor";
?>
<section class="section-34">
    <div class="container">
        <h1>{{ __('catalogue.title') }} {{ env('APP_NAME', "") }}</h1>
        <hr class="divider bg-red" />

        <!-- Search Bar -->
        <div class="row offset-top-20">
            <nav id="search" class='col-12 justify-content-end navbar navbar-expand-lg navbar-light bg-light d-flex align-items-end'>
                <form class="form-inline my-2 my-lg-0 d-flex align-items-end" method="get" action="/catalogue/filterby">
                    @auth
                    <!-- Admin Options -->
                    <div class="form-group-multiple mr-2 mr-2">
                        <label for="hidden">{{ __('catalogue.viewHiddenLabel') }}</label>
                        <select class="selectpicker form-control" name="hidden" data-style="btn-warning" id="hidden">
                            <option value="0">{{ __('catalogue.noOption') }}</option>
                            <option value="1">{{ __('catalogue.yesOption') }}</option>
                        </select>
                    </div>
                    <?php echo $menuSeparator; ?>
                    @endauth

                    <div class="form-group-multiple mr-2 mr-2">
                        <label for="selectMaker">{{ __('catalogue.makerLabel') }}</label>
                        <select class="selectpicker show-tick" name="maker" data-style="btn-primary" data-live-search="true" id="selectMaker" required>
                            <option class="" value="all">{{ __('catalogue.allOption') }}</option>
                            @if ($makers !== null)
                            @foreach ($makers as $maker)
                            <option value="{{ $maker->id }}">{{ $maker->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <button class="btn btn-success mr-2">{{ __('catalogue.searchButton') }}</button>
                </form>
                <?php echo $menuSeparator; ?>
                <a href="{{ $baseURL }}/catalogue/all" class="btn btn-primary mr-2">{{ __('catalogue.viewAllButton') }}</a>
            </nav>
        </div>
        <div class="row justify-content-end offset-top-30">
            <!-- Pagination Links -->
            {{ $vehicles->withQueryString()->links() }}
        </div>
        <div class="row justify-content-center offset-top-20">
            <!-- CATALOG LIST -->
            @if (count($vehicles) == 0)
            <h3 class="text-danger">No hay resultados</h3>
            @else
            @foreach ($vehicles as $vehicle)
                <div class='card my-5' style='width: 22rem;'>
                    @if ( $vehicle->images->isNotEmpty() )
                    <div id="carouselVehicle{{ $vehicle->id }}Images" class="carousel slide bg-dark" data-ride="carousel">
                        <div class="carousel-inner">
                            <a href="{{ $vehicleURL }}/sku/{{ $vehicle->crossReference }}">
                            @foreach ($vehicle->images as $key => $picture)
                            @if ($key == 0)
                            <div class="catalogue carousel-item active" style="background-image: url('{{ $picture->fileName }}');"></div>
                            @else
                            <div class="catalogue carousel-item" style="background-image: url('{{ $picture->fileName }}');"></div>
                            @endif
                            @endforeach
                            </a>
                        </div>
                        <a class="carousel-control-prev" href="#carouselVehicle{{ $vehicle->id }}Images" role="button" data-slide="prev">
                            <span class="btn btn-xs mdi mdi-24px mdi-chevron-left bg-orange"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselVehicle{{ $vehicle->id }}Images" role="button" data-slide="next">
                            <span class="btn btn-xs mdi mdi-24px mdi-chevron-right bg-orange"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <ol class="carousel-indicators">
                            @foreach ($vehicle->images as $key => $picture)
                            @if ($key == 0)
                            <li data-target="#carouselVehicle{{ $vehicle->id }}Images" data-slide-to="{{ $key }}" class="active"></li>
                            @else
                            <li data-target="#carouselVehicle{{ $vehicle->id }}Images" data-slide-to="{{ $key }}"></li>
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
                    <div class='mt-5'>
                        <h4 class='card-title mt-0'>{{ $vehicle->maker->name }} {{ $vehicle->model->name }}</h4>
                        <h6 class='card-subtitle mt-0'>{{ $vehicle->modelVersion }}</h6>

                        <table class='table text-extra-small'>
                            <tbody>
                                <tr>
                                    <th class='text-right' scope='row'>{{ __('catalogue.fuelLabel') }}</th>
                                    <td class='text-left'>{{ __($vehicle->fuelCategory->nameTranslate) }}</td>
                                    <th class='text-right' scope='row'>{{ __('catalogue.bodyColorLabel') }}</th>
                                    <td class='text-left'>{{ __($vehicle->bodyColor->nameTranslate) }}</td>
                                </tr>
                                <tr>
                                    @if ($vehicle->electricConsumptionCombined !== null)
                                    <th class='text-right' scope='row'>{{ __('catalogue.electricConsumptionLabel') }}</th>
                                    <td class='text-left'>{{ $vehicle->electricConsumptionCombined }} kW/100Km</td>
                                    @else
                                    <th class='text-right' scope='row'>{{ __('catalogue.fuelConsumptionUrbanLabel') }}</th>
                                    <td class='text-left'>{{ $vehicle->fuelConsumptionUrban }} L/100Km</td>
                                    @endif
                                    <th class='text-right' scope='row'>{{ __('catalogue.firstRegistrationLabel') }}</th>
                                    <td class='text-left'>{{ $vehicle->firstRegistration }}</td>
                                </tr>
                                <tr>
                                    @if ($vehicle->electricConsumptionCombined !== null)
                                    <th class='text-right' scope='row'> </th>
                                    <td class='text-left'> </td>
                                    @else
                                    <th class='text-right' scope='row'>{{ __('catalogue.fuelConsumptionCombinedLabel') }}</th>
                                    <td class='text-left'>{{ $vehicle->fuelConsumptionCombined }} L/100Km</td>
                                    @endif
                                    <th class='text-right' scope='row'>{{ __('catalogue.mileageLabel') }}</th>
                                    <td class='text-left'>{{ number_format( $vehicle->mileage, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    @if ($vehicle->electricConsumptionCombined !== null)
                                    <th class='text-right' scope='row'> </th>
                                    <td class='text-left'> </td>
                                    @else
                                    <th class='text-right' scope='row'>{{ __('catalogue.fuelConsumptionHighwayLabel') }}</th>
                                    <td class='text-left'>{{ $vehicle->fuelConsumptionHighway }} L/100Km</td>
                                    @endif
                                    <th class='text-right' scope='row'>{{ __('catalogue.serviceHistoryLabel') }}</th>
                                    <td class='text-left'>
                                        @if ($vehicle->fullServiceHistory)
                                        {{ __('catalogue.yesOption') }}
                                        @else
                                        {{ __('catalogue.noOption') }}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>{{ __($vehicle->availability->nameTranslate) }}: {{ $vehicle->deliveryDays }} 
                            
                            @if ($vehicle->deliveryDate !== null)
                            {{ date_format(date_create($vehicle->deliveryDate), 'd/m/Y') }}
                            @endif
                        </p>
                    </div>
                    <div class='mt-5'>
                        @if ( $vehicle->sold )
                        <h6 class="mt-0 text-danger text-uppercase">{{ __('catalogue.soldLabel') }}</h6>
                        @else
                        <h6 class="mt-0"><span>{{ __('catalogue.priceLabel') }}: {{ number_format( $vehicle->price, 0, ',', '.') }}</span> €</h6>
                        @endif
                    </div>
                    <a href="{{ $vehicleURL }}/sku/{{ $vehicle->crossReference }}" class="btn btn-block btn-primary">{{ __('catalogue.moreDetailsButton') }}</a>
                </div>
            @endforeach
            @endif
            <!-- /CATALOG LIST -->
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script>
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    $.fn.selectpicker.Constructor.DEFAULTS.liveSearchPlaceholder = '{{ __('catalogue.searchMakerPlaceholder') }}...';
    $.fn.selectpicker.Constructor.DEFAULTS.liveSearchStyle = 'startsWith';
</script>
@endsection