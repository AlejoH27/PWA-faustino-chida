<?php

use srv\dao\AccesoBd;
use srv\modelo\Producto;

function productoAgrega(
 Producto $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "INSERT INTO PRODUCTO
    (PROD_NOMBRE, PROD_EXISTENCIAS,
     PROD_PRECIO)
   VALUES
    (:nombre, :existencias,
     :precio)"
 );
 $stmt->execute([
  ":nombre" => $modelo->nombre,
  ":existencias"
  => $modelo->existencias,
  ":precio" => $modelo->precio
 ]);
 /* Si usas una secuencia para
  * generar el id, pasa como
  * parámetro de lastInsertId el
  * nombre de dicha secuencia. */
 $modelo->id =
  $con->lastInsertId();
}
