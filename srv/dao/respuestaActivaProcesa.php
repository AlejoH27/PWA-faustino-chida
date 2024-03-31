<?php

require_once "srv/dao/" .
 "/respuestaActivaBusca.php";
require_once
 "srv/dao/respuestaAgrega.php";
require_once "srv/txt/"
 . "txtVentaNoEncontrada.php";

use srv\dao\AccesoBd;
use srv\modelo\Respuesta;

function respuestaActivaProcesa()
{
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $modelo = respuestaActivaBusca();
 if ($modelo === false) {
  throw new Exception(
   txtVentaNoEncontrada()
  );
 } else {
  //$modelo->valida();
  $detalles = $modelo->detalles;
  $stmt = $con->prepare(
   "UPDATE PRODUCTO
   SET PROD_EXISTENCIAS =
    :existencias
   WHERE PROD_ID = :prodId"
  );
  /*foreach ($detalles as $dtv) {
   $producto = $dtv->producto;
   $stmt->execute(([
    ":prodId" => $producto->id,
    ":existencias"
    => $producto->existencias
     - $dtv->cantidad
   ]));
  }*/
  $stmt = $con->prepare(
   "UPDATE RESPUESTA
    SET RESP_ACTIVA = 0
    WHERE RESP_ID = :id"
  );
  $stmt->execute([
   ":id" => $modelo->id
  ]);

  $respuesta = new Respuesta();
  $respuesta->activa = true;
  $respuesta->detalles = [];
  respuestaAgrega($respuesta);
  $con->commit();
 }
}
