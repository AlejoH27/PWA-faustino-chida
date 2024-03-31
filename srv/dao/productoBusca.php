<?php

use srv\dao\AccesoBd;
use srv\modelo\Producto;

function productoBusca(
 int $id
): false|Producto {
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
    PROD_ID AS id,
    PROD_NOMBRE AS nombre,
    PROD_PRECIO AS precio
   FROM PRODUCTO
   WHERE PROD_ID = :id"
 );
 $stmt->execute([":id" => $id]);
 $stmt->setFetchMode(
  PDO::FETCH_CLASS,
  Producto::class
 );
 return $stmt->fetch();
}
