<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "srv/dao/respuestaActivaProcesa.php";

use \lib\php\Servicio;

class SrvRespuestaActivaProcesa
extends Servicio
{
 protected
 function implementacion()
 {
  respuestaActivaProcesa();
  return [];
 }
}

$servicio =
 new SrvRespuestaActivaProcesa();
$servicio->ejecuta();
