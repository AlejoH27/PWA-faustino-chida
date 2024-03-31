<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;
use srv\modelo\Producto;

/** @return Producto[] */
function productoConsulta(): array
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    PROD_ID as id,
    PROD_NOMBRE as nombre,
    PROD_PRECIO as precio,
    PROD_EXISTENCIAS as existencias
   FROM PRODUCTO
   ORDER BY PROD_NOMBRE"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_CLASS,
  Producto::class
 );
 return recibeFetchAll($resultado);
}
