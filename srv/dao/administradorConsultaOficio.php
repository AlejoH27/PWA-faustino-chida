<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;

function administradorConsultaOficio()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    OFICIO_ID AS ofiId,
    TIPO_OFICIO AS ofiNombre,
    DESCRIPCION_OFICIO AS ofiDescripcion
  FROM OFICIOSv2
  GROUP BY TIPO_OFICIO
  ORDER BY TIPO_OFICIO"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_OBJ
 );
 return recibeFetchAll($resultado);
}
