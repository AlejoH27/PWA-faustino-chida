<?php

use srv\dao\AccesoBd;

function archivoElimina(int $id)
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "DELETE FROM ARCHIVO
   WHERE ARCH_ID = :id"
 );
 $stmt->execute([":id" => $id]);
}
