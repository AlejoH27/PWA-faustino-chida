<?php

require_once "srv/txt/" .
 "txtVentaNoEncontrada.php";
require_once "srv/txt/" .
 "txtProductoNoEncontrado.php";
require_once
 "srv/dao/respuestaActivaBusca.php";
/*require_once
 "srv/dao/productoBusca.php";*/
require_once
 "srv/dao/clienteBuscaCotizacion.php";

use srv\dao\AccesoBd;
use srv\modelo\DetalleCotizacion;

function detalleRespuestaAgregaCliente(
 DetalleCotizacion $modelo
) {


 $con = AccesoBd::getCon();
 $cosserv = clienteBuscaCotizacion(
  $modelo->cosserv->id_cos
 );
 if ($cosserv === false)
  throw new Exception(
   txtProductoNoEncontrado()
  );
 $respuesta = respuestaActivaBusca();
 if ($respuesta === false)
  throw new Exception(
   txtVentaNoEncontrada()
  );
 $modelo->respuesta = $respuesta;
 /*$modelo->precio =
  $producto->precio;*/
 $modelo->cosserv = $cosserv;
  $modelo->det_costo = $cosserv->costo;
  //$producto->precio;
 //$modelo->valida();
 $stmt = $con->prepare(
  "INSERT INTO DET_RESP
     (RESP_ID, ID_COS, DTR_COSTO)
    VALUES
     (:respId, :cossId, :detCosto)"
 );
 $stmt->execute(
  [
   ":respId" => $respuesta->id,
   ":cossId" => $cosserv->id_cos,
   ":detCosto" => $modelo->det_costo
  ]
 );
}
