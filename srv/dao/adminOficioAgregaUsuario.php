<?php

use srv\dao\AccesoBd;
use srv\modelo\Oficio;

function adminOficioAgregaUsuario(
 Oficio $oficio
) {
 $usuarios = $oficio->usuarios;
 if (sizeof($usuarios) > 0) {
  $con = AccesoBd::getCon();
  $stmt = $con->prepare(
   "INSERT INTO US_OFv2
    (USER_ID_US, OFICIOS_ID_OFICIO, FECHA)
     VALUES
      (:usuId, :ofiId, :fecha_alta)"
  );
  foreach ($usuarios as $usuario) {
   $stmt->execute(
    [
     ":usuId" => $oficio->id,
     ":ofiId" => $usuario->id,
     ":fecha_alta" => date("Y-m-d")
    ]
   );
  }
 }
}
