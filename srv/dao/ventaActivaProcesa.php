<?php

require_once "srv/dao/" .
 "/ventaActivaBusca.php";
require_once
 "srv/dao/ventaAgrega.php";
require_once "srv/txt/"
 . "txtVentaNoEncontrada.php";

use srv\dao\AccesoBd;
use srv\modelo\Venta;

function ventaActivaProcesa()
{
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $modelo = ventaActivaBusca();
 if ($modelo === false) {
  throw new Exception(
   txtVentaNoEncontrada()
  );
 } else {
  $modelo->valida();
  $detalles = $modelo->detalles;
  $stmt = $con->prepare(
   "UPDATE PRODUCTO
   SET PROD_EXISTENCIAS =
    :existencias
   WHERE PROD_ID = :prodId"
  );
  foreach ($detalles as $dtv) {
   $producto = $dtv->producto;
   $stmt->execute(([
    ":prodId" => $producto->id,
    ":existencias"
    => $producto->existencias
     - $dtv->cantidad
   ]));
  }
  $stmt = $con->prepare(
   "UPDATE VENTA
    SET VENT_ACTIVA = 0
    WHERE VENT_ID = :id"
  );
  $stmt->execute([
   ":id" => $modelo->id
  ]);

  $venta = new Venta();
  $venta->activa = true;
  $venta->detalles = [];
  ventaAgrega($venta);
  $con->commit();
 }
}
