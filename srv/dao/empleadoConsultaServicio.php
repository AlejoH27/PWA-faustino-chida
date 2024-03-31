<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;

function empleadoConsultaServicio()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    s.ID_SERVICIO AS servId,
    s.TIPO_SERVICIO AS servNombre,
    s.DESCRIPCION_DE_SERVICIO AS servDescripcion,
    o.TIPO_OFICIO AS servOficios
    FROM SERV s
    INNER JOIN OFICIOSv2 o ON s.SERV_OFICIOS_ID_OFICIOS = o.OFICIO_ID
    GROUP BY TIPO_SERVICIO
    ORDER BY TIPO_SERVICIO"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_OBJ
 );
 return recibeFetchAll($resultado);
}
