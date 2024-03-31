<?php

require_once "srv/txt/" .
 "txtVentaNoEncontrada.php";
require_once "srv/txt/" .
 "txtProductoNoEncontrado.php";
require_once
 "srv/dao/ventaActivaBusca.php";
require_once
 "srv/dao/productoBusca.php";

use srv\dao\AccesoBd;
use srv\modelo\DetalleVenta;

function detalleVentaModifica(
 DetalleVenta $modelo
) {
 $con = AccesoBd::getCon();
 $producto = productoBusca(
  $modelo->producto->id
 );
 if ($producto === false)
  throw new Exception(
   txtProductoNoEncontrado()
  );
 $venta = ventaActivaBusca();
 if ($venta === false)
  throw new Exception(
   txtVentaNoEncontrada()
  );
 $modelo->venta = $venta;
 $modelo->producto = $producto;
 $modelo->precio =
  $producto->precio;
 $modelo->valida();
 $stmt = $con->prepare(
  "UPDATE DET_VENTA
   SET
    DTV_CANTIDAD = :cantidad,
    DTV_PRECIO = :precio
   WHERE 
    VENT_ID = :ventId
    AND PROD_ID = :prodId"
 );
 $stmt->execute(
  [
   ":ventId" => $venta->id,
   ":prodId" => $producto->id,
   ":cantidad"
   => $modelo->cantidad,
   ":precio" => $modelo->precio
  ]
 );
}
