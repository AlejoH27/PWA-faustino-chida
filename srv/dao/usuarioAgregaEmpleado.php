<?php

require_once
 "srv/dao/usuRolAgrega.php";
require_once
  "srv/dao/usuOficioAgrega.php";
//require_once
 //"srv/dao/archivoAgrega.php";

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuarioAgregaEmpleado(
 Usuario $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 //archivoAgrega($modelo->fotografia);
 $stmt = $con->prepare(
  "INSERT INTO USUARIO
    (USU_CUE, USU_MATCH, USU_NOMBRE, USU_APELLIDOP, USU_APELLIDOM, USU_FECHA_NAC)
   VALUES
    (:cue, :match, :nombre, :apellidoP, :apellidoM, :fecha_nac)"
 );
 $stmt->execute([
  ":nombre" => $modelo->nombre,
  ":apellidoP" => $modelo->apellidoP,
  ":apellidoM" => $modelo->apellidoM,
  ":cue" => $modelo->cue, 
  ":match"
  => password_hash(
    $modelo->match,
    PASSWORD_DEFAULT
  ),
  ":fecha_nac" => $modelo->fecha_nac 
 ]);
 /* Si usas una secuencia para
  * generar el id, pasa como
  * parámetro de lastInsertId el
  * nombre de dicha secuencia. */
 $modelo->id =
  $con->lastInsertId();
 usuRolAgrega($modelo);
 usuOficioAgrega($modelo);
 $con->commit();
}
