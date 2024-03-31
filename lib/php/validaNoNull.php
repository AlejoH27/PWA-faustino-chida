<?php

require_once "lib/php/valida.php";

function validaNoNull(
 $valor,
 string $mensajeDeError
) {
 valida(
  $valor !== null,
  $mensajeDeError
 );
}
