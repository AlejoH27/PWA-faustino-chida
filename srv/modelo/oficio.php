<?php

namespace srv\modelo;

require_once 
  "lib/php/valida.php";
require_once
 "lib/php/validaIdNoVacio.php";
require_once
 "lib/php/validaTextoNoVacio.php";
require_once
 "srv/txt/txtFaltaElOficio.php";
require_once "srv/txt/"
 . "txtFaltaLaDescripcion.php";

class Oficio
{

 public int $id_oficio;
 public string $tipo_oficio;
 public string $descripcion_oficio;

 function valida()
 {
  $this->validaOficioNoVacio();
 }

 function validaOficioNoVacio()
 {
  validaTextoNoVacio(
   $this->tipo_oficio,
   txtFaltaElOficio()
  );
 }

}