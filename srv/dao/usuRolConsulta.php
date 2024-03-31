<?php

require_once "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;
use srv\modelo\Rol;

/** @return Rol[] */
function usuRolConsulta(int $usuId)
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT
            UR.ROL_ID AS id,
            R.ROL_DESCRIPCION AS descripcion
        FROM USU_ROL UR
        INNER JOIN ROL R ON UR.ROL_ID = R.ROL_ID
        WHERE UR.USU_ID = :usuId
        ORDER BY UR.ROL_ID"
    );
    $stmt->execute([
        ":usuId" => $usuId
    ]);
    $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, Rol::class);
    return recibeFetchAll($resultado);
}
