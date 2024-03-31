<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeDecimal.php";
require_once
 "lib/php/leeEntero.php";
require_once "srv/dao/" .
 "detalleVentaModifica.php";

use \lib\php\Servicio;
use srv\modelo\Producto;
use srv\modelo\DetalleVenta;

class SrvDetalleVentaModifica
extends Servicio
{

 protected
 function implementacion()
 {
  $producto = new Producto();
  $producto->id =
   leeEntero("prodId");
  $modelo = new DetalleVenta();
  $modelo->producto = $producto;
  $modelo->cantidad =
   leeDecimal("cantidad");
  detalleVentaModifica($modelo);
  $modelo->venta->detalles = [];
  return $modelo;
 }
}

$servicio =
 new SrvDetalleVentaModifica();
$servicio->ejecuta();
