<?php

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuVerifica($iden) {
    $con = AccesoBd::getCon();
    $con->beginTransaction();
    $stmt = $con->prepare(
        "SELECT USU_ID FROM USUARIO WHERE USU_CUE = :iden"
    );
    $stmt->execute([
        ":iden" => $iden
    ]);

    // Obtén el resultado de la consulta
    $id_usu = $stmt->fetchColumn();

    // Imprime en la consola
    error_log("Resultado de la consulta: " . $id_usu);

    //usuarioVerficicaOficio($id_usu);

    $con->commit();

    return $id_usu;
}

