<?php

namespace srv\modelo;

require_once "lib/php/valida.php";
require_once
 "srv/txt/txtNoEsDetalle.php";

use srv\modelo\DetalleVenta;

class Venta
{

 public int $id;
 public bool $activa;
 /** @var DetalleVenta[] */
 public array $detalles;

 public function valida()
 {
  $this->validaDetalles();
 }

 function validaDetalles()
 {
  foreach ($this->detalles
   as $detalle) {
   valida(
    $detalle
     instanceof DetalleVenta,
    txtNoEsDetalle()
   );
   $detalle->valida();
  }
 }
}
