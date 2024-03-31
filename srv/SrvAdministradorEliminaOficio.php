<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/administradorEliminaOficio.php";

use \lib\php\Servicio;

class SrvAdministradorEliminaOficio
extends Servicio
{

 protected
 function implementacion()
 {
  $id = leeEntero("id_oficio");
  administradorEliminaOficio($id);
  return [];
 }
}

$servicio =
 new SrvAdministradorEliminaOficio();
$servicio->ejecuta();
