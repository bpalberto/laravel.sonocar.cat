<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vehicle;
use App\make;

/**
 * Description of CatalogueController
 *
 * @author alberto
 */
class CatalogueController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        
    }

    public function filter(Request $request) {
        if ($request->input('itemspp') !== null){
            $itemsPp = $request->input('itemspp');
        } else {
            $itemsPp = 15;
        }
        
        $allMakers = make::orderBy('name')->get();
        
        if ($request->input('hidden') !== null && $request->input('hidden') == '1') {

            $data = $request->except('hidden');
            return redirect()->route('/catalogue/hidden', $data);
        }
        
        if ($request->input('maker') !== null && $request->input('maker') !== 'all') {
            $filterMaker = $request->input('maker');            
            $vehicles = vehicle::where('make_id', $filterMaker)->paginate($itemsPp);
            
            return view('catalogue', ['vehicles' => $vehicles, 'makers' => $allMakers]);
        }
        
        $vehicles = vehicle::where('visible', true)->paginate($itemsPp);
        
        return view('catalogue', ['vehicles' => $vehicles, 'makers' => $allMakers]);
    }

    public function allVisible() {
        $newRequest = new Request;
        return CatalogueController::filter($newRequest);
    }

    public function vehicleDetail($id) {
        $vehicle = vehicle::find($id);
        
        if (is_null($vehicle)) {
            return view('no-find');
        }

        return view('vehicle-detail', ['vehicle' => $vehicle]);
    }
    
    public function vehicleDetailBySKU($sku) {
        $vehicle = vehicle::where('crossReference', $sku)->get()->first();
        
        if (is_null($vehicle)) {
            return view('no-find');
        }
        
        return view('vehicle-detail', ['vehicle' => $vehicle]);
    }

}
