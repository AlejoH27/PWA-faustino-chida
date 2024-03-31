<?php

require_once "srv/dao/" .
 "detalleVentaConsulta.php";

use srv\dao\AccesoBd;
use srv\modelo\Venta;

function ventaActivaBusca()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    VENT_ID as id
   FROM VENTA
   WHERE VENT_ACTIVA = 1"
 );
 $stmt->setFetchMode(
  PDO::FETCH_OBJ
 );
 $obj = $stmt->fetch();
 if ($obj === false) {
  return false;
 } else {
  $venta = new Venta();
  $venta->id = $obj->id;
  $venta->activa = true;
  $venta->detalles =
   detalleVentaConsulta($venta);
  return $venta;
 }
}
