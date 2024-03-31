<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/clienteBuscaCotizacion.php";
require_once "srv/txt/" .
 "txtProductoNoEncontrado.php";

use \lib\php\Servicio;

class SrvClienteBuscaCotizacion
extends Servicio
{

 protected
 function implementacion()
 {
  $id = leeEntero("id");
  $modelo = clienteBuscaCotizacion($id);
  if ($modelo === false) {
   throw new Exception(
    txtProductoNoEncontrado()
   );
  } else {
   return $modelo;
  }
 }
}

$servicio = new SrvClienteBuscaCotizacion();
$servicio->ejecuta();
