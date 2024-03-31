<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once "srv/txt/" .
 "txtDetalleVentaNoEncontrado.php";
require_once
 "srv/dao/detalleVentaBusca.php";

use \lib\php\Servicio;

class SrvDetalleVentaBusca
extends Servicio
{

 protected
 function implementacion()
 {
  $prodId = leeEntero("prodId");
  $modelo =
   detalleVentaBusca($prodId);
  if ($modelo === false) {
   throw new Exception(
    txtDetalleVentaNoEncontrado()
   );
  } else {
   $modelo->venta->detalles = [];
   return $modelo;
  }
 }
}

$servicio =
 new SrvDetalleVentaBusca();
$servicio->ejecuta();
