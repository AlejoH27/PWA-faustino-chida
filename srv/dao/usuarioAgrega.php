<?php

require_once
 "srv/dao/usuRolAgrega.php";
require_once
  "srv/dao/usuOficioAgrega.php";
//require_once
 //"srv/dao/archivoAgrega.php";

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuarioAgrega(
 Usuario $modelo
) {
 $modelo->valida();
 $con = AccesoBd::getCon();
  
  
 $con->beginTransaction();
 //archivoAgrega($modelo->fotografia);
 $stmt = $con->prepare(
  "INSERT INTO USUARIO
    (USU_CUE, USU_MATCH, USU_NOMBRE, USU_APELLIDOP, USU_APELLIDOM, USU_FECHA_NAC, USU_LUGAR_NAC, USU_CURP, USU_TELEFONO, USU_UBICACION, USU_COMP_DOM_DOC, USU_DIRECCION)
   VALUES
    (:cue, :match, :nombre, :apellidoP, :apellidoM, :fecha_nac, :lugar_nac, :curp , :telefono, :ubicacion, :comp_dom_doc, :direccion)"
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
  ":fecha_nac" => $modelo->fecha_nac,
  ":lugar_nac" => $modelo->lugar_nac,
  ":curp" => $modelo->curp,
  //":archId" => $modelo->fotografia->id,
  ":telefono" => $modelo->telefono,
  ":ubicacion" => $modelo->ubicacion,
  ":comp_dom_doc" => $modelo->comp_dom_doc,
  ":direccion" => $modelo->direccion 
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
