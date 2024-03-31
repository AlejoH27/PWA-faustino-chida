<?php

require_once "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;

/** @return Producto[] */
function usuarioDatos($id_usuario): array
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT
            USU_NOMBRE AS nombre_cliente,
            USU_CUE AS cue_cliente
         FROM USUARIO
         WHERE USU_ID = :id_usuario
            "
    );

    $stmt->execute([
        ":id_usuario" => $id_usuario
    ]);

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    return recibeFetchAll($resultado);
}
