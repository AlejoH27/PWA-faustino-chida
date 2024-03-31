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

function detalleVentaAgrega(
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
 $modelo->precio =
  $producto->precio;
 $modelo->producto = $producto;
 $modelo->valida();
 $stmt = $con->prepare(
  "INSERT INTO DET_VENTA
     (VENT_ID, PROD_ID,
      DTV_CANTIDAD, DTV_PRECIO)
    VALUES
     (:ventId, :prodId,
      :cantidad, :precio)"
 );
 $stmt->execute(
  [
   ":ventId" => $venta->id,
   ":prodId" => $producto->id,
   ":cantidad"
   => $modelo->cantidad,
   ":precio" => $producto->precio
  ]
 );
}
