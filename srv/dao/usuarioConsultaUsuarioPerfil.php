<?php

require_once "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;

function usuarioConsultaUsuarioPerfil()
{
    $con = AccesoBd::getCon();
    $stmt = $con->query(
        "SELECT
            U.USU_ID AS usuId,
            U.USU_NOMBRE AS usuNombre,
            U.USU_APELLIDOP AS usuApellidoP,
            U.USU_APELLIDOM AS usuApellidoM,
            U.USU_CUE AS usuCue,
            U.USU_FECHA_NAC AS usuFecha_Nac,
            U.USU_LUGAR_NAC AS usuLugar_Nac,
            U.USU_CURP AS usuCurp,
            U.USU_TELEFONO AS usuTelefono,
            U.USU_UBICACION AS usuUbicacion,
            U.USU_DIRECCION AS usuDireccion,
            GROUP_CONCAT(R.ROL_ID, ', ') AS roles,
            GROUP_CONCAT(O.TIPO_OFICIO, ', ') AS oficios
        FROM USUARIO U
        LEFT JOIN USU_ROL UR ON U.USU_ID = UR.USU_ID
        LEFT JOIN ROL R ON UR.ROL_ID = R.ROL_ID
        LEFT JOIN US_OFv2 UO ON U.USU_ID = UO.USER_ID_US
        LEFT JOIN OFICIOSv2 O ON UO.OFICIOS_ID_OFICIO = O.OFICIO_ID
        GROUP BY U.USU_CUE
        ORDER BY U.USU_CUE"
    );
    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    return recibeFetchAll($resultado);
}
