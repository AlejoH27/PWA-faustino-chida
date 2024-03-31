<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/empleadoEliminaServicio.php";

use \lib\php\Servicio;

class SrvEmpleadoEliminaServicio
extends Servicio
{

 protected
 function implementacion()
 {
  $id = leeEntero("id_servicio");
  empleadoEliminaServicio($id);
  return [];
 }
}

$servicio =
 new SrvEmpleadoEliminaServicio();
$servicio->ejecuta();
