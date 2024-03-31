<?php

require_once "lib/php/recibeFetchAll.php";
use srv\dao\AccesoBd;

function clienteConsultaServicioEmpleado($id, $id_servicio)
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT
            u.USU_ID AS userId,
            u.USU_NOMBRE AS userName,
            u.USU_APELLIDOP AS userPaterno,
            u.USU_APELLIDOM AS userMaterno,
            u.USU_CUE AS userCue,
            s.ID_SERVICIO AS servId,
            s.TIPO_SERVICIO AS servNombre,
            s.DESCRIPCION_DE_SERVICIO AS servDescripcion,
            o.TIPO_OFICIO AS servOficios
        FROM USUARIO u
        INNER JOIN USU_SERV us ON u.USU_ID = us.USU_ID
        INNER JOIN SERV s ON us.SERV_ID = s.ID_SERVICIO
        INNER JOIN OFICIOSv2 o ON s.SERV_OFICIOS_ID_OFICIOS = o.OFICIO_ID
        WHERE u.USU_ID = :userId
        AND s.ID_SERVICIO = :servId
        GROUP BY u.USU_ID, s.ID_SERVICIO
        ORDER BY u.USU_ID, s.ID_SERVICIO"
    );

    $stmt->execute([
        ":userId" => $id,
        ":servId" => $id_servicio
    
    ]);

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    return recibeFetchAll($resultado);
}
