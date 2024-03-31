<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/usuarioElimina.php";

use \lib\php\Servicio;

class SrvUsuarioElimina
extends Servicio
{

 protected
 function implementacion()
 {
  $id = leeEntero("id");
  usuarioElimina($id);
  return [];
 }
}

$servicio =
 new SrvUsuarioElimina();
$servicio->ejecuta();
