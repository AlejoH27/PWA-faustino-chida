<?php

namespace srv\modelo;

require_once "lib/php/valida.php";
require_once "srv/txt/" .
 "txtCantidadIncorrecta.php";
require_once
 "srv/txt/txtPrecioIncorrecto.php";

class DetalleCotizacion
{
 public Respuesta $respuesta;
 public CosServ $cosserv;
 //public float $cantidad;
 public float $det_costo;

 /*public function valida()
 {
  $this->validaCantidad();
  $this->validaPrecio();
 }

 function validaCantidad()
 {
  valida(
   !is_nan($this->cantidad),
   txtCantidadIncorrecta()
  );
 }

 function validaPrecio()
 {
  valida(
   !is_nan($this->precio),
   txtPrecioIncorrecto()
  );
 }*/
}
