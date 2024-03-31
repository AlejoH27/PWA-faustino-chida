<?php

namespace srv\modelo;

require_once "lib/php/valida.php";
require_once
 "srv/txt/txtNoEsDetalle.php";

use srv\modelo\DetalleCotizacion;

class Respuesta
{

 public int $id;
 public bool $activa;
 /** @var DetalleCotizacion[] */
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
     instanceof DetalleCotizacion,
    txtNoEsDetalle()
   );
   $detalle->valida();
  }
 }
}
