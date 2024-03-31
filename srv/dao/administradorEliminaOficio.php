<?php

use srv\dao\AccesoBd;

function administradorEliminaOficio(int $id_oficio)
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "DELETE FROM OFICIOSv2
   WHERE OFICIO_ID = :id_oficio"
 );
 $stmt->execute([":id_oficio" => $id_oficio]);
}
