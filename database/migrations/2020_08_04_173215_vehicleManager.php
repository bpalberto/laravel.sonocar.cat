<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class vehicleManager extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efficiency_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        Schema::create('availability_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('body_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('fuel_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('fuel_categories', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('name');
        });

        Schema::create('emissions_stickers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('pollution_class', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('interior_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('makes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('vehicle_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        Schema::create('vehicle_offer_types', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('name');
        });
        
        Schema::create('upholsteries', function (Blueprint $table) {
            $table->char('id', 2)->primary();
            $table->string('name');
        });
        
        Schema::create('transmissions', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('name');
        });
        
        Schema::create('drive_types', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('name');
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('fileName');
        });

        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('make_id');
            $table->foreign('make_id')->references('id')->on('makes');
            $table->string('name');
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->boolean('accident');
            $table->unsignedTinyInteger('alloyWheelSize')->nullable();
            $table->unsignedBigInteger('availability_type_id');
            $table->date('deliveryDate')->nullable();
            $table->unsignedSmallInteger('deliveryDays')->nullable();
            $table->unsignedBigInteger('body_color_id');
            $table->boolean('cabOrRental');
            $table->string('countryVersion')->default('ES');
            $table->unsignedMediumInteger('cylinderCapacity')->nullable();
            $table->unsignedTinyInteger('cylinders')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('doors');
            $table->char('drive_type_id', 1);
            $table->float('co2', 3, 1);
            $table->unsignedBigInteger('efficiencyClass')->default(1);
            $table->unsignedBigInteger('emission_sticker_id');
            $table->boolean('particleFilter');
            $table->unsignedBigInteger('pollution_class_id')->nullable();
            $table->unsignedBigInteger('fuel_type_id')->nullable();
            $table->float('electricConsumptionCombined', 3, 1)->nullable();
            $table->float('fuelConsumptionUrban', 3, 1)->nullable();
            $table->float('fuelConsumptionHighway', 3, 1)->nullable();
            $table->float('fuelConsumptionCombined', 3, 1)->nullable();
            $table->unsignedSmallInteger('autonomy')->nullable();
            $table->unsignedSmallInteger('emptyWeight')->nullable();
            $table->string('firstRegistration');
            $table->char('fuel_category_id', 1);
            $table->tinyInteger('gears');
            $table->char('crossReference', 50)->nullable()->index()->unique();
            $table->char('offerReference', 50)->nullable();
            $table->char('vehicleIdentifier', 36)->nullable();
            $table->unsignedBigInteger('interior_color_id');
            $table->char('licencePlateNumber', 10)->nullable()->index();
            $table->boolean('fullServiceHistory');
            $table->unsignedBigInteger('make_id');
            $table->boolean('metallic')->nullable();
            $table->mediumInteger('mileage');
            $table->unsignedBigInteger('model_id');
            $table->string('modelVersion')->nullable();
            $table->boolean('nonSmoking');
            $table->unsignedSmallInteger('powerKw');
            $table->tinyInteger('previousOwners')->nullable();
            $table->char('currency', 3)->default('EUR');
            $table->char('priceType')->default('Public');
            $table->decimal('price', 8, 2);
            $table->tinyInteger('seats');
            $table->char('transmission_id', 1);
            $table->char('upholstery', 2);
            $table->unsignedBigInteger('vehicle_body_id');
            $table->char('vehicle_offer_type_id', 1);
            $table->char('vehicleType', 1);
            $table->char('vin', 17)->nullable();
            $table->tinyInteger('warrantyMonths');
            $table->string('nextInspection')->nullable();
            $table->string('lastTechnicalService')->nullable();
            $table->string('lastCamBeltService')->nullable();
            $table->boolean('sold');
            $table->boolean('visible');
            $table->timestamps();
            $table->softDeletes();
            
            

            //Foreigns
            
            $table->foreign('availability_type_id')->references('id')->on('availability_types');
            $table->foreign('drive_type_id')->references('id')->on('drive_types');
            $table->foreign('make_id')->references('id')->on('makes');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('body_color_id')->references('id')->on('body_colors');
            $table->foreign('emission_sticker_id')->references('id')->on('emissions_stickers');
            $table->foreign('efficiencyClass')->references('id')->on('efficiency_classes');
            $table->foreign('pollution_class_id')->references('id')->on('pollution_class');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
            $table->foreign('fuel_category_id')->references('id')->on('fuel_categories');
            $table->foreign('interior_color_id')->references('id')->on('interior_colors');
            $table->foreign('transmission_id')->references('id')->on('transmissions');
            $table->foreign('upholstery')->references('id')->on('upholsteries');
            $table->foreign('vehicle_body_id')->references('id')->on('vehicle_bodies');
            $table->foreign('vehicle_offer_type_id')->references('id')->on('vehicle_offer_types');
        });

        Schema::create('equipment_vehicle', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('equipment_id')->references('id')->on('equipment');
        });

        Schema::create('image_vehicle', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('image_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('image_id')->references('id')->on('images');
        });
        
        Schema::create('subscribers', function (Blueprint $table){
            $table->id();
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle');
    }
}
