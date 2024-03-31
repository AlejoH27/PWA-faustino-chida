<?php

use srv\dao\AccesoBd;
use srv\modelo\Archivo;

function archivoBusca(
 int $id
): false|Archivo {
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
    ARCH_ID AS id,
    ARCH_BYTES AS bytes
   FROM ARCHIVO
   WHERE ARCH_ID = :id"
 );
 $stmt->execute([
  ":id" => $id
 ]);
 $stmt->setFetchMode(
  PDO::FETCH_CLASS,
  Archivo::class
 );
 return $stmt->fetch();
}
