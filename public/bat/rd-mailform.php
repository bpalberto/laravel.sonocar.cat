<?php
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';
require './phpmailer/Exception.php';
require './phpmailerconfig.php';

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

$template = file_get_contents('rd-mailform.html');

$mailFrom = '';
$nameFrom = '';
$subject = '';
$message = '';
$vehicleId = -1;

$siteURL = "http://".$_SERVER['SERVER_NAME'];
$vehicleURL = $siteURL."/catalogue/vehicle/";

if (sizeof($mailrecipients) < 1) {
    die('MF001');
}

if (isset($_POST['form-type'])) {
    switch ($_POST['form-type']){
        case 'contact':
            $subject = $phpmailerconfig['subjectContact'];
            break;
        case 'subscribe':
            $subject = $phpmailerconfig['subjectSubscribe'];
            break;
        case 'order':
            $subject = $phpmailerconfig['subjectOrder'];
            if (isset($_POST['vehicleId'])) {
                $vehicleId = $_POST['vehicleId'];
            }
        break;
        default:
            $subject = $phpmailerconfig['subjectContact'];
            break;
    }
}else{
    die('MF004');
}

if (isset($_POST['email'])) {
    $mailFrom = $_POST['email'];
    $template = str_replace(
        array("<!-- #{FromEmailLabel} -->", "<!-- #{FromEmail} -->"),
        array("Email: ", $mailFrom),
        $template);

    if (isset($_POST['name'])) {
        $nameFrom = $_POST['name'];
        $template = str_replace(
            array("<!-- #{FromNameLabel} -->", "<!-- #{FromName} -->"),
            array("Nombre: ", $nameFrom),
            $template);
    } else {
        die('MF003');
    }
} else {
    die('MF003');
}

if (isset($_POST['message']) &&  strlen($_POST['message']) > 10 ) {
    $message = $_POST['message'];
    // convert new lines into <br /> html break line
    $message = str_replace(array("\r\n", "\r", "\n"), "<br/>", $message);

    // insert message into the template
    $template = str_replace(
        array("<!-- #{MessageLabel} -->", "<!-- #{MessageDescription} -->"),
        array("Mensaje: ", $message),
        $template);

} else {
    die('MF005');
}

if (isset($_POST['vehicleId'])) {
    $vehicleURL = $vehicleURL."sku/".$_POST['vehicleId'];
    $vehicleLink = "<a href='$vehicleURL' class='btn btn-primary'>Ver Vehículo Solicitado</a>";

    $template = str_replace(
        array("<!-- #{VehicleState} -->", "<!-- #{VehicleLink} -->"),
        array("Vehículo interesado: ", $vehicleLink ),
        $template);
}

$template = str_replace(
        array("<!-- #{Subject} -->", "<!-- #{SiteName} -->"),
        array($subject, $_SERVER['SERVER_NAME']),
        $template);

$template = str_replace(
        array("<!-- #{SiteURL} -->"),
        array($siteURL),
        $template);


// All correct, GO!!
if ($phpmailerconfig['useSmtp']) {
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //Set the hostname of the mail server
    $mail->Host = $phpmailerconfig['host'];
    //Set the SMTP port number - likely to be 25, 465 or 587
    //$mail->Port = 587;
    $mail->Port = $phpmailerconfig['port'];
    //$mail->SMTPSecure = 'tls';
    $mail->SMTPSecure = $phpmailerconfig['secure'];
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = $phpmailerconfig['username'];
    //Password to use for SMTP authentication
    $mail->Password = $phpmailerconfig['password'];

    //Set who the message is to be sent from
    $mail->setFrom($mailFrom,$nameFrom);
    //Set an alternative reply-to address
    //$mail->addReplyTo('mail@albertito.xyz', 'First Last');

    //Set who the message is to be sent to
    foreach ($mailrecipients as $key => $value) {
        $mail->addAddress($value, '');
    }

    //Set the subject line
    $mail->Subject = $subject;

    //Set the Body
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->MsgHTML($template);

    /*
    $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
    <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
    $mail->Body = $mailContent;
    */
    //$mail->Body = $message;


    //send the message, check for errors
    if ($mail->send()) {
        die('MF000');
    } else {
        echo $mail->ErrorInfo;
        die('MF254');
    }
}
