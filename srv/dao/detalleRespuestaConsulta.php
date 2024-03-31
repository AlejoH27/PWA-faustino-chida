<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;
use srv\modelo\DetalleCotizacion;
use srv\modelo\CosServ;
use srv\modelo\Respuesta;
function detalleRespuestaConsulta(Respuesta $respuesta) {
    if (!isset($respuesta->id)) {
        $valor = "No hay valor id";
        return $valor;
    }

    $con = AccesoBd::getCon();
    $stmt = $con->prepare("
        SELECT
    DR.ID_COS AS id_cos,
    C.COSTO AS costo,
    S.TIPO_SERVICIO AS tipo_servicio,
    DR.DTR_COSTO AS det_costo
FROM DET_RESP DR
JOIN COS_SERV C ON DR.ID_COS = C.ID_COS
JOIN SERV S ON C.SERV_ID_SERV = S.ID_SERVICIO
WHERE DR.RESP_ID = :respId
ORDER BY C.COSTO
    ");

    $stmt->bindParam(':respId', $respuesta->id, PDO::PARAM_INT);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $objs = recibeFetchAll($resultado);

    /** @var DetalleVenta[] */
    $detalles = [];
    foreach ($objs as $obj) {
        $cosserv = new CosServ();
        $cosserv->id_cos = $obj->id_cos;
        $cosserv->costo = $obj->costo;
        $cosserv->tipo_servicio = $obj->tipo_servicio;

        $detalle = new DetalleCotizacion();
        $detalle->respuesta = $respuesta;
        $detalle->cosserv = $cosserv;
        $detalle->det_costo = $obj->det_costo;

      

        $detalles[] = $detalle;
    }

    return $detalles;
}
