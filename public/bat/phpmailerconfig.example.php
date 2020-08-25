<?php
$phpmailerconfig        = array(
    'useSmtp'           => true,
    'host'              => 'smtp.domain.ext',
    'port'              => 587,
    'secure'            => 'tls',
    'username'          => 'user@domain.ext',
    'password'          => 'PassWord1234',
    'fromName'          => 'APP NAME web user',
    'subjectContact'    => 'Mensaje desde APP NAME Web',
    'subjectSubscribe'  => 'Suscripción desde APP NAME Web',
    'subjectOrder'      => 'Pedido desde APP NAME Web',
);

$mailrecipients = array (
    'receiver@domain.ext'
);

