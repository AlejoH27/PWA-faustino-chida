<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "srv/dao/ventaActivaProcesa.php";

use \lib\php\Servicio;

class SrvVentaActivaProcesa
extends Servicio
{
 protected
 function implementacion()
 {
  ventaActivaProcesa();
  return [];
 }
}

$servicio =
 new SrvVentaActivaProcesa();
$servicio->ejecuta();
