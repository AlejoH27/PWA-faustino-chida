<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "lib/php/leeDecimal.php";
require_once
 "srv/dao/detalleVentaAgrega.php";

use \lib\php\Servicio;
use srv\modelo\Producto;
use srv\modelo\DetalleVenta;

class SrvDetalleVentaAgrega
extends Servicio
{

 protected
 function implementacion()
 {
  $producto = new Producto();
   
  $producto->id = leeEntero("id");
  $modelo = new DetalleVenta();
  $modelo->producto = $producto;
  $modelo->cantidad =
   leeDecimal("cantidad");
  $modelo->producto = $producto;
  detalleVentaAgrega($modelo);
  $modelo->venta->detalles = [];
  return $modelo;
 }
}

$servicio =
 new SrvDetalleVentaAgrega();
$servicio->ejecuta();
