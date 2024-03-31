<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once 
 "srv/const/CUE.php";
require_once
 "srv/const/ROL_IDS.php";
require_once
 "srv/const/ROL_ADMINISTRADOR.php";
require_once
 "srv/const/ROL_CLIENTE.php";
require_once
 "srv/txt/txtNoPermitidoAdministrador.php";
require_once
 "srv/txt/txtNoPermitidoCliente.php";

use lib\php\Servicio;


class SrvSaludoCliente
extends Servicio
{
 protected
 function implementacion()
 {
  session_start();
  $cue =
   isset($_SESSION[CUE])
   ? $_SESSION[CUE] : "";
  $rolIds =
   isset($_SESSION[ROL_IDS])
   ? $_SESSION[ROL_IDS] : [];
   
  if (array_search(
   ROL_CLIENTE,
   $rolIds
  ) === false) {
   throw new Exception(
    txtNoPermitidoCliente()
   );
  }
   
  return "Hola " . $cue;
 }
}

$servicio = new SrvSaludoCliente();
$servicio->ejecuta();
