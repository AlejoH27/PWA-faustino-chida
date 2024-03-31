<?php

use srv\dao\AccesoBd;
use srv\modelo\Usuario;

function usuOficioAgrega(
 Usuario $usuario
) {
 $oficios = $usuario->oficio;
 if (sizeof($oficios) > 0) {
  $con = AccesoBd::getCon();
  $stmt = $con->prepare(
   "INSERT INTO US_OFv2
     (USER_ID_US, OFICIOS_ID_OFICIO, FECHA_ALTA)
     VALUES
      (:user_id_us, :oficio_id_oficio, :fecha_alta)"
  );
  foreach ($oficios as $oficio) {
   $stmt->execute(
    [
     ":user_id_us" => $usuario->id,
     ":oficio_id_oficio" => $oficio->id_oficio, 
     ":fecha_alta" => date("Y-m-d H:i:s")
    ]
   );
  }
 }
}

