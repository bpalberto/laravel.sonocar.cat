<?php

/* 
 * es_CA
 */

$instructionsText = <<< EOF
        <p>
        <ol>
            <li>Crea un correu electrònic nou i dissenya l'anunci de les novetats. </li>
            <li>Copia la llista d'adreces a continuació i enganxa-la al camp CCO del correu electrònic creat. </li>
            <li>Finalment, dóna-li a enviar i tots els teus subscriptors rebran l'anunci. </li>
        <ol>
        </p>
        <p>
            Properament, es podrà fer de forma més automatitzada.
        </p>
        EOF;

$notFound = <<< EOF
        <h3 class="text-warning">No s'han trobat subscriptors a la base de dades.</h3>
        <h1 class="text-danger">:'(</h1>
        EOF;

return [

    "title"                 => "Llista de subscriptors del butlletí de notícies:",
    "instructionsTitle"     => "Instruccions:",

    "instructionsText"      => $instructionsText,
    "notFound"              => $notFound,
 
];
