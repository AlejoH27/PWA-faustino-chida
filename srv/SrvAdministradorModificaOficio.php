<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";
require_once
 "srv/dao/administradorModificaOficio.php";

use \lib\php\Servicio;
use \srv\modelo\Oficio;

class SrvAdministradorModificaOficio
extends Servicio
{

 protected
 function implementacion()
 {
  $oficio = new Oficio();
  $oficio->id_oficio = 
    leeEntero("id_oficio");
  $oficio->tipo_oficio = 
    leeSinEspaciosInFin("tipo_oficio");
  $oficio->descripcion_oficio = 
    leeSinEspaciosInFin("descripcion_oficio");

  administradorModificaOficio($oficio);
  return $oficio;
 }
}

$servicio =
 new SrvAdministradorModificaOficio();
$servicio->ejecuta();
