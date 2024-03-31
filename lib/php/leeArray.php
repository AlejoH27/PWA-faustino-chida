<?php

/**
 * Recupera los valores asociados a
 * un parámetro multivaluado, por
 * ejemplo un grupo de checkbox,
 * enviados al servidor por medio
 * de GET, POST o cookie. Si no se
 * recibió el parámetro, devuelve
 * un arreglo vacío. Si el valor
 * recibido no es un arreglo, lo
 * coloca dentro de uno.
 */
function leeArray(
 string $parametro
): array {
 $valor =
  isset($_REQUEST[$parametro])
  ? $_REQUEST[$parametro]
  : [];
 return is_array($valor)
  ? $valor
  : [$valor];
}
