<?php

require_once "srv/dao/usuAgregaServicio.php";
require_once "srv/dao/empleadoAgregaCosto.php";
require_once "srv/dao/usuVerifica.php";

require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/usuVerificaOficio.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";

use srv\dao\AccesoBd;
use srv\modelo\Servicio1;
use \srv\modelo\CosServ;

function empleadoAgregaServicio(
 Servicio1 $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
  $stmt = $con->prepare(
      "INSERT INTO SERV
      (TIPO_SERVICIO, DESCRIPCION_DE_SERVICIO, SERV_OFICIOS_ID_OFICIOS)
      VALUES
      (:tipo_servicio, :descripcion_de_servicio, :serv_oficios_id_oficios)"
  );
  $stmt->execute([
      ":tipo_servicio" => $modelo->tipo_servicio,
      ":descripcion_de_servicio" => $modelo->descripcion_de_servicio,
      ":serv_oficios_id_oficios" => $modelo->serv_oficios_id_oficios
  ]);

 /* Si usas una secuencia para
  * generar el id, pasa como
  * parámetro de lastInsertId el
  * nombre de dicha secuencia. */
$modelo->id_servicio =
  $con->lastInsertId();
  //empleadoServicioAgregaOficio($modelo);
  $id_servicio = $modelo->id_servicio;
  $id_usuario = $modelo->iden;

  $costo = $modelo->costo;
  $serv_oficios_id_oficios = $modelo->serv_oficios_id_oficios;

  /*echo "valor id sservicio: " . $id_servicio;
  echo "valor id sservicio: " . $id_usuario;
  echo "valor id sservicio: " . $costo;
  echo "valor id sservicio: " . $serv_oficios_id_oficios;*/

  usuAgregaServicio($id_usuario, $id_servicio);
  
 $con->commit();

  $verif = usuVerificaOficio($id_usuario);

  /*$cos_serv = new CosServ();
  $cos_serv->costo = intval(leeSinEspaciosInFin($costo));
  $cos_serv->serv_id_serv = intval(leeSinEspaciosInFin($id_servicio));
  $cos_serv->serv_cos_oficios_id_oficio = intval(leeSinEspaciosInFin($serv_oficios_id_oficios));
  $cos_serv->us_of_id_ab = intval(leeSinEspaciosInFin($verif));*/

  empleadoAgregaCosto($costo, $id_servicio, $serv_oficios_id_oficios, $verif);
}
