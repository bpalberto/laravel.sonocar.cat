<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sonocar\Utils\QRCodeTools\QRcode;

class QrCodeController extends Controller {
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        
    }

    public function getVehicleQRCodeBySKU(Request $request) {
        
        if ( $request->get('print') !== null ) {
            $printParameter = $request->get('print');
        } else {
            $printParameter = "";
        }

        if ( $request->get('sku') !== null ) {
            $skuParameter = $request->get('sku');
        } else {
            $skuParameter = "";
        }
        
        $printPattern = '/^[0-1]/';
        $printInputIsValid = preg_match($printPattern, $printParameter);
        $printVersion = ($printInputIsValid) ? $printParameter : "0";

        $skuPattern = '/^SNCR\d{12}/';
        $skuInputIsValid = preg_match($skuPattern, $skuParameter);

        $appURL = getenv('APP_URL');
        $path = "/catalogue/vehicle/sku/";
        $sku = ($skuInputIsValid) ? $skuParameter : $path = "";
        $url = $appURL . $path . $sku;

        $dataToQR = $url;
        $outfile = false;
        $errorCorrectionLevel = 'H';
        $matrixPointSize = 10;
        $margin = 4;
        $saveandprint = false;

        if ($printVersion == "1") {
            $bgcolor = "#FFFFFF";
            $fgcolor = "#000000";
        } else {
            $bgcolor = "#F7930E";
            $fgcolor = "#252525";
        }

        
        $qrCodeResult = QRcode::png($dataToQR, $outfile, $errorCorrectionLevel, $matrixPointSize, $margin, $saveandprint, $bgcolor, $fgcolor);
        return response($qrCodeResult)->header('Content-type','image/png');
    }

}
