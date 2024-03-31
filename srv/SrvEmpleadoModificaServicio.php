<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";
require_once
 "srv/dao/empleadoModificaServicio.php";

use \lib\php\Servicio;
use \srv\modelo\Servicio1;

class SrvEmpleadoModificaServicio
extends Servicio
{

 protected
 function implementacion()
 {
  $servicio1 = new Servicio1();
  $servicio1->id_servicio = 
    leeEntero("id_servicio");
  $servicio1->tipo_servicio = 
    leeSinEspaciosInFin("tipo_servicio");
  $servicio1->descripcion_de_servicio = 
    leeSinEspaciosInFin("descripcion_de_servicio");
  $servicio1->costo =
    leeEntero("costo");
  $servicio1->serv_oficios_id_oficios =
    leeSinEspaciosInFin("serv_oficios_id_oficios");

  empleadoModificaServicio($servicio1);
  return $servicio1;
 }
}

$servicio =
 new SrvEmpleadoModificaServicio();
$servicio->ejecuta();
