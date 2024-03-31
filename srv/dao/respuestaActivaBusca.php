<?php

require_once "srv/dao/" .
 "detalleRespuestaConsulta.php";

use srv\dao\AccesoBd;
use srv\modelo\Respuesta;

function respuestaActivaBusca()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    RESP_ID as id
   FROM RESPUESTA
   WHERE RESP_ACTIVA = 1"
 );
 $stmt->setFetchMode(
  PDO::FETCH_OBJ
 );
 $obj = $stmt->fetch();
 if ($obj === false) {
  return false;
 } else {
  $respuesta = new Respuesta();
  $respuesta->id = $obj->id;
  $respuesta->activa = true;
  $respuesta->detalles =
   detalleRespuestaConsulta($respuesta);
  return $respuesta;
 }
}
