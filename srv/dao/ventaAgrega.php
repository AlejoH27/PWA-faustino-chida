<?php

use srv\dao\AccesoBd;
use srv\modelo\Venta;

function ventaAgrega(
 Venta $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->exec(
  "INSERT INTO VENTA
    (VENT_ACTIVA)
   VALUES
    (1)"
 );
 /* Si usas una secuencia para
  * generar el id, pasa como
  * parámetro de lastInsertId el
  * nombre de dicha secuencia. */
 $modelo->id =
  $con->lastInsertId();
}
