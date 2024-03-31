<?php

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuVerificaOficio($id_usu) {
    $con = AccesoBd::getCon();
    $con->beginTransaction();
    $stmt = $con->prepare(
        "SELECT ID_AB FROM US_OFv2 WHERE USER_ID_US = :id_usu"
    );
    $stmt->execute([
        ":id_usu" => $id_usu
    ]);

    // Obtén el resultado de la consulta
    $id_us_of = $stmt->fetchColumn();

    // Imprime en la consola
    error_log("Resultado de la consulta: " . $id_us_of);

    $con->commit();

    return $id_us_of;
}

