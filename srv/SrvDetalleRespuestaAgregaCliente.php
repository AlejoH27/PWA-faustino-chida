<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";
require_once
 "lib/php/leeDecimal.php";
require_once
 "srv/dao/detalleRespuestaAgregaCliente.php";

use \lib\php\Servicio;
use srv\modelo\CosServ;
use srv\modelo\DetalleCotizacion;

class SrvDetalleRespuestaAgregaCliente
extends Servicio
{

 protected
 function implementacion()
 {
  $cosserv = new CosServ();

   
   
  $cosserv->id_cos = intval(leeSinEspaciosInFin("id_cos"));

   
  $modelo = new DetalleCotizacion();
  $modelo->cosserv = $cosserv;
  $modelo->det_costo =
   leeEntero("costo");
  detalleRespuestaAgregaCliente($modelo);
  $modelo->respuesta->detalles = [];
  return $modelo;
 }
}

$servicio =
 new SrvDetalleRespuestaAgregaCliente();
$servicio->ejecuta();
