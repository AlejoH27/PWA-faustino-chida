<?php

require_once
 "lib/php/recibeFetchAll.php";

use srv\dao\AccesoBd;
use srv\modelo\Oficio;

/** @return Rol[] */
function oficioConsulta()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    OFICIO_ID as id_oficio,
    TIPO_OFICIO as tipo_oficio,
    DESCRIPCION_OFICIO as descripcion_oficio
   FROM OFICIOSv2
   ORDER BY OFICIO_ID"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_CLASS,
  Oficio::class
 );
 return recibeFetchAll($resultado);
}
