<?php

namespace srv\modelo;

require_once
 "lib/php/validaTextoNoVacio.php";
require_once
 "srv/txt/txtFaltanBytes.php";

class Archivo
{

 public int $id;
 public string $foto;

 public function valida()
 {
  $this->validaBytesNoVacio();
 }

 function validaBytesNoVacio()
 {
  validaTextoNoVacio(
   $this->foto,
   txtFaltanBytes()
  );
 }
}
