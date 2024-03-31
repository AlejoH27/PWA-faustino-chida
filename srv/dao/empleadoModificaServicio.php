<?php
use srv\dao\AccesoBd;
use srv\modelo\Servicio1;

function empleadoModificaServicio(Servicio1 $modelo)
{
    $modelo->valida();
    $con = AccesoBd::getCon();
    $con->beginTransaction();

    try {
        // Actualizar la información en las tablas SERV y COS_SERV
        $stmt = $con->prepare(
            "UPDATE SERV s
            INNER JOIN COS_SERV cs ON s.ID_SERVICIO = cs.SERV_ID_SERV
            SET
                s.TIPO_SERVICIO = :tipo_servicio,
                s.DESCRIPCION_DE_SERVICIO = :descripcion_de_servicio,
                cs.COSTO = :costo
            WHERE s.ID_SERVICIO = :id_servicio"
        );

        $stmt->execute([
            ":id_servicio" => $modelo->id_servicio,
            ":tipo_servicio" => $modelo->tipo_servicio,
            ":descripcion_de_servicio" => $modelo->descripcion_de_servicio,
            ":costo" => $modelo->costo
        ]);

        // Confirmar la transacción
        $con->commit();

        return true;
    } catch (Exception $e) {
        // Manejar el error (puedes imprimir o registrar el mensaje de error)
        echo "Error: " . $e->getMessage();

        // Revertir la transacción en caso de error
        $con->rollBack();

        return false;
    }
}
