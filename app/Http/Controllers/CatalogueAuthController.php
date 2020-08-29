<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\make;
use App\vehicle;

/**
 * Description of CatalogueController
 *
 * @author alberto
 */
class CatalogueAuthController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the catalogue's hidden vehicles.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function hidden(Request $request) {
        if ($request->input('itemspp') !== null) {
            $itemsPp = $request->input('itemspp');
        } else {
            $itemsPp = 15;
        }

        if ($request->input('hidden') !== null && $request->input('hidden') == '0') {

            $data = $request->except('hidden');
            return redirect()->route('/catalogue', $data);
        }


        $allMakers = make::orderBy('name')->get(); // For search list in view

        if ($request->input('maker') !== null && $request->input('maker') !== 'all') {
            $filterMaker = $request->input('maker');
            $vehicles = vehicle::where('make_id', $filterMaker)->paginate($itemsPp);

            return view('catalogue', ['vehicles' => $vehicles, 'makers' => $allMakers]);
        }

        $vehicles = vehicle::where('visible', false)->paginate($itemsPp);

        return view('catalogue', ['vehicles' => $vehicles, 'makers' => $allMakers]);
    }

    protected function getExtraData() {

        $avalabilities = \Illuminate\Support\Facades\DB::table('availability_types')->orderBy('name', 'asc')->get();
        $vehicleMakers = \Illuminate\Support\Facades\DB::table('makes')->orderBy('name', 'asc')->get();
        $vehicleModels = \Illuminate\Support\Facades\DB::table('models')->orderBy('name', 'asc')->get();
        $vehicleBodies = \Illuminate\Support\Facades\DB::table('vehicle_bodies')->orderBy('name', 'asc')->get();
        $fuelCategories = \Illuminate\Support\Facades\DB::table('fuel_categories')->orderBy('name', 'asc')->get();
        $offerTypes = \Illuminate\Support\Facades\DB::table('vehicle_offer_types')->orderBy('name', 'asc')->get();
        $bodyColors = \Illuminate\Support\Facades\DB::table('body_colors')->orderBy('name', 'asc')->get();
        $upholsteries = \Illuminate\Support\Facades\DB::table('upholsteries')->orderBy('name', 'asc')->get();
        $interiorColors = \Illuminate\Support\Facades\DB::table('interior_colors')->orderBy('name', 'asc')->get();
        $equipment = \Illuminate\Support\Facades\DB::table('equipment')->orderBy('name', 'asc')->get();
        $emissionsStickers = \Illuminate\Support\Facades\DB::table('emissions_stickers')->orderBy('name', 'asc')->get();
        $efficiencyClasses = \Illuminate\Support\Facades\DB::table('efficiency_classes')->orderBy('name', 'asc')->get();
        $driveTypes = \Illuminate\Support\Facades\DB::table('drive_types')->orderBy('name', 'asc')->get();
        $transmissions = \Illuminate\Support\Facades\DB::table('transmissions')->orderBy('name', 'asc')->get();


        $data = array(
            'avalabilities' => $avalabilities,
            'vehicleMakers' => $vehicleMakers,
            'vehicleModels' => $vehicleModels,
            'vehicleBodies' => $vehicleBodies,
            'fuelCategories' => $fuelCategories,
            'offerTypes' => $offerTypes,
            'bodyColors' => $bodyColors,
            'upholsteries' => $upholsteries,
            'interiorColors' => $interiorColors,
            'equipment' => $equipment,
            'emissionsStickers' => $emissionsStickers,
            'efficiencyClasses' => $efficiencyClasses,
            'driveTypes' => $driveTypes,
            'transmissions' => $transmissions,
            'modify' => false,
            'vehicle' => null,
            'result' => null
        );

        return $data;

    }

    protected function getValidateRules() {

        $dataRules = array(
            "availability_type_id" => "required",
            "deliveryDate" => "nullable|date_format:d/m/Y",
            "deliveryDays" => "nullable|numeric",
            "make_id" => "required",
            "model_id" => "required",
            "modelVersion" => "nullable",
            "vehicle_body_id" => "required",
            "vehicleType" => "required",
            "vehicle_offer_type_id" => "required",
            "powerKw" => "required",
            "powerCv" => "required",
            "firstRegistration" => "required|date_format:m/Y",
            "mileage" => "required",
            "fuel_category_id" => "required",
            "electricConsumptionCombined" => "nullable",
            "fuelConsumptionUrban" => "nullable",
            "fuelConsumptionHighway" => "nullable",
            "fuelConsumptionCombined" => "nullable",
            "emission_sticker_id" => "required",
            "efficiencyClass" => "required",
            "co2" => "required",
            "drive_type_id" => "required",
            "transmission" => "required",
            "gears" => "required",
            "cylinders" => "nullable",
            "cylinderCapacity" => "nullable",
            "emptyWeight" => "nullable",
            "vin" => "nullable",
            "licencePlateNumber" => "nullable",
            "doors" => "required",
            "seats" => "required",
            "body_color_id" => "required",
            "metallic" => "required|boolean",
            "upholstery" => "required",
            "interior_color_id" => "required",
            "nextInspection" => "nullable|date_format:m/Y",
            "lastTechnicalService" => "nullable|date_format:m/Y",
            "lastCamBeltService" => "nullable|date_format:m/Y",
            "fullServiceHistory" => "required|boolean",
            "nonSmoking" => "required|boolean",
            "accident" => "required|boolean",
            "cabOrRental" => "required|boolean",
            "previousOwners" => "nullable",
            "description" => "nullable",
            "price" => "required|numeric",
            "isSold" => "boolean",
            "isVisible" => "boolean",
        );

        return $dataRules;

    }

    public function submitVehicleGet() {

        $data = $this->getExtraData();

        return view('submit-vehicle', $data);
    }

    public function submitVehiclePost(Request $request) {

        $dataRules = $this->getValidateRules();

        $validatedData = $request->validate($dataRules);
        
        if ( isset($validatedData['deliveryDate']) ){
            $deliveryDate = date_create_from_format("d/m/Y", $validatedData['deliveryDate']);
            $validatedData['deliveryDate'] = null;
            $validatedData['deliveryDate'] = $deliveryDate;
        }
        

        // Creación de la referencia cruzada única según la fecha de creación
        $cTSP1 = "SNCR"; // Refiere eliminar las vocales a SONOCAR
        $cTSP2 = date("y", time()); // Año (2D)
        $cTSP3 = date("zHis", time()); // Día del año (3D) + Hora (2D) + Minutos (2D) + Segundos (2D)
        $cTSP4 = mt_rand(0, 9); // Número aleatorio de 0 a 9
        $sku = $cTSP1 . $cTSP2 . $cTSP3 . $cTSP4;


        // campos a cambiar de nombre en el formulario
        //$validatedData['make_id']                   = $validatedData['maker'];
        //$validatedData['model_id']                  = $validatedData['model'];
        //$validatedData['body_color_id'] = $validatedData['bodyColor'];
        //$validatedData['drive_type_id'] = $validatedData['driveType'];
        //$validatedData['emission_sticker_id'] = $validatedData['emissionsSticker'];
        //$validatedData['fuel_category_id'] = $validatedData['fuelCategory'];
        //$validatedData['interior_color_id'] = $validatedData['interiorColor'];
        //$validatedData['licencePlateNumber'] = $validatedData['licensePlate'];
        //$validatedData['transmission_id'] = $validatedData['transmission'];
        //$validatedData['vehicle_body_id'] = $validatedData['vehicleBody'];
        //$validatedData['vehicle_offer_type_id'] = $validatedData['offerType'];
        //$validatedData['vin'] = $validatedData['vinNumber'];
        //$validatedData['sold'] = $validatedData['isSold'];
        //$validatedData['visible'] = $validatedData['isVisible'];


        // campos que no estan en el formulario
        $validatedData['particleFilter'] = false;    // (REQUIRED)
        $validatedData['pollution_class_id'] = null;     // (nullable)
        $validatedData['fuel_type_id'] = null;     // (nullable)
        $validatedData['autonomy'] = null;     // (nullable)
        $validatedData['offerReference'] = null;     // (nullable)
        $validatedData['warrantyMonths'] = 12;       // (REQUIRED)

        // Campos automáticamente generados
        $validatedData['crossReference'] = $sku;     // (nullable)

        // Campos de compatibilidad externa
        $validatedData['vehicleIdentifier'] = null;     // (nullable) (ID de Autoscout24)

        // Crear objeto desde los datos válidos
        $vehicle = new \App\vehicle($validatedData);


        // Hacer persistente en la BBDD el objeto
        if ($vehicle->save()) {
            $request->session()->flush();

            $vehicle->refresh();
            return redirect()->route('/catalogue/vehicle/id', ['id' => $vehicle->id, 'modify' => true, 'vehicle' => $vehicle, 'result' => true]);
        } else {
            $request->session()->reflash();
            return view('/submit-vehicle', ['modify' => false, 'vehicle' => null, 'result' => false]);
        }
    }

    public function modifyVehicleID($id) {
        $vehicle = vehicle::find($id);

        $data = $this->getExtraData();
        $data['modify'] = true;
        $data['vehicle'] = $vehicle;

        return view('submit-vehicle', $data);
    }

    public function modifyVehicleIDPost(Request $request, $id) {
        $vehicle = vehicle::where('id', $id)->get()[0];

        $vehicle->description = $request['description'];
        $vehicle->price = $request['price'];

        if ($request['sold'] == "true") {
            $vehicle->sold = true;
        } else {
            $vehicle->sold = false;
        }

        if ($request['visible'] == "true") {
            $vehicle->visible = true;
        } else {
            $vehicle->visible = false;
        }

        if ($vehicle->save()) {
            return view('submit-vehicle', ['modify' => true, 'vehicle' => $vehicle, 'result' => true]);
        } else {
            return view('submit-vehicle', ['modify' => true, 'vehicle' => $vehicle, 'result' => false]);
        }
    }

    public function delete(Request $request, $id) {

        if ($request->is('*/yes')) {
            // Delete confirmated
            $deleted = false;
            $affectedRows = vehicle::destroy($id);
            if ($affectedRows > 0) {
                $deleted = true;
            }
            return view('confirm-delete', ['vehicle' => null, 'confirm' => $deleted]);
        } else {
            // request to confirm
            $vehicle = vehicle::where('id', $id)->get();
            return view('confirm-delete', ['vehicle' => $vehicle[0], 'confirm' => false]);
        }
        return view('confirm-delete', ['vehicle' => null, 'confirm' => false]);
    }

}
