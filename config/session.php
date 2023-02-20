<?php
//Establecemos el nombre de la session
$nameSession = 'SessionLous';
//Establecer el tiempo de espera de la sesión en 5 minutos
$timeout = (60) * 30 ;
//Establecer el maxlifetime de la sesión
ini_set ( "session.gc_maxlifetime" , $timeout ) ;

//Iniciar una nueva sesión
session_start() ;

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + $timeout;

//Establecer el nombre de sesión predeterminado
//$s_name = session_name ($nameSession) ;

if (!isset($_SESSION['seleccion'])) {
  $_SESSION['seleccion'] = array();
}
