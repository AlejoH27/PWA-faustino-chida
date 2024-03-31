<?php

require_once
 "lib/php/validaTextoNoVacio.php";
require_once "lib/php/txt/"
 . "txtFaltaElNombre.php";

function validaNombreNoVacio(
 string $nombre
) {
 validaTextoNoVacio(
  $nombre,
  txtFaltaElNombre()
 );
}
