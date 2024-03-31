<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/detalleVentaElimina.php";

use \lib\php\Servicio;

class SrvDetalleVentaElimina
extends Servicio
{

 protected
 function implementacion()
 {
  $prodId = leeEntero("prodId");
  detalleVentaElimina($prodId);
  return [];
 }
}

$servicio =
 new SrvDetalleVentaElimina();
$servicio->ejecuta();
