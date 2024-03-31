<?php

use srv\dao\AccesoBd;
use srv\modelo\Oficio;

function administradorAgregaOficio(
 Oficio $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $stmt = $con->prepare(
  "INSERT INTO OFICIOSv2
  (TIPO_OFICIO, DESCRIPCION_OFICIO)
  VALUES
  (:tipo_oficio, :descripcion_oficio)"
 );
 $stmt->execute([
  ":tipo_oficio" => $modelo->tipo_oficio,
  ":descripcion_oficio" => $modelo->descripcion_oficio
  , 
 ]);
 /* Si usas una secuencia para
  * generar el id, pasa como
  * parámetro de lastInsertId el
  * nombre de dicha secuencia. */
/* $modelo->id_oficio =
  $con->lastInsertId();
 adminOficioAgregaUsuario($modelo);*/
 $con->commit();
}
