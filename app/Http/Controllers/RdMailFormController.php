<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\PHPMailer\PHPMailer;
use App\Utils\PHPMailer\SMTP;

class RdMailFormController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function RDMailForm(Request $request) {
        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');

        // Collect the sended data
        $formType = $request->get('form-type');
        $vehicleId = $request->get('vehicleId');
        $mailFrom = $request->get('email');
        $nameFrom = $request->get('name');
        $message = $request->get('message');

        // Get Config parameters
        $phpmailerconfig = $this->getConfig();
        $mailrecipients = $phpmailerconfig['recipients'];
        $template = $this->getTemplate();

        // URL's config
        $siteURL = getenv("APP_URL");
        $vehicleURL = $siteURL . "/catalogue/vehicle/sku/" . $vehicleId;
        $vehicleLink = "<a href='$vehicleURL' class='btn btn-primary'>Ver Vehículo Solicitado</a>";


        // At least one recipient must be configured
        if (sizeof($mailrecipients) < 1) {
            return ('MF001');
        }

        // Form type parameter must be configured in order to switch the subject
        if ($formType !== null && $formType !== "") {
            switch ($formType) {
                case 'contact':
                    $subject = $phpmailerconfig['subjectContact'];
                    break;
                case 'subscribe':
                    $subject = $phpmailerconfig['subjectSubscribe'];
                    break;
                case 'order':
                    $subject = $phpmailerconfig['subjectOrder'];
                    break;
                default:
                    $subject = $phpmailerconfig['subjectContact'];
                    break;
            }
            $template = str_replace(
                    array("<!-- #{Subject} -->", "<!-- #{SiteURL} -->"),
                    array($subject, $siteURL),
                    $template);
        } else {
            return ('MF004');
        }

        // From email must be set
        if ($mailFrom !== null && $this->comprobar_email($mailFrom)) {

            // From name must be set
            if ($nameFrom !== null && $nameFrom !== "") {
                $template = str_replace(
                        array("<!-- #{FromEmailLabel} -->", "<!-- #{FromEmail} -->"),
                        array("Email: ", $mailFrom),
                        $template);
                $template = str_replace(
                        array("<!-- #{FromNameLabel} -->", "<!-- #{FromName} -->"),
                        array("Nombre: ", $nameFrom),
                        $template);
            } else {
                return ('MF003');
            }
        } else {
            return ('MF003');
        }

        if ($message !== null && strlen($message) > 10) {
            // convert new lines into <br /> html break line
            $message = str_replace(array("\r\n", "\r", "\n"), "<br/>", $message);

            // insert message into the template
            $template = str_replace(
                    array("<!-- #{MessageLabel} -->", "<!-- #{MessageDescription} -->"),
                    array("Mensaje: ", $message),
                    $template);
        } else {
            return ('MF005');
        }

        if ($vehicleId !== null && $vehicleId !== "") {
            // insert vehicle button
            $template = str_replace(
                    array("<!-- #{VehicleState} -->", "<!-- #{VehicleLink} -->"),
                    array("Vehículo interesado: ", $vehicleLink),
                    $template);
        }


        // All correct, GO!!
        if ($phpmailerconfig['useSmtp']) {

            //Create a new PHPMailer instance
            $mail = new PHPMailer();
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
            $mail->setFrom($mailFrom, $nameFrom);
            //Set an alternative reply-to address
            //$mail->addReplyTo('mail@albertito.xyz', 'First Last');
            //Set who the message is to be sent to
            foreach ($mailrecipients as $value) {
                $mail->addAddress($value, '');
            }

            //Set the subject line
            $mail->Subject = $subject;

            //Set the Body
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->MsgHTML($template);


            if ($mail->send()) {
                return ('MF000');
            } else {
                echo $mail->ErrorInfo;
                return ('MF254');
            }
        }
    }

    private function getTemplate() {
        $template = <<< TEMP
                <!DOCTYPE html">
                <html xmlns="http://www.w3.org/1999/xhtml">
                  <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
                    <title><!-- #{Subject} --></title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                    <style>
                      a, a:hover, a:visited{
                        color: black;
                      }
                      .bg-orange {
                        background-color: #F7931E;
                      }
                      .btn-primary{
                        background-color: #F7931E;
                        color: black;
                        border-style: solid;
                        border-width: 1px;
                        border-color: black;
                      }
                      .btn-primary:hover{
                        background-color: black;
                        color: #F7931E;
                        border-style: solid;
                        border-width: 1px;
                        border-color: #F7931E;
                      }

                    </style>
                  </head>
                  <body class="bg-orange">
                    <div class="container">
                      <div class="row justify-content-center">
                        <div class="col-8 col-md-5 text-center text-md-left my-5">
                          <a href="<!-- #{SiteURL} -->"><img class="img-fluid" src="<!-- #{SiteURL} -->/images/logo.png"></a>
                        </div>
                        <div class="col-12 col-md-5 text-center text-md-right my-5">
                          <h3 class="text-uppercase text-center text-md-right">Notificación</h3>
                        </div>
                      </div>
                      <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                          <div class="card text-center">
                            <div class="card-header small text-right">
                              Hola! Alguien te ha enviado un mensaje desde el sitio <!-- #{SiteURL} -->
                            </div>
                            <div class="card-header text-left">
                              <div class="row">
                                <div class="col-4 card-text text-right">
                                  <h5 class="font-weight-bold">Asunto:</h5>
                                </div>
                                <div class="col-8 card-text text-left">
                                  <h5><!-- #{Subject} --></h5>
                                </div>
                              </div>
                            </div>
                            <div class="card-header text-left">
                              <div class="row">
                                <div class="col-4 card-text text-right">
                                  <span class="font-weight-bold"><!-- #{FromEmailLabel} --></span>
                                </div>
                                <div class="col-8 card-text text-left">
                                  <span><!-- #{FromEmail} --></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-4 card-text text-right">
                                  <span class="font-weight-bold"><!-- #{FromNameLabel} --></span>
                                </div>
                                <div class="col-8 card-text text-left">
                                  <span><!-- #{FromName} --></span>
                                </div>
                              </div>
                            </div>
                            <div class="card-body text-left">
                              <p class="card-text font-weight-bold"><span><!-- #{MessageLabel} --></span></p>
                              <p class="card-text text-justify"><span><!-- #{MessageDescription} --> </span></p>
                            </div>
                            <div class="card-body text-left">
                              <p class="card-text"><span class="font-weight-bold"><!-- #{VehicleState} --></span> <span><!-- #{VehicleLink} --></span></p>
                            </div>

                            <div class="card-footer">
                              <a href="<!-- #{SiteURL} -->" class="btn btn-primary">Ir a Sonocar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row my-5 justify-content-center">
                        <p class="small">
                          Este mensaje ha sido generado automáticamente a petición de un usuario de la web <!-- #{SiteURL} -->.
                        </p>
                      </div>
                    </div>
                  </body>
                </html>

                TEMP;

        return $template;
    }

    private function getConfig() {
        return [
            'useSmtp' => true,
            'host' => getenv('MAIL_HOST'),
            'port' => getenv('MAIL_PORT'),
            'secure' => getenv('MAIL_ENCRYPTION'),
            'username' => getenv('MAIL_USERNAME'),
            'password' => getenv('MAIL_PASSWORD'),
            'fromName' => getenv('APP_NAME') . ' web user',
            'subjectContact' => 'Mensaje desde Sonocar Web',
            'subjectSubscribe' => 'Suscripción desde Sonocar Web',
            'subjectOrder' => 'Pedido desde Sonocar Web',
            'recipients' => [
                getenv('MAIL_RECIPIENT_NOTIFICATION'),
            ],
        ];
    }

    private function comprobar_email($email) {
        return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }

}
