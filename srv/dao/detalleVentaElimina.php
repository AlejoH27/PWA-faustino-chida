<?php

require_once
 "srv/dao/ventaActivaBusca.php";

use srv\dao\AccesoBd;

function detalleVentaElimina(
 int $prodId
) {
 $venta = ventaActivaBusca();
 if ($venta !== false) {
  $con = AccesoBd::getCon();
  $stmt = $con->prepare(
   "DELETE FROM DET_VENTA
    WHERE VENT_ID = :ventId
     AND PROD_ID = :prodId"
  );
  $stmt->execute([
   ":ventId" => $venta->id,
   ":prodId" => $prodId,
  ]);
 }
}
