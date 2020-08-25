<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


die('Opción desactivada...');
//header('Content-disposition: attachment; filename=models.json');
//header('Content-type: text/plain');

/*
$handle = curl_init();

$url = "https://www.ladygaga.com";

// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($handle);

curl_close($handle);

echo $output;
* 
* curl https://api.autoscout24.com/makes -X GET -H "X-AS24-Version: 1.1" -H "Accept-Language: es-ES"
*/


$server = "localhost";
$userDB = "sonocarweb";
$passDB = "pnolik1234";
$nameDB = "sonocar";

$dbConn = mysqli_connect($server, $userDB, $passDB);

if ($dbConn) {
mysqli_select_db($dbConn, $nameDB);
mysqli_query($dbConn, "SET CHARACTER SET 'utf8'");
mysqli_query($dbConn, "SET SESSION collation_connection ='utf8_unicode_ci'");
} else {
die("ERROR: No se puede conectar a la base de datos. " . mysqli_connect_error());
}

/* * ********************************* */


$sql = "SELECT * FROM make";
$stmt = mysqli_prepare($dbConn, $sql);

$result = mysqli_query($dbConn, $sql);

$makes = array();
while ($maker = mysqli_fetch_object($result)) {
array_push($makes, $maker);
}



mysqli_close($dbConn);
/* * ********************************* */

$output = "";

//titulos
echo "id , make, name,\n";


foreach ($makes as $oneMaker) {

$make = $oneMaker->id;

$handle = curl_init();

$url = "https://api.autoscout24.com/makes/$make/models";

curl_setopt($handle, CURLOPT_URL, $url);

curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

curl_setopt($handle, CURLOPT_HTTPHEADER, array(
'X-AS24-Version: 1.1',
'Accept-Language: es-ES'
));

$output = curl_exec($handle);

curl_close($handle);

$decoded = json_decode($output);

$models = $decoded->_data->models;

foreach ($models as $model) {

echo $model->id;
echo ", ";
echo $model->make;
echo ", \"";
echo $model->name;
echo "\",\n";
}
}

