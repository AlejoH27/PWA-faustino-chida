<?php

use srv\dao\AccesoBd;
use srv\modelo\Archivo;

function archivoModifica(
 Archivo $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "UPDATE ARCHIVO
    SET ARCH_BYTES = :bytes
   WHERE ARCH_ID = :id"
 );
 $stmt->execute([
  ":bytes" => $modelo->bytes,
  ":id" => $modelo->id
 ]);
}
