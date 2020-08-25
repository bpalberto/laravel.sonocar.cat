<?php

/*
 * es_CA
 */

 $noticeText                = <<<EOD
                            <p>
                                La present pàgina Web ha estat dissenyada per donar a conèixer els serveis oferts per :propietario.
                                És per això que en compliment del que exigeix la Llei 34/2002 se l'informa que la present pàgina i el seu
                                domini pertany a :propietario amb NIF :nif_propietario i domicili social a :direccion_html.
                            </p>
                            <p>
                                El domini <a href="https://:dominio">:dominio</a> és titularitat de :propietario
                                amb NIF :nif_propietario titular dels drets de propietat intel·lectual sobre els webs i els seus continguts,
                                sense perjudici dels drets legítims de tercers.
                            </p>
                            <p>
                                Vostè pot posar-se en contacte amb nosaltres al següent correu electrònic: :email.
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $respLimitText             = <<<EOD
                            <p>
                                :propietario efectua els majors esforços per a l'actualització, manteniment i funcionament del seu lloc web,
                                oferint als l'Usuari aquest lloc com una eina per a la informació corporativa i de serveis, no obstant,
                                :propietario no pot garantir l'absència de fallades tècniques, la seguretat total de el servei WEB,
                                ni que el mateix aquest operatiu les 24 hores del dia, set dies a la setmana en tot moment.
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $industrialPropertyText    = <<<EOD
                            <p>
                                Aquesta WEB és propietat de :propietario dels drets de Propietat Intel·lectual i d'explotació i reproducció d'aquesta web,
                                de les seves pàgines, pantalles, la informació que contenen, la seva aparença i disseny, així com els vincles ("hiperlinks")
                                que s'estableixin des d'ella a altres pàgines web de qualsevol societat anunciant en la mateixa, són propietat exclusiva d'aquesta
                                i altres anunciants conforme a les seves WEB s corporatives, llevat que expressament s'especifiqui una altra cosa. Qualsevol denominació,
                                disseny i / o logotip, foto, així com qualsevol producte o servei oferts i reflectits en aquesta pàgina web, són propietat de :propietario.
                            </p>
                            <p>
                                Qualsevol ús indegut de les mateixes per persones diferents del seu legítim titular i sense el consentiment exprés i inequívoc per part
                                d'aquest podrà ser denunciat i perseguit a través de tots els mitjans legals existents en l'Ordenament Jurídic espanyol i / o comunitari.
                            </p>
                            <p>
                                Els drets d'autor, propietat intel·lectual i marques de tercers si els hagués estan destacats convenientment i han de ser respectats
                                per tot aquell que accedeixi a aquesta pàgina, no essent responsabilitat de :propietario l'ús que l'usuari pugui portar a terme a l'respecte,
                                recaient la responsabilitat exclusiva en la seva persona.
                            </p>
                            <p>
                                :propietario es reserva la facultat de modificar, suspendre, cancel·lar o restringir el contingut de la web, els vincles o la informació
                                obtinguda a través d'ella, sense necessitat de previ avís. Aquesta, en cap cas, assumeix responsabilitat com a conseqüència de la incorrecta
                                utilització de la WEB que pugui dur a terme l'usuari, tant de la informació com dels serveis en ella continguts.
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $lopdTreatmentInfoText     = <<<EOD
                            <p>
                                En compliment del deure legal d'informació establert en la Llei 3/2018 de Protecció de Dades Personals i Garantia dels Drets Digitals
                                i en l'article 13 de Reglament (EU) 20106/679 se'ls facilita la següent informació bàsica relativa a les dades personals facilitades.
                            </p>
                            <p>
                                Responsable del tractament:<br/>
                                :propietario     <br/>
                                :nif_propietario <br/>
                                :direccion_html  <br/>
                                :email           <br/>
                                :telefono        <br/>
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $purposeTreatmentText      = <<<EOD
                            <p>
                                Tractem la informació que ens facilita per tal de complir amb el deure d'informació prèvia i serveis proporcionats per la nostra empresa.
                                S'utilitzarà el seu correu electrònic per gestionar l'enviament de la informació que ens sol·liciti i per facilitar-ofertes de productes i serveis
                                nous que poguessin ser del seu interès. Les dades personals proporcionades es conservaran mentre no se sol·liciti la seva supressió per l'interessat.
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $legitimationTreatmentText = <<<EOD
                            <p>
                                La base legal per al tractament de les seves dades és el seu consentiment previ per enviar-li informació sobre productes i serveis.
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $recipientsText            = <<<EOD
                            <p>
                                Si sol·licitada informació dels nostres serveis no està prevista cap cessió. Si finalment contracta algun dels nostres serveis les cessions
                                previstes seran les mínimes i necessàries per al correcte compliment de l'servei contractat, la seva formalització, pagament i facturació.
                                NO es preveuen transferència de dades a tercers països.
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $rightsText                = <<<EOD
                            <p>
                                Vostè té dret a obtenir informació sobre si estem tractant dades personals que el concerneixen o no. Podrà exercir els drets d'accés,
                                rectificació, supressió, limitació, portabilitat i cancel·lació sobre les seves dades personals.
                            </p>
                            EOD;

/********************************************************************************************************************************/

 $originText                = <<<EOD
                            <p>
                                Les dades personals procedeixen de la persona interessada i / o de proveïdors als quals hagi prestat el seu consentiment. La categoria de dades que
                                tractem són: identificatives (nom, cognoms, DNI, telèfon), adreces postals i electròniques per a comunicacions. A causa de l'activitat
                                principal i als serveis contractats NO es tracten dades especialment protegides.
                            </p>
                            EOD;

/********************************************************************************************************************************/

return [

    "mainTitle"                 => "Informació Legal i Política de Privacitat",
    "noticeTitle"               => "Avís Legal (LSSI)",
    "respLimitTitle"            => "Limitació de Responsabilitat",
    "industrialPropertyTitle"   => "Propietat Industrial i Intel·lectual",
    "lopdTitle"                 => "Protecció de Dades (LOPD – RUE)",
    "lopdTreatmentInfoTitle"    => "Informació del Tractament de Dades de Caràcter Personal",
    "purposeTreatmentTitle"     => "Finalitats del Tractament",
    "legitimationTreatmentTitle" => "Legitimació de l'Tractament",
    "recipientsTitle"           => "Destinataris",
    "rightsTitle"               => "Drets",
    "originTitle"               => "Procedència",

    "noticeText"                => $noticeText               ,
    "respLimitText"             => $respLimitText            ,
    "industrialPropertyText"    => $industrialPropertyText   ,
    "lopdTreatmentInfoText"     => $lopdTreatmentInfoText    ,
    "purposeTreatmentText"      => $purposeTreatmentText     ,
    "legitimationTreatmentText" => $legitimationTreatmentText,
    "recipientsText"            => $recipientsText           ,
    "rightsText"                => $rightsText               ,
    "originText"                => $originText               ,


];
