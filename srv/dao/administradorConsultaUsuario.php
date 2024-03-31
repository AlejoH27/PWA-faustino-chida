<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;

function administradorConsultaUsuario()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    U.USU_ID AS usuId,
    U.USU_NOMBRE AS usuNombre,
    U.USU_CUE AS usuCue,
    GROUP_CONCAT(R.ROL_ID, ', ')
     AS roles
  FROM USUARIO U
  LEFT JOIN USU_ROL UR
  ON U.USU_ID = UR.USU_ID
  LEFT JOIN ROL R
  ON UR.ROL_ID = R.ROL_ID
  GROUP BY U.USU_CUE
  ORDER BY U.USU_CUE"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_OBJ
 );
 return recibeFetchAll($resultado);
}
