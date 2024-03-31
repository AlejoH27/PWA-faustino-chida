<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;
use srv\modelo\DetalleVenta;
use srv\modelo\Producto;
use srv\modelo\Venta;
function detalleVentaConsulta(Venta $venta) {
    if (!isset($venta->id)) {
        $valor = "No hay valor id";
        return $valor;
    }

    $con = AccesoBd::getCon();
    $stmt = $con->prepare("
        SELECT
            DV.PROD_ID AS prodId,
            P.PROD_NOMBRE AS prodNombre,
            P.PROD_EXISTENCIAS AS prodExistencias,
            P.PROD_PRECIO AS prodPrecio,
            DV.DTV_CANTIDAD AS cantidad,
            DV.DTV_PRECIO AS precio
        FROM DET_VENTA DV
        JOIN PRODUCTO P ON DV.PROD_ID = P.PROD_ID
        WHERE DV.VENT_ID = :ventId
        ORDER BY P.PROD_NOMBRE
    ");

    $stmt->bindParam(':ventId', $venta->id, PDO::PARAM_INT);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $objs = recibeFetchAll($resultado);

    /** @var DetalleVenta[] */
    $detalles = [];
    foreach ($objs as $obj) {
        $producto = new Producto();
        $producto->id = $obj->prodId;
        $producto->nombre = $obj->prodNombre;
        $producto->existencias = $obj->prodExistencias;
        $producto->precio = $obj->prodPrecio;

        $detalle = new DetalleVenta();
        $detalle->venta = $venta;
        $detalle->producto = $producto;
        $detalle->cantidad = $obj->cantidad;
        $detalle->precio = $obj->precio;

        $detalles[] = $detalle;
    }

    return $detalles;
}
