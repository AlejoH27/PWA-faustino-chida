<?php

namespace srv\modelo;

require_once "lib/php/valida.php";
require_once "srv/txt/" .
 "txtCantidadIncorrecta.php";
require_once
 "srv/txt/txtPrecioIncorrecto.php";

class DetalleVenta
{
 public Venta $venta;
 public Producto $producto;
 public float $cantidad;
 public float $precio;

 public function valida()
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
 }
}
