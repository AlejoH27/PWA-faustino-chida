<?php

/*require_once
 "srv/dao/usuRolAgrega.php";
require
 "srv/dao/usuRolElimina.php";*/

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuarioModifica(
 Usuario $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $stmt = $con->prepare(
  "UPDATE USUARIO
  SET USU_NOMBRE = :nombre,
      USU_APELLIDOP = :apellidoP,
      USU_APELLIDOM = :apellidoM,
      USU_CUE = :cue,
      USU_MATCH = :match
  WHERE USU_ID = :id"
 );
 $stmt->execute([
  ":id" => $modelo->id,
  "nombre" => $modelo->nombre,
  "apellidoP" => $modelo->apellidoP,
  "apellidoM" => $modelo->apellidoM,
  ":cue" => $modelo->cue,
  ":match" => password_hash($modelo->match, PASSWORD_DEFAULT)
 ]);
 /*usuRolElimina($modelo->id);
 usuRolAgrega($modelo);*/
 $con->commit();
}
