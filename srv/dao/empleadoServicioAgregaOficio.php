<?php

use srv\dao\AccesoBd;
use srv\modelo\Servicio1;

function empleadoServicioAgregaOficio(
 Servicio1 $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $stmt = $con->prepare(
  "INSERT INTO SERV
  (SERV_OFICIOS_ID_OFICIOS)
  VALUES
  (:serv_oficios_id_oficios)"
 );
 $stmt->execute([
  ":serv_oficios_id_oficios" => $modelo->serv_oficios_id_oficios
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
