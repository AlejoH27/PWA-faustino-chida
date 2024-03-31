<?php

require_once "srv/dao/usuRolAgrega.php";
require_once "srv/dao/usuOficioAgrega.php";
//require_once "srv/dao/archivoAgrega.php";

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuarioAgregaCliente(Usuario $modelo) {
    $modelo->valida();
    $con = AccesoBd::getCon();
    $con->beginTransaction();

        // Verificar si ya existe un usuario con el mismo USU_CUE
        $stmtVerificacion = $con->prepare("SELECT COUNT(*) FROM USUARIO WHERE USU_CUE = :cue");
        $stmtVerificacion->execute([":cue" => $modelo->cue]);
        $count = $stmtVerificacion->fetchColumn();

        if ($count > 0) {
            // Ya existe un usuario con este USU_CUE
            throw new Exception("Ya existe un usuario con este número de cuenta ($modelo->cue).");
        }

        // Si no existe, proceder con la inserción
        $stmtInsercion = $con->prepare(
            "INSERT INTO USUARIO
            (USU_CUE, USU_MATCH, USU_NOMBRE, USU_APELLIDOP, USU_APELLIDOM, USU_FECHA_NAC)
            VALUES
            (:cue, :match, :nombre, :apellidoP, :apellidoM, :fecha_nac)"
        );

        $stmtInsercion->execute([
            ":nombre" => $modelo->nombre,
            ":apellidoP" => $modelo->apellidoP,
            ":apellidoM" => $modelo->apellidoM,
            ":cue" => $modelo->cue,
            ":match" => password_hash($modelo->match, PASSWORD_DEFAULT),
            ":fecha_nac" => $modelo->fecha_nac
        ]);

        // Verificar si se insertó correctamente
        if ($stmtInsercion->rowCount() > 0) {
            $modelo->id = $con->lastInsertId();
            usuRolAgrega($modelo);
            //usuOficioAgrega($modelo);
            $con->commit();
        } else {
            // No se insertó ninguna fila, algo salió mal
            throw new Exception("Error al insertar el usuario.");
        }
    
}
