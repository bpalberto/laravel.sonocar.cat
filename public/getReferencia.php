<?php

// Creación de la referencia cruzada única según la fecha de creación
$cTSP1 = "SNCR"; // Refiere eliminar las vocales a SONOCAR
$cTSP2 = date("y", time()); // Año (2D)
$cTSP3 = date("zHis", time()); // Día del año (3D) + Hora (2D) + Minutos (2D) + Segundos (2D)
$cTSP4 = mt_rand(0,9); // Número aleatorio de 0 a 9
$sku = $cTSP1.$cTSP2.$cTSP3.$cTSP4;



$protocol   = "https://";
$domain     = "www.sonocar.cat";
$path       = "/vehicle/sku/";

$url        = $protocol.$domain.$path.$sku;

?>

<form action="#" method="post">
    <p>
        <label for="inputSKU">SKU</label>
        <input id="inputSKU" type="text" name="sku" value="<?php echo $sku; ?>" disabled>
        <input id="inputData" type="hidden" name="data" value="<?php echo $url; ?>">
    </p>
    <p>
        <img src="/getVehicleURLQrCode.php?sku=<?php echo $sku; ?>">
    </p>
</form>
