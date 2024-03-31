<?php

require_once "lib/php/" .
 "leeSinEspaciosInFin.php";

/**
 * Recupera el valor entero de un
 * parámetro enviado al servidor
 * por medio de GET, POST o
 * cookie.
 */
function leeEntero(
 string $parametro
): int {
 return leeSinEspaciosInFin(
  $parametro
 );
}
