<?php

require_once "srv/dao/usuRolAgrega.php";
require_once "srv/dao/usuRolElimina.php";

use srv\dao\AccesoBd;
use srv\modelo\Oficio;

function administradorModificaOficio(Oficio $modelo)
{
    $modelo->valida();
    $con = AccesoBd::getCon();
    $con->beginTransaction();
    $stmt = $con->prepare(
        "UPDATE OFICIOSv2
        SET TIPO_OFICIO = :tipo_oficio,
            DESCRIPCION_OFICIO = :descripcion_oficio
        WHERE OFICIO_ID = :id_oficio"
    );
    $stmt->execute([
        ":id_oficio" => $modelo->id_oficio,
        ":tipo_oficio" => $modelo->tipo_oficio,
        ":descripcion_oficio" => $modelo->descripcion_oficio
    ]);
    // Elimina las líneas relacionadas con roles
    // usuRolElimina($modelo->id);
    // usuRolAgrega($modelo);
    $con->commit();
}
