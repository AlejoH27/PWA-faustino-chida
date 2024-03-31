<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;
use srv\modelo\Oficio;

/** @return Rol[] */
function oficioConsultaServicio($id_usuario)
{
    $con = AccesoBd::getCon();

    $stmt = $con->prepare(
        "SELECT
            o.OFICIO_ID as id_oficio,
            o.TIPO_OFICIO as tipo_oficio,
            o.DESCRIPCION_OFICIO as descripcion_oficio
        FROM OFICIOSv2 o
        INNER JOIN US_OFv2 uo ON o.OFICIO_ID = uo.OFICIOS_ID_OFICIO
        WHERE uo.USER_ID_US = :id_usuario
        ORDER BY o.OFICIO_ID"
    );

    $stmt->execute([
        ":id_usuario" => $id_usuario
    ]);

    $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, Oficio::class);

    return recibeFetchAll($resultado);
}
