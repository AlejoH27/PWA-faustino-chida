<?php

use srv\dao\AccesoBd;
use srv\modelo\Archivo;

function archivoAgrega(
 Archivo $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "INSERT INTO ARCHIVO
    (ARCH_BYTES)
   VALUES
    (:foto)"
 );
 $stmt->execute([
  ":foto" => $modelo->foto
 ]);
 /* Si usas una secuencia para
  * generar el id, pasa como
  * parámetro de lastInsertId el
  * nombre de dicha secuencia. */
 $modelo->id =
  $con->lastInsertId();
}
