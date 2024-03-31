<?php

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuAgregaServicio($iden, $idServ) {
    $usuario = new Usuario(); 

    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "INSERT INTO USU_SERV
        (USU_ID, SERV_ID, SERV_FECHA_ALTA)
        VALUES
        (:iden, :idServ, :fecha_alta)"
    );

    $stmt->execute([
        ":iden" => $iden,
        ":idServ" => $idServ,
        ":fecha_alta" => date("Y-m-d H:i:s")
    ]);
}


