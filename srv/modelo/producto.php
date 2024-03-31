<?php

namespace srv\modelo;

require_once "lib/php/valida.php";
require_once
 "lib/php/validaNombreNoVacio.php";
require_once "srv/txt/"
 . "txtExistenciasIncorrectas.php";
require_once
 "srv/txt/txtPrecioIncorrecto.php";

class Producto
{

 public int $id;
 public string $nombre;
 public float $existencias;
 public float $precio;

 public function valida()
 {
  validaNombreNoVacio(
   $this->nombre
  );
  $this->validaExistencias();
  $this->validaPrecio();
 }

 function validaExistencias()
 {
  valida(
   !is_nan($this->existencias),
   txtExistenciasIncorrectas()
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
