@extends('layouts.default')

@section('content')
<section class='section-34'>
    <div class='container'>
        <!-- BODY content-->
        <div class="row justify-content-center">
            <div class="col-12 col-xl-11 col-xxl-10">
                @if ($modify)
                <h1>Editar vehículo (id: {{ $vehicle->id }})</h1>
                @else
                <h1>{{ __('catalogue.submitNewTitle') }}</h1>
                @endif
                <hr class="divider bg-red">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-11 col-xxl-10 text-left">
                @if ($modify)
                <form action="/submit-vehicle/{{ $vehicle->id }}" method="post">
                    @else
                    <form action="/submit-vehicle" method="post">
                        @endif
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <p>{{ __('translate.correctErrorsText') }}</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <h4 class="text-center">{{ __('catalogue.mainGroupTitle') }}</h4>
                        <hr class="divider divider-col-6 bg-red">

                        <div class="row">
                            <fieldset class="col-md-6 order-2 order-md-0">
                                <!-- Maker -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('maker') is-invalid @enderror">
                                        <label class="required" for="selectMaker">{{ __('catalogue.makerLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectMaker" name="make_id" value="{{ $vehicle->maker }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick " id="selectMaker" name="make_id" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $vehicleMakers as $maker )
                                            @if ($maker->id == old('maker'))
                                            <option value="{{ $maker->id }}" selected>{{ $maker->name }}</option>
                                            @else
                                            <option value="{{ $maker->id }}">{{ $maker->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('maker')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Model -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('model') is-invalid @enderror">
                                        <label class="required" for="selectModel">{{ __('catalogue.modelLabel') }}</label>
                                        <div id="oldModel" class="invisible" value="{{ old('model') }}"></div>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectModel" name="model_id" value="{{ $vehicle->model }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectModel" name="model_id" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                        </select>
                                        @endif
                                    </div>
                                    @error('model')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Model Version -->
                                <div class="form-group mb-4 text-left">
                                    <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="modelVersion">{{ __('catalogue.modelVersionLabel') }}</label>
                                    <input class="form-control input-sm" type="text" id="modelVersion" name="modelVersion" 
                                           placeholder="{{ __('catalogue.modelVersionPlaceholder') }}" 
                                           value="@if ($vehicle !== null){{ $vehicle->modelVersion }}@else{{ old('modelVersion') }}@endif">
                                </div>

                                <!-- VehicleBody -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('vehicleBody') is-invalid @enderror">
                                        <label class="required" for="selectVehicleBody">{{ __('catalogue.bodyTypeLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectVehicleBody" name="vehicleBody" value="{{ $vehicle->vehicleBody->name }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectVehicleBody" name="vehicleBody" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $vehicleBodies as $vehicleBody )
                                            @if ($vehicleBody->id == old('vehicleBody'))
                                            <option value="{{ $vehicleBody->id }}" selected>{{ $vehicleBody->name }}</option>
                                            @else
                                            <option value="{{ $vehicleBody->id }}">{{ $vehicleBody->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('vehicleBody')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>
                            </fieldset>

                            <!-- SEPARATOR COLUMN -->
                            <div class="col-md-1"></div>

                            <fieldset class="col-md-5 order-0">

                                <!-- VehicleType -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('vehicleType') is-invalid @enderror">
                                        <label class="required" for="selectVehicleType">{{ __('catalogue.typeLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectVehicleType" name="vehicleType" value="{{ $vehicle->type }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectVehicleType" name="vehicleType" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            <option value="C" selected>{{ __('catalogue.carOption') }}</option>
                                            <option value="B">{{ __('catalogue.bikeOption') }}</option>
                                        </select>
                                        @endif
                                    </div>
                                    @error('vehicleType')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- OfferType -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('offerType') is-invalid @enderror">
                                        <label class="required" for="selectOfferType">{{ __('catalogue.offerTypeLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectOfferType" name="offerType" value="{{ $vehicle->vehicleOfferType->name }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectOfferType" name="offerType" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $offerTypes as $offerType )
                                            @if ($offerType->id == old('offerType'))
                                            <option value="{{ $offerType->id }}" selected>{{ $offerType->name }}</option>
                                            @else
                                            <option value="{{ $offerType->id }}">{{ $offerType->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('offerType')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Power -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('powerKw') is-invalid @enderror">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="required" for="powerKw">{{ __('catalogue.powerKwLabel') }}</label>
                                                @if ($vehicle !== null)
                                                <input class="form-control input-sm" type="number" id="powerKw" name="powerKw" 
                                                       value="{{ $vehicle->powerKw }}" min="1" max="10000" step="1" onchange="kwToCv()">
                                                @else
                                                <input type="number" min="1" max="10000" step="1" value="{{ old('powerKw') }}"
                                                       class="form-control input-sm " id="powerKw" name="powerKw" requerido="no" onchange="kwToCv()">
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                <label class="required" for="powerCv">{{ __('catalogue.powerCvLabel') }}</label>
                                                @if ($vehicle !== null)
                                                <input class="form-control input-sm" type="number" id="powerKw" name="powerKw" 
                                                       value="{{ intval($vehicle->powerKw * 1.34102) }}" min="1" max="10000" step="1" onchange="cvToKw()">
                                                @else
                                                <input type="number" min="1" max="10000" step="1" value="{{ old('powerCv') }}" 
                                                       class="form-control input-sm " id="powerCv" name="powerCv" requerido="no" onchange="cvToKw()">
                                                @endIf
                                            </div>
                                        </div>
                                    </div>
                                    @error('powerKw')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>


                        <div class="row">
                            <fieldset class="col-md-6">

                                <!-- FirstRegistration -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('firstRegistration') is-invalid @enderror">
                                        <label class="required" for="textFirstRegistration">{{ __('catalogue.firstRegistrationLabel') }}</label>
                                        <input class="form-control input-sm mb-1 disabled" type="text" id="textFirstRegistrationDisplay" name="firstRegistrationDisplay" 
                                               value="@if ($vehicle !== null){{ $vehicle->firstRegistration }}@else{{ old('firstRegistration') }}@endif" disabled>
                                        <input type="hidden" id="textFirstRegistration" name="firstRegistration" value="@if ($vehicle !== null){{ $vehicle->firstRegistration }}@else{{ old('firstRegistration') }}@endif">
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectMonthRegistration" name="monthRegistration" requerido="no"
                                                        data-style="btn btn-sm btn-outline-light" data-size="5">
                                                    <option value="">{{ __('catalogue.registrationMonthLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    @for ($i = 1; $i < 13; $i++)
                                                    <option value="{{ $i }}">{{ __("translate.monthName.$i") }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectYearRegistration" name="yearRegistration" requerido="no"
                                                        data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                        data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                                    <option value="">{{ __('catalogue.registrationYearLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    <?php $actualYear = date("Y", time()); ?>
                                                    @for ($i = $actualYear; $i > ($actualYear - 30); $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @error('firstRegistration')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                            </fieldset>

                            <!-- SEPARATOR -->
                            <div class="col-md-1"></div>

                            <fieldset class="col-md-5">
                                <!-- Mileage -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('mileage') is-invalid @enderror">
                                        <label class="required" for="mileage">{{ __('catalogue.mileageLabel') }}</label>
                                        <input class="form-control input-sm " id="mileage" name="mileage" requerido="no"
                                               type="number" min="1" max="9999999" step="1" 
                                               value="@if ($vehicle !== null){{ $vehicle->mileage }}@else{{ old('mileage') }}@endif">
                                    </div>
                                    @error('mileage')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>
                            </fieldset>

                        </div>

                        <h4 class="text-center">{{ __('catalogue.environmentGroupTitle') }}</h4>
                        <hr class="divider divider-col-6 bg-red">

                        <div class="row">
                            <fieldset class="col-md-6">

                                <!-- FuelCategory -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('fuelCategory') is-invalid @enderror">
                                        <label class="required" for="selectFuelCategory">{{ __('catalogue.fuelLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectFuelCategory" name="fuelCategory" value="{{ $vehicle->vehicleBody->name }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectFuelCategory" name="fuelCategory" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $fuelCategories as $fuel )
                                            @if ( $fuel->id == old('fuelCategory') )
                                            <option value="{{ $fuel->id }}" selected>{{ $fuel->name }}</option>
                                            @else
                                            <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('fuelCategory')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <div id="divElectricConsumptionGroup" class="collapse {{ old('fuelCategory') === "E" ? "show" : ""}}">
                                    <!-- electric Consumption Combined -->
                                    <div id="divElectricConsumptionCombined" class="form-group mb-4 text-left">
                                        <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="electricConsumptionCombined">{{ __('catalogue.electricConsumptionLabel') }}</label>
                                        <div class="input-group">
                                            <input class="form-control input-sm" type="number" nim="0" max="99.9" step=".1" id="electricConsumptionCombined" name="electricConsumptionCombined" 
                                                   value="@if ($vehicle !== null){{ $vehicle->electricConsumptionCombined }}@else{{ old('electricConsumptionCombined') }}@endif">
                                            <div class="input-group-append">
                                                <div class="input-group-text bg-orange text-darker border-secondary">{{ __('catalogue.electricConsumptionUnities') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="divFuelConsumptionGroup" class="collapse {{ old('fuelCategory') !== null && old('fuelCategory') !== "E" ? "show" : ""}}">
                                    <!-- fuel Consumption Urban -->
                                    <div id="divFuelConsumptionUrban" class="form-group mb-4 text-left">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="fuelConsumptionUrban">{{ __('catalogue.fuelConsumptionUrbanLabel') }}</label>
                                                <div class="input-group">
                                                    <input class="form-control input-sm" type="number" nim="0" max="99.9" step=".1" id="fuelConsumptionUrban" name="fuelConsumptionUrban" 
                                                           value="@if ($vehicle !== null){{ $vehicle->fuelConsumptionUrban }}@else{{ old('fuelConsumptionUrban') }}@endif">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text bg-orange text-darker border-secondary">{{ __('catalogue.fuelConsumptionUnities') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- fuel Consumption Highway -->
                                    <div id="divFuelConsumptionHighway" class="form-group mb-4 text-left">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="fuelConsumptionHighway">{{ __('catalogue.fuelConsumptionHighwayLabel') }}</label>
                                                <div class="input-group">
                                                    <input class="form-control input-sm" type="number" nim="0" max="99.9" step=".1" id="fuelConsumptionHighway" name="fuelConsumptionHighway" 
                                                           value="@if ($vehicle !== null){{ $vehicle->fuelConsumptionHighway }}@else{{ old('fuelConsumptionHighway') }}@endif">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text bg-orange text-darker border-secondary">{{ __('catalogue.fuelConsumptionUnities') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- fuel Consumption Combinated -->
                                    <div id="divFuelConsumptionCombined" class="form-group mb-4 text-left">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="fuelConsumptionCombined">{{ __('catalogue.fuelConsumptionCombinedLabel') }}</label>
                                                <div class="input-group">
                                                    <input class="form-control input-sm" type="number" nim="0" max="99.9" step=".1" id="fuelConsumptionCombined" name="fuelConsumptionCombined" 
                                                           value="@if ($vehicle !== null){{ $vehicle->fuelConsumptionCombined }}@else{{ old('fuelConsumptionCombined') }}@endif">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text bg-orange text-darker border-secondary">{{ __('catalogue.fuelConsumptionUnities') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- SEPARATOR -->
                            <div class="col-md-1"></div>

                            <fieldset class="col-md-5">

                                <!-- Emissions Sticker -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('emissionsSticker') is-invalid @enderror">
                                        <label class="required" for="selectEmissionsSticker">{{ __('catalogue.emissionsStickerLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="emissionsSticker" name="emissionsSticker" value="{{ $vehicle->emissionsSticker->name }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectEmissionsSticker" name="emissionsSticker" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $emissionsStickers as $sticker )
                                            @if ( $sticker->id == old('emissionsSticker') )
                                            <option value="{{ $sticker->id }}" selected>{{ $sticker->name }}</option>
                                            @else
                                            <option value="{{ $sticker->id }}">{{ $sticker->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('emissionsSticker')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Efficiency class -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('efficiencyClass') is-invalid @enderror">
                                        <label class="required" for="selectEfficiencyClass">{{ __('catalogue.efficiencyClassLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectEfficiencyClass" name="efficiencyClass" value="{{ $vehicle->efficiencyClass->name }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectEfficiencyClass" name="efficiencyClass" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $efficiencyClasses as $efficiencyClass )
                                            @if ( $efficiencyClass->id == old('efficiencyClass') )
                                            <option value="{{ $efficiencyClass->id }}" selected="">{{ $efficiencyClass->name }}</option>
                                            @else
                                            <option value="{{ $efficiencyClass->id }}">{{ $efficiencyClass->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('efficiencyClass')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- CO2 -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('co2') is-invalid @enderror">
                                        <label class="required" for="co2">{{ __('catalogue.emissionsLabel') }}</label>
                                        <div class="input-group">
                                            <input class="form-control input-sm" type="number" nim="0" max="9999" step="1" id="co2" name="co2" 
                                                   value="@if ($vehicle !== null){{ $vehicle->co2 }}@else{{ old('co2') }}@endif">
                                            <div class="input-group-append">
                                                <div class="input-group-text bg-orange text-darker border-secondary">{{ __('catalogue.emissionsUnities') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('co2')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                            </fieldset>
                        </div>

                        <h4 class="text-center">{{ __('catalogue.motorGroupTitle') }}</h4>
                        <hr class="divider divider-col-6 bg-red">

                        <div class="row">
                            <fieldset class="col-md-6">

                                <!-- Drive Type (Traction) -->
                                <div class=" mb-4 text-left">
                                    <div class="form-group @error('driveType') is-invalid @enderror">
                                        <label class="required" for="selectDriveType">{{ __('catalogue.driveTypeLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectDriveType" name="driveType" 
                                               value="{{ $vehicle->efficiencyClass->name }}" requerido="no" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectDriveType" name="driveType" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $driveTypes as $driveType )
                                            @if ( $driveType->id == old('driveType') )
                                            <option value="{{ $driveType->id }}" selected="">{{ $driveType->name }}</option>
                                            @else
                                            <option value="{{ $driveType->id }}">{{ $driveType->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('driveType')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Transmission -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('transmission') is-invalid @enderror">
                                        <label class="required" for="selectTransmission">{{ __('catalogue.transmissionLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectTransmission" name="transmission" requerido="no"
                                               value="{{ $vehicle->efficiencyClass->name }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectTransmission" name="transmission" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $transmissions as $transmission )
                                            @if ( $transmission->id == old('transmission') )
                                            <option value="{{ $transmission->id }}" selected="">{{ $transmission->name }}</option>
                                            @else
                                            <option value="{{ $transmission->id }}">{{ $transmission->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    @error('transmission')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gears -->
                                <div class=" mb-4 text-left">
                                    <div class="form-group @error('gears') is-invalid @enderror">
                                        <label class="required" for="gears">{{ __('catalogue.gearsLabel') }}</label>
                                        <input class="form-control input-sm" type="number" nim="0" max="99" step="1" id="gears" name="gears" requerido="no"
                                               value="@if ($vehicle !== null){{ $vehicle->gears }}@else{{ old('gears') }}@endif">
                                    </div>
                                    @error('gears')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                            </fieldset>

                            <!-- SEPARATOR -->
                            <div class="col-md-1"></div>

                            <fieldset class="col-md-5">

                                <div id="cylinders" class="collapse {{ old('fuelCategory') !== null && old('fuelCategory') !== "E" ? "show" : ""}}">
                                    <!-- cylinders -->
                                    <div class="form-group mb-4 text-left">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="cylinders">{{ __('catalogue.cylindersLabel') }}</label>
                                                <input class="form-control input-sm" type="number" nim="0" max="99" step="1" id="cylinders" name="cylinders" 
                                                       value="@if ($vehicle !== null){{ $vehicle->cylinders }}@else{{ old('cylinders') }}@endif">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- cylinderCapacity -->
                                    <div class="form-group mb-4 text-left">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="cylinderCapacity">{{ __('catalogue.cylinderCapacityLabel') }}</label>
                                                <div class="input-group">
                                                    <input class="form-control input-sm" type="number" nim="0" max="9999" step="1" id="cylinderCapacity" name="cylinderCapacity" 
                                                           value="@if ($vehicle !== null){{ $vehicle->cylinderCapacity }}@else{{ old('cylinderCapacity') }}@endif">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text bg-orange text-darker border-secondary">{{ __('catalogue.cylinderCapacityUnitsLabel') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- emptyWeight -->
                                <div class="form-group mb-4 text-left">
                                    <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="emptyWeight">{{ __('catalogue.emptyWeightLabel') }}</label>
                                    <div class="input-group">
                                        <input class="form-control input-sm" type="number" nim="0" max="9999" step="1" id="emptyWeight" name="emptyWeight" 
                                               value="@if ($vehicle !== null){{ $vehicle->emptyWeight }}@else{{ old('emptyWeight') }}@endif">
                                        <div class="input-group-append">
                                            <div class="input-group-text bg-orange text-darker border-secondary">{{ __('catalogue.emptyWeightUnitsLabel') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <h4 class="text-center">{{ __('catalogue.otherGroupTitle') }}</h4>
                        <hr class="divider divider-col-6 bg-red">

                        <div class="row">
                            <fieldset class="col-md-6">

                                <!-- VIN NUMBER -->
                                <div class="form-group mb-4 text-left">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="vinNumber">{{ __('catalogue.vinNumberLabel') }}</label>
                                            <input class="form-control input-sm" type="text" id="vinNumber" name="vinNumber" maxlength="17"
                                                   onchange="this.value = this.value.toUpperCase()"
                                                   value="@if ($vehicle !== null){{ $vehicle->vin }}@else{{ old('vinNumber') }}@endif">
                                        </div>
                                    </div>
                                </div>

                                <!-- License Plate number -->
                                <div class="form-group mb-4 text-left">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="licensePlate">{{ __('catalogue.licensePlateLabel') }}</label>
                                            <input class="form-control input-sm" type="text" id="licensePlate" name="licensePlate" maxlength="17"
                                                   onchange="formatLicensePlate()"
                                                   value="@if ($vehicle !== null){{ $vehicle->licencePlateNumber }}@else{{ old('licensePlate') }}@endif">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- SEPARATOR -->
                            <div class="col-md-1"></div>

                            <fieldset class="col-md-5">

                                <!-- Doors -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('doors') is-invalid @enderror">
                                        <label class="required" for="doors">{{ __('catalogue.doorsLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="doors" name="doors" requerido="no"
                                               value="{{ $vehicle->doors }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="doors" name="doors" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="6">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @for ($i = 1; $i < 8; $i++)
                                            @if ( $i == old('doors') )
                                            <option value="{{ $i }}" selected="">{{ $i }}</option>
                                            @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                            @endfor
                                        </select>
                                        @endif
                                    </div>
                                    @error('doors')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Seats -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('seats') is-invalid @enderror">
                                        <label class="required" for="seats">{{ __('catalogue.seatsLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="seats" name="seats" requerido="no"
                                               value="{{ $vehicle->seats }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="seats" name="seats" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="10" >
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @for ($i = 1; $i < 11; $i++)
                                            @if ( $i == old('seats') )
                                            <option value="{{ $i }}" selected="">{{ $i }}</option>
                                            @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                            @endfor
                                        </select>
                                        @endif
                                    </div>
                                    @error('seats')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                            </fieldset>
                        </div>

                        <h4 class="text-center">{{ __('catalogue.colorGroupTitle') }}</h4>
                        <hr class="divider divider-col-6 bg-red">

                        <div class="row">
                            <fieldset class="col-md-6">

                                <div class="row">

                                    <!-- Upholstery (Interior)-->
                                    <div class="col-6 mb-4 text-left">
                                        <div class="form-group @error('upholstery') is-invalid @enderror">
                                            <label class="required" for="selectUpholstery">{{ __('catalogue.upholsteryLabel') }}</label>
                                            @if ($vehicle !== null)
                                            <input class="form-control disabled" type="text" id="selectUpholstery" name="upholstery" requerido="no"
                                                   value="{{ $vehicle->upholstery->name }}" disabled>
                                            @else
                                            <select class="form-control selectpicker show-tick" id="selectUpholstery" name="upholstery" requerido="no"
                                                    data-style="btn btn-sm btn-outline-light" data-size="6">
                                                <option value="">{{ __('catalogue.selectOption') }}</option>
                                                <option data-divider="true"></option>
                                                @foreach ( $upholsteries as $upholstery )
                                                @if ($upholstery->id == 'OT')
                                                <?php $other = $upholstery; ?>
                                                @else
                                                @if ( $upholstery->id == old('upholstery') )
                                                <option value="{{ $upholstery->id }}" selected="">{{ $upholstery->name }}</option>
                                                @else
                                                <option value="{{ $upholstery->id }}">{{ $upholstery->name }}</option>
                                                @endif
                                                @endif
                                                @endforeach
                                                <option data-divider="true"></option>
                                                @if ($other !== null)
                                                <option value="{{ $other->id }}">{{ $other->name }}</option>
                                                @endif
                                            </select>
                                            @endif
                                        </div>
                                        @error('upholstery')
                                        <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Interior Color -->
                                    <div class="col-6 mb-4 text-left">
                                        <div class="form-group @error('interiorColor') is-invalid @enderror">
                                            <label class="required" for="selectInteriorColor">{{ __('catalogue.interiorColorLabel') }}</label>
                                            @if ($vehicle !== null)
                                            <input class="form-control disabled" type="text" id="selectInteriorColor" name="interiorColor" requerido="no"
                                                   value="{{ $vehicle->interiorColor->name }}" disabled>
                                            @else
                                            <select class="form-control selectpicker show-tick" id="selectInteriorColor" name="interiorColor" requerido="no"
                                                    data-style="btn btn-sm btn-outline-light" data-size="6">
                                                <option value="">{{ __('catalogue.selectOption') }}</option>
                                                <option data-divider="true"></option>
                                                @foreach ( $interiorColors as $color )
                                                @if ($color->id == 5)
                                                <?php $other = $color; ?>
                                                @else
                                                @if ( $color->id == old('interiorColor') )
                                                <option value="{{ $color->id }}" selected="">{{ $color->name }}</option>
                                                @else
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                @endif
                                                @endif
                                                @endforeach

                                                <option data-divider="true"></option>
                                                @if ($other !== null)
                                                <option value="{{ $other->id }}">{{ $other->name }}</option>
                                                @endif
                                            </select>
                                            @endif
                                        </div>
                                        @error('interiorColor')
                                        <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <!-- SEPARATOR -->
                            <div class="col-md-1"></div>

                            <fieldset class="col-md-5">

                                <!-- Exterior Color -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('bodyColor') is-invalid @enderror">
                                        <label class="required" for="selectBodyColor">{{ __('catalogue.bodyColorLabel') }}</label>
                                        @if ($vehicle !== null)
                                        <input class="form-control disabled" type="text" id="selectBodyColor" name="bodyColor" requerido="no"
                                               value="{{ $vehicle->type }}" disabled>
                                        @else
                                        <select class="form-control selectpicker show-tick" id="selectBodyColor" name="bodyColor" requerido="no"
                                                data-style="btn btn-sm btn-outline-light" data-size="6">
                                            <option value="">{{ __('catalogue.selectOption') }}</option>
                                            <option data-divider="true"></option>
                                            @foreach ( $bodyColors as $color )
                                            @if ( $color->id == old('bodyColor') )
                                            <option value="{{ $color->id }}" selected="">{{ $color->name }}</option>
                                            @else
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>
                                    <!-- isMetallic -->
                                    <div class="form-group">
                                        <label class="toggle mb-3" for="isMetallic">
                                            <div class="row">
                                                <div class="col-10">
                                                    <span>{{ __('catalogue.metallicColorLabel') }}</span>
                                                </div>
                                                <div class="col-1">
                                                    <div class="switch">
                                                        <input type="checkbox" id="isMetallic" name="metallic" checked=""
                                                               onchange="toggles(this)" value="{{ old('isMetallic') ?? $vehicle->isMetallic ?? ('0') }}"> 
                                                        <span class="slider round"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    @error('interiorColor')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                            </fieldset>
                        </div>

                        <h4 class="text-center">{{ __('catalogue.maintenanceGroupTitle') }}</h4>
                        <hr class="divider divider-col-6 bg-red">

                        <div class="row">
                            <fieldset class="col-md-6">

                                <!-- next Inspection ITV -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('nextInspection') is-invalid @enderror">
                                        <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="textNextInspection">{{ __('catalogue.nextInspectionLabel') }}</label>
                                        <input class="form-control input-sm mb-1 disabled" type="text" id="textNextInspectionDisplay" name="nextInspectionDisplay" 
                                               value="@if ($vehicle !== null){{ $vehicle->nextInspection }}@else{{ old('nextInspection') }}@endif" disabled>
                                        <input type="hidden" id="textNextInspection" name="nextInspection" value="@if ($vehicle !== null){{ $vehicle->nextInspection }}@else{{ old('nextInspection') }}@endif">
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectMonthNextInspection" name="monthNextInspection"
                                                        data-style="btn btn-sm btn-outline-light" data-size="5">
                                                    <option value="">{{ __('catalogue.registrationMonthLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    @for ($i = 1; $i < 13; $i++)
                                                    <option value="{{ $i }}">{{ __("translate.monthName.$i") }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectYearNextInspection" name="yearNextInspection"
                                                        data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                        data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                                    <option value="">{{ __('catalogue.registrationYearLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    <?php $actualYear = date("Y", time()); ?>
                                                    @for ($i = ($actualYear + 5 ); $i > ($actualYear - 6); $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @error('nextInspection')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- last Technical Service -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('lastTechnicalService') is-invalid @enderror">
                                        <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="lastTechnicalService">{{ __('catalogue.lastTechnicalLabel') }}</label>
                                        <input class="form-control input-sm mb-1 disabled" type="text" id="textLastTechnicalServiceDisplay" name="lastTechnicalServiceDisplay" 
                                               value="@if ($vehicle !== null){{ $vehicle->lastTechnicalService }}@else{{ old('lastTechnicalService') }}@endif" disabled>
                                        <input type="hidden" id="textLastTechnicalService" name="lastTechnicalService" value="@if ($vehicle !== null){{ $vehicle->lastTechnicalService }}@else{{ old('lastTechnicalService') }}@endif">
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectMonthLastTechnicalService" name="monthLastTechnicalService"
                                                        data-style="btn btn-sm btn-outline-light" data-size="5">
                                                    <option value="">{{ __('catalogue.registrationMonthLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    @for ($i = 1; $i < 13; $i++)
                                                    <option value="{{ $i }}">{{ __("translate.monthName.$i") }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectYearLastTechnicalService" name="yearLastTechnicalService" 
                                                        data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                        data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                                    <option value="">{{ __('catalogue.registrationYearLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    <?php $actualYear = date("Y", time()); ?>
                                                    @for ($i = $actualYear; $i > ($actualYear - 6); $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @error('nextInspection')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- last Cam Belt Service Change -->
                                <div class="mb-4 text-left">
                                    <div class="form-group @error('lastCamBeltService') is-invalid @enderror">
                                        <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="lastCamBeltService">{{ __('catalogue.lastCamBeltServiceLabel') }}</label>
                                        <input class="form-control input-sm mb-1 disabled" type="text" id="textLastCamBeltServiceDisplay" name="lastCamBeltServiceDisplay" 
                                               value="@if ($vehicle !== null){{ $vehicle->lastCamBeltService }}@else{{ old('lastCamBeltService') }}@endif" disabled>
                                        <input type="hidden" id="textLastCamBeltService" name="lastCamBeltService" value="@if ($vehicle !== null){{ $vehicle->lastCamBeltService }}@else{{ old('lastCamBeltService') }}@endif">
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectMonthLastCamBeltService" name="monthLastCamBeltService" 
                                                        data-style="btn btn-sm btn-outline-light" data-size="5">
                                                    <option value="">{{ __('catalogue.registrationMonthLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    @for ($i = 1; $i < 13; $i++)
                                                    <option value="{{ $i }}">{{ __("translate.monthName.$i") }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-control selectpicker show-tick" id="selectYearLastCamBeltService" name="yearLastCamBeltService" 
                                                        data-style="btn btn-sm btn-outline-light" data-size="5" 
                                                        data-live-search="true" data-live-Search-Placeholder="{{ __('catalogue.searchPlaceholder') }}">
                                                    <option value="">{{ __('catalogue.registrationYearLabel') }}</option>
                                                    <option data-divider="true"></option>
                                                    <?php $actualYear = date("Y", time()); ?>
                                                    @for ($i = $actualYear; $i > ($actualYear - 6); $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @error('lastCamBeltService')
                                    <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                    @enderror
                                </div>

                            </fieldset>

                            <!-- SEPARATOR -->
                            <div class="col-md-1"></div>

                            <fieldset class="col-md-5">

                                <div class="form-group mb-5">
                                    <!-- fullServiceHistory -->
                                    <label class="toggle mb-3" for="fullServiceHistory">
                                        <div class="row">
                                            <div class="col-10">
                                                <span>{{ __('catalogue.serviceHistoryLabel') }}</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="switch">
                                                    <input type="checkbox" id="fullServiceHistory" name="fullServiceHistory" checked=""
                                                           onchange="toggles(this)" value="{{ old('fullServiceHistory') ?? $vehicle->fullServiceHistory ?? ('0') }}"> 
                                                    <span class="slider round"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- nonSmoking -->
                                    <label class="toggle mb-3" for="nonSmoking">
                                        <div class="row">
                                            <div class="col-10">
                                                <span>{{ __('catalogue.nonSmokingLabel') }}</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="switch">
                                                    <input type="checkbox" id="nonSmoking" name="nonSmoking" checked=""
                                                           onchange="toggles(this)" value="{{ old('nonSmoking') ?? $vehicle->nonSmoking ?? ('0') }}"> 
                                                    <span class="slider round"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- accident -->
                                    <label class="toggle mb-3" for="accident">
                                        <div class="row">
                                            <div class="col-10">
                                                <span>{{ __('catalogue.accidentLabel') }}</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="switch">
                                                    <input type="checkbox" id="accident" name="accident" checked=""
                                                           onchange="toggles(this)" value="{{ old('accident') ?? $vehicle->accident ?? ('0') }}"> 
                                                    <span class="slider round"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- cabOrRental -->
                                    <label class="toggle mb-3" for="cabOrRental">
                                        <div class="row">
                                            <div class="col-10">
                                                <span>{{ __('catalogue.cabOrRentalLabel') }}</span>
                                            </div>
                                            <div class="col-2">
                                                <div class="switch">
                                                    <input type="checkbox" id="cabOrRental" name="cabOrRental" checked=""
                                                           onchange="toggles(this)" value="{{ old('cabOrRental') ?? $vehicle->cabOrRental ?? ('0') }}">
                                                    <span class="slider round"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <!-- previous Owners -->
                                <div class="form-group">
                                    <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="selectPreviousOwners">{{ __('catalogue.previousOwnersLabel') }}</label>
                                    @if ($vehicle !== null)
                                    <input class="form-control disabled" type="text" id="selectPreviousOwners" name="previousOwners" value="{{ $vehicle->previousOwners }}" disabled>
                                    @else
                                    <select class="form-control selectpicker show-tick" id="selectPreviousOwners" name="previousOwners" 
                                            data-style="btn btn-sm btn-outline-light" data-size="6">
                                        <option value="">{{ __('catalogue.selectOption') }}</option>
                                        <option data-divider="true"></option>
                                        @for ($i = 1; $i < 11; $i++)
                                        @if ( $i == old('previousOwners') )
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                        @endfor
                                    </select>
                                    @endif
                                </div>

                            </fieldset>
                        </div>

                        <h4 class="text-center">{{ __('catalogue.comercialGroupTitle') }}</h4>
                        <hr class="divider divider-col-6 bg-red">

                        <fieldset class="row my-5">
                            <!-- Description -->
                            <div class="form-group col-12 text-left">
                                <label class="nullable" data-nullable-msg="{{ __('validation.nullable') }}" for="description">{{ __('catalogue.descriptionLabel') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" 
                                          name="description">@if ($vehicle !== null){{ $vehicle->description }}@else{{ old('description') }}@endif</textarea>
                            </div>
                        </fieldset>


                        <fieldset class="row my-5">
                            <!-- Price -->
                            <div class="form-group col-md-6 col-lg-4 mb-4 text-left">
                                <div class="form-group @error('price') is-invalid @enderror">
                                    <label class="required" for="price">{{ __('catalogue.priceLabel') }}</label>
                                    <div class="input-group">
                                        <input class="form-control input-sm" id="price" name="price" requerido="no"
                                               type="number" min="0" max="9999999.99" step=".01"
                                               value="@if ($vehicle !== null){{ $vehicle->price }}@else{{ old('price') }}@endif">
                                        <div class="input-group-append">
                                            <div class="input-group-text bg-orange text-darker border-secondary">€</div>
                                        </div>
                                    </div>
                                </div>
                                @error('price')
                                <div class="invalid-feedback p-2 rounded alert-danger"># {{ $message }}</div>
                                @enderror
                            </div>

                            <!-- SEPARATOR -->
                            <div class="col-md-6 col-lg-2"></div>
                            
                            <!-- isSold Toggle -->
                            <div class="form-group col-lg-3 text-left text-md-right">
                                <label class="toggle mb-3" for="isSold">
                                    <div class="row">
                                        <div class="col-10">
                                            <span>{{ __('catalogue.soldLabel') }}</span>
                                        </div>
                                        <div class="col-2">
                                            <div class="switch">
                                                <input type="checkbox" id="isSold" name="isSold" checked=""
                                                       onchange="toggles(this)" value="{{ old('isSold') ?? $vehicle->isSold ?? ('0') }}">
                                                <span class="slider round"></span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- isVisible Toggle -->
                            <div class="form-group col-lg-3 text-left text-md-right">
                                <label class="toggle mb-3" for="isVisible">
                                    <div class="row">
                                        <div class="col-10">
                                            <span>{{ __('catalogue.visibleLabel') }}</span>
                                        </div>
                                        <div class="col-2">
                                            <div class="switch">
                                                <input type="checkbox" id="isVisible" name="isVisible" checked=""
                                                       onchange="toggles(this)" value="{{ old('isVisible') ?? $vehicle->isVisible ?? ('1') }}">
                                                <span class="slider round"></span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>

                        </fieldset>

                        <!-- EQUIPMENT -->
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center">
                                    <a class="btn btn-block btn-primary" href="#vehicleEquipment" role="button" 
                                       data-toggle="collapse" aria-expanded="false" aria-controls="vehicleEquipment">
                                        {{ __('catalogue.equipmentLabel') }}
                                    </a>
                                </h4>
                                <hr class="divider divider-col-6 bg-red">
                                <div class="collapse" id="vehicleEquipment">
                                    <div class="form-group row text-left">
                                        @foreach ($equipment as $item)
                                        <div class="col-1"></div>
                                        <div class="col-10 col-lg-4">
                                            <label class="toggle thin" for="equipment{{ $item->id }}">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <span>{{ $item->name }}</span>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="switch">
                                                            <input type="checkbox" id="equipment{{ $item->id }}" name="equipment[]" value="{{ $item->id }}"> 
                                                            <span class="slider round"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-1"></div>
                                        @endforeach
                                    </div>
                                    <p>
                                        <a class="btn btn-block btn-primary" href="#vehicleEquipment" role="button" 
                                           data-toggle="collapse" aria-expanded="false" aria-controls="vehicleEquipment">
                                            {{ __('catalogue.equipmentLabel') }}
                                        </a>
                                    </p>
                                </div>

                            </div>
                        </div>

                        @if ($vehicle !== null)
                        <!-- IMAGES -->
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center">
                                    <a class="btn btn-block btn-primary disabled" href="#vehicleImages" role="button" 
                                       data-toggle="collapse" aria-expanded="false" aria-controls="vehicleEquipment">
                                        {{ __('catalogue.sectionImagesLabel') }}
                                    </a>
                                </h4>
                                <hr class="divider divider-col-6 bg-red">
                                <div class="collapse" id="vehicleImages">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-center">Sección de subida de imágenes</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- FORM GROUP BUTTONS -->
                        <fieldset class="row justify-content-center offset-top-124">
                            <div class="col-12 col-md-3 col-lg-2 my-2 text-center text-md-right order-md-4">
                                <button type="submit" class="btn btn-success">{{ __('translate.formBtnSend') }}</button>
                            </div>
                            <div class="col-12 col-md-3 col-lg-2 my-2 text-center text-md-right order-md-3">
                                @if (!$modify)
                                <button type="reset" class="btn btn-danger">{{ __('translate.formBtnReset') }}</button>
                                @endif
                            </div>

                            <div class="col-12 col-md-3 col-lg-5 text-center order-md-2"></div>

                            <div class="col-12 col-md-3 my-2 text-center text-md-left order-md-1">
                                <a href='/catalogue' class='btn btn-primary'>{{ __('translate.goBackButton') }}</a>
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>

    @if (isset($result))
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary invisible" id="modalTrigger" data-toggle="modal" data-target="#modalResult">Launch modal</button>

    @if ($result)
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
                    <h3>{{ __('catalogue.savedSuccessText') }}</h3>
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
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">{{ __('catalogue.errorTitle') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('catalogue.errorText') }}
                </div>
                <div class="modal-footer">
                    <a href="{{ $catalogueURL }}" class="btn btn-success">{{ __('translate.goBackButton') }}</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @endif


</section>
@endsection

@section('scripts')

@if (isset($result))
<script type="text/javascript">
    window.onload = document.getElementById('modalTrigger').click();</script>
@endif

<script type="text/javascript">

    var modelsList = [];
            @foreach ($vehicleModels as $model)
    var model = new Object();
    model.id = '{{ $model -> id }}';
    model.name = '{{ $model -> name }}';
    model.makeId = '{{ $model -> make_id }}';
    modelsList.push(model);
    @endforeach

</script>
<script src="{{ $jsURL }}/submit-vehicle.js"></script>
@endsection
