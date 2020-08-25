<?php
include('./bat/sonocarqrcode.php');

if ( isset($_GET['print']) ){
    $printParameter = $_GET['print'];
} else {
    $printParameter = "";
}

if ( isset($_GET['sku']) ){
    $skuParameter = $_GET['sku'];
} else {
    $skuParameter = "";
}

$printPattern       = '/^[0-1]/';
$printInputIsValid  = preg_match( $printPattern, $printParameter) ;

$printVersion       = ($printInputIsValid) ? $printParameter : "0" ;

$skuPattern = '/^SNCR\d{12}/';
$skuInputIsValid = preg_match( $skuPattern, $skuParameter);

$protocol   = ( $_SERVER['SERVER_PORT'] === 443 ) ? "https://" : "http://";
$domain     = $_SERVER['SERVER_NAME'];
$path       = "/catalogue/vehicle/sku/";
$sku        = ($skuInputIsValid) ? $skuParameter : $path = "" ;
$url        = $protocol.$domain.$path.$sku;

$dataToQR               = $url;
$filename               = false;
$errorCorrectionLevel   = 'H';
$matrixPointSize        = 8;
$margin                 = 4;
$saveandprint           = false;

if ($printVersion == "1") {
    $bgcolor = "#FFFFFF";
    $fgcolor = "#000000";
} else {
    $bgcolor = "#F7930E";
    $fgcolor = "#000000";
}

// outputs image directly into browser, as PNG stream

QRcode::png($dataToQR, $filename, $errorCorrectionLevel, $matrixPointSize, $margin, $saveandprint, $bgcolor, $fgcolor);
