<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\make;
use App\vehicle;
use App\image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Description of CatalogueController
 *
 * @author alberto
 */
class CatalogueAuthController extends Controller {

    public const STORAGE_PREFIX = "/storage";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->middleware('auth');
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

    protected function getNewSKU() {
        // Creación de la referencia cruzada única según la fecha de creación
        $cTSP1 = "SNCR"; // Refiere eliminar las vocales a SONOCAR
        $cTSP2 = date("y", time()); // Año (2D)
        $cTSP3 = date("zHis", time()); // Día del año (3D) + Hora (2D) + Minutos (2D) + Segundos (2D)
        $cTSP4 = mt_rand(0, 9); // Número aleatorio de 0 a 9
        $sku = $cTSP1 . $cTSP2 . $cTSP3 . $cTSP4;

        return $sku;
    }

    protected function getNewImageSKU() {
        // Creación de la referencia cruzada única según la fecha de creación
        $cTSP1 = "sncrimg"; // Refiere eliminar las vocales a SONOCAR IMAGE
        $cTSP2 = date("Y", time()); // Año (4D)
        $cTSP3 = date("zHis", time()); // Día del año (3D) + Hora (2D) + Minutos (2D) + Segundos (2D)
        $cTSP4 = mt_rand(0, 999); // Número aleatorio de 0 a 999
        $sku = $cTSP1 . $cTSP2 . $cTSP3 . $cTSP4;

        return $sku;
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
            "transmission_id" => "required",
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

    protected function getValidateRulesForModification() {
        // Campos que no van a ser modificados
        $unsetFields = array(
            'availability_type_id',
            'make_id',
            'model_id',
            'vehicle_body_id',
            'vehicleType',
            'fuel_category_id',
            'emission_sticker_id',
            'doors',
            'seats',
            'body_color_id',
            'interior_color_id',
            'upholstery',
            'drive_type_id',
            'efficiencyClass',
            'vehicle_offer_type_id',
            'transmission_id',
        );
        $dataRules = $this->getValidateRules();

        foreach ($unsetFields as $field) {
            unset($dataRules["$field"]);
        }

        return $dataRules;
    }

    protected function getValidatedData(Request $request) {
        $dataRules = $this->getValidateRules();

        $validatedData = $request->validate($dataRules);

        if ($validatedData['deliveryDate'] !== null) {
            $deliveryDate = date_create_from_format("d/m/Y", $validatedData['deliveryDate']);
            $validatedData['deliveryDate'] = null;
            $validatedData['deliveryDate'] = $deliveryDate;
        }

        // campos que no estan en el formulario
        $validatedData['particleFilter'] = false;    // (REQUIRED)
        $validatedData['pollution_class_id'] = null;     // (nullable)
        $validatedData['fuel_type_id'] = null;     // (nullable)
        $validatedData['autonomy'] = null;     // (nullable)
        $validatedData['offerReference'] = null;     // (nullable)
        $validatedData['warrantyMonths'] = 12;       // (REQUIRED)
        // Campos de compatibilidad externa
        $validatedData['vehicleIdentifier'] = null;     // (nullable) (ID de Autoscout24)

        return $validatedData;
    }

    public function submitVehicleGet() {

        $data = $this->getExtraData();

        return view('submit-vehicle', $data);
    }

    public function submitVehiclePost(Request $request) {

        $validatedData = $this->getValidatedData($request);

        // Campos automáticamente generados
        $sku = $this->getNewSKU();
        $validatedData['crossReference'] = $sku;     // (nullable)
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

    public function submitImagePost(Request $request) {
        $referer = $request->headers->get('referer') . "#section_add_image";
        $vehicleIdGiven = intval($request->get('vehicleId'));
        $vehicleId = vehicle::query()->find($vehicleIdGiven)->id;

        $imageUrlGiven = $request->get('imageURL');
        $fileGiven = $request->file('imageFile');

        // Primero, ver si la id de vehículo es válida
        if ($vehicleId !== null) {

            // Segundo, ver si se ha pasado una url externa
            if ($imageUrlGiven !== null) {
                $newImageData = array(
                    'url' => $imageUrlGiven,
                    'fileName' => null,
                    'vehicle_id' => $vehicleId,
                );

                // Tercero, ver si se ha pasado un fichero para subir 
            } else if ($fileGiven !== null) {

                $newImageData = array(
                    'url' => null,
                    'fileName' => $this->storeImageFile($fileGiven),
                    'vehicle_id' => $vehicleId,
                );

                // Por último, si los valores no son los esperados, anulamos la operación.
            } else {
                $newImageData = null;
            }

            if ($newImageData !== null && ( ($newImageData['url'] !== null) || ($newImageData['fileName'] !== null) )) {
                $newImage = new \App\image($newImageData);
                $newImage->save();
            }
        }

        return redirect($referer);
    }

    protected function storeImageFile(UploadedFile $fileGiven) {
        $destFileName = $this->getNewImageSKU();
        $destFilePath = "/images/vehicles/";

        switch ($fileGiven->getMimeType()) {
            case "image/jpeg";
                $destFileName = $destFileName . ".jpeg";
                break;
            case "image/png":
                $destFileName = $destFileName . ".png";
                break;
            default :
                return null;
        }

        $fileGiven->storePubliclyAs($destFilePath, $destFileName, 'public');
        return ( self::STORAGE_PREFIX . $destFilePath . $destFileName );
    }

    /**
     * Get vehicle data to modify and show form with modify flag. 
     * 
     * @param type $id (vehicle id to modify data)
     * @return view
     */
    public function modifyVehicleID($id) {
        $vehicle = vehicle::find($id);

        $data = $this->getExtraData();
        $data['modify'] = true;
        $data['vehicle'] = $vehicle;

        return view('submit-vehicle', $data);
    }

    /**
     * Get modified data from a form, and update it to the model
     * 
     * @param Request $request
     * @param type $id (vehicle id to modify data)
     * @return view
     */
    public function modifyVehicleIDPost(Request $request, $id) {
        $validatedData = $request->validate($this->getValidateRulesForModification());

        $selectedEquipment = new \ArrayObject();
        foreach ($request->get('equipment') as $equipmentID => $hasIt) {
            if ($hasIt === "1") {
                $selectedEquipment->append(intval($equipmentID));
            }
        }

        $vehicle = vehicle::where('id', $id)->get()->first();
        $vehicle->equipment()->sync($selectedEquipment->getArrayCopy());
        $vehicle->update($validatedData);

        $data = $this->getExtraData();
        $data['modify'] = true;
        $data['vehicle'] = $vehicle;

        if ($vehicle->save()) {
            $data['result'] = true;
            return view('submit-vehicle', $data);
        } else {
            $data['result'] = false;
            return view('submit-vehicle', $data);
        }
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

    public function deleteVehicle(Request $request, $vehicleId) {

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

    public function deleteImage(Request $request, $imageId) {
        $referer = $request->headers->get('referer') . "#section_images";
        $image = image::query()->find($imageId);

        // Primero, ver si es externa (Si -> elimina de la BD // No -> ver si es local)
        if ($image->url !== null) {
            $image->delete();
        } else if ($image->fileName !== null) {
            // Si la imagen es local, se borra del servidor y de la BD, si hay algún problema, no se hace nada.
            if ($this->deleteImageFromDisk($image->fileName)) {
                $image->delete();
            }
        }

        return redirect($referer);
    }

    protected function deleteImageFromDisk($fullPath) {
        $path = substr($fullPath, (strlen(self::STORAGE_PREFIX)));

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        } 
        
        return false;
    }

}
