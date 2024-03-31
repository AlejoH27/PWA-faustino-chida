<?php

require_once
 "srv/dao/ventaActivaBusca.php";
require_once
 "srv/dao/productoBusca.php";

use srv\dao\AccesoBd;
use srv\modelo\DetalleVenta;

function detalleVentaBusca(
 int $prodId
) {
 $venta = ventaActivaBusca();
 if ($venta === false) {
  return false;
 }
 $producto =
  productoBusca($prodId);
 if ($producto === false) {
  return false;
 }
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
    DV.PROD_ID AS prodId,
    P.PROD_NOMBRE AS prodNombre,
    DV.DTV_CANTIDAD AS cantidad,
    DV.DTV_PRECIO AS precio
   FROM DET_VENTA DV, PRODUCTO P
   WHERE
    DV.PROD_ID = P.PROD_ID
    AND DV.VENT_ID = :ventId
    AND DV.PROD_ID = :prodId"
 );
 $stmt->execute([
  ":ventId" => $venta->id,
  ":prodId" => $prodId
 ]);
 $stmt->setFetchMode(
  PDO::FETCH_OBJ
 );
 $obj = $stmt->fetch();
 if ($obj === false) {
  return false;
 } else {
  $dtv = new DetalleVenta();
  $dtv->venta = $venta;
  $dtv->producto = $producto;
  $dtv->cantidad = $obj->cantidad;
  $dtv->precio = $obj->precio;
  return $dtv;
 }
}
