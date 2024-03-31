<?php

require_once
 "srv/dao/usuRolConsulta.php";

use srv\dao\AccesoBd;
use srv\modelo\Oficio;

function administradorBuscaOficio(int $idOfi)
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT
        OFICIO_ID AS id_oficio,
        TIPO_OFICIO AS tipo_oficio,
        DESCRIPCION_OFICIO AS descripcion_oficio 
        FROM OFICIOSv2
        WHERE OFICIO_ID = :idOfi"
    );
    $stmt->execute([
        ":idOfi" => $idOfi
    ]);
    $stmt->setFetchMode(
        PDO::FETCH_CLASS,
        Oficio::class
    );
    /** @var false|Usuario */
    $oficio = $stmt->fetch();
    if ($oficio === false) {
        return false;
    } else {
        // Comenté la línea siguiente para quitar el manejo de roles
        // $usuario->roles = usuRolConsulta($idOfi);
        return $oficio;
    }
}
