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
      .text-small{
        font-size: 0.85rem;
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
      <div class="row mt-5">
        <div class="col-2">
        </div>
        <div class="col-4">
          <a href="http://sonocar.albertito.xyz/"><img class="img-fluid" src="http://sonocar.albertito.xyz/images/logo.png"></a>
        </div>
        <div class="col-4">
          <h1 class="text-uppercase text-right">Notificación</h1>
        </div>
        <div class="col-2">
        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <div class="col-8">
          <div class="card text-center">
            <div class="card-header text-small text-right">
              Hola! Alguien te ha enviado un mensaje desde el sitio <!-- #{SiteName} -->
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
              
            <div class="card-footer text-muted">
              <a href="http://sonocar.albertito.xyz/" class="btn btn-primary">Ir a Sonocar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <p>
          Este mensaje ha sido generado automáticamente a petición de un usuario de la web <!-- #{SiteName} -->.
        </p>
      </div>
    </div>
  </body>
</html>