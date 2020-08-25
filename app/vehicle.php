<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vehicle extends Model {

    use SoftDeletes;

    protected $fillable = [
        "accident",
        "availability_type_id",
        "deliveryDate",
        "deliveryDays",
        "body_color_id",
        "cabOrRental",
        "cylinderCapacity",
        "cylinders",
        "description",
        "doors",
        "drive_type_id",
        "co2",
        "efficiencyClass",
        "emission_sticker_id",
        "particleFilter",
        "pollution_class_id",
        "fuel_type_id",
        "electricConsumptionCombined",
        "fuelConsumptionUrban",
        "fuelConsumptionHighway",
        "fuelConsumptionCombined",
        "autonomy",
        "emptyWeight",
        "firstRegistration",
        "fuel_category_id",
        "gears",
        "crossReference",
        "offerReference",
        "vehicleIdentifier",
        "interior_color_id",
        "licencePlateNumber",
        "fullServiceHistory",
        "make_id",
        "metallic",
        "mileage",
        "model_id",
        "modelVersion",
        "nonSmoking",
        "powerKw",
        "previousOwners",
        "price",
        "seats",
        "transmission_id",
        "upholstery",
        "vehicle_body_id",
        "vehicle_offer_type_id",
        "vehicleType",
        "vin",
        "warrantyMonths",
        "sold",
        "visible",
        "nextInspection",
        "lastTechnicalService",
        "lastCamBeltService",
        
        // Fechas
        'created_at',
        'updated_at',
    ];

    public function maker() {
        return $this->belongsTo('App\make', 'make_id');
    }

    public function model() {
        return $this->belongsTo('App\makeModel', 'model_id');
    }

    public function availability() {
        return $this->belongsTo('App\availabilityType', 'availability_type_id');
    }

    public function bodyColor() {
        return $this->belongsTo('App\bodyColor', 'body_color_id');
    }

    public function emissionsSticker() {
        return $this->belongsTo('App\emissionsSticker', 'emission_sticker_id');
    }

    public function efficiencyClass() {
        return $this->belongsTo('App\efficiencyClass', 'efficiencyClass');
    }

    public function fuelCategory() {
        return $this->belongsTo('App\fuelCategory');
    }

    public function fuelType() {
        return $this->belongsTo('App\fuelType');
    }

    public function interiorColor() {
        return $this->belongsTo('App\interiorColor');
    }

    public function vehicleBody() {
        return $this->belongsTo('App\vehicleBody');
    }

    public function vehicleOfferType() {
        return $this->belongsTo('App\vehicleOfferType');
    }

    public function transmission() {
        return $this->belongsTo('App\transmission');
    }

    public function driveType() {
        return $this->belongsTo('App\driveType');
    }

    public function upholstery() {
        return $this->belongsToMany('App\upholstery');
    }

    public function equipment() {
        return $this->belongsToMany('App\equipment');
    }

    public function images() {
        return $this->belongsToMany('App\image');
    }

}
