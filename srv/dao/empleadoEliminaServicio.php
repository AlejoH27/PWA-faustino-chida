<?php

use srv\dao\AccesoBd;

function empleadoEliminaServicio(int $id_servicio)
{
    $con = AccesoBd::getCon();

    try {
        $con->beginTransaction();

        // Eliminar registros de DET_RESP que dependen del servicio
        $stmtDetResp = $con->prepare("DELETE FROM DET_RESP
                                      USING DET_RESP
                                      INNER JOIN COS_SERV ON DET_RESP.ID_COS = COS_SERV.ID_COS
                                      WHERE COS_SERV.SERV_ID_SERV = :id_servicio");
        $stmtDetResp->execute([":id_servicio" => $id_servicio]);

        // Eliminar registros de COS_SERV que dependen del servicio
        $stmtCosServ = $con->prepare("DELETE FROM COS_SERV WHERE SERV_ID_SERV = :id_servicio");
        $stmtCosServ->execute([":id_servicio" => $id_servicio]);

        // Eliminar registros de USU_SERV que dependen del servicio
        $stmtUsuServ = $con->prepare("DELETE FROM USU_SERV WHERE SERV_ID = :id_servicio");
        $stmtUsuServ->execute([":id_servicio" => $id_servicio]);

        // Finalmente, eliminar el servicio en la tabla SERV
        $stmtServ = $con->prepare("DELETE FROM SERV WHERE ID_SERVICIO = :id_servicio");
        $stmtServ->execute([":id_servicio" => $id_servicio]);

        $con->commit();
    } catch (Exception $e) {
        // Manejar cualquier excepción que pueda ocurrir durante la transacción
        $con->rollBack();
        throw $e;
    }
}

