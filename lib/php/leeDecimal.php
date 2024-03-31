<?php

require_once "lib/php/" .
 "leeSinEspaciosInFin.php";

/**
 * Recupera el valor decimal de un
 * parámetro (que puede tener
 * fracciones) enviado al servidor
 * por medio de GET, POST o
 * cookie.
 */
function leeDecimal(
 string $parametro
): float {
 return leeSinEspaciosInFin(
  $parametro
 );
}
