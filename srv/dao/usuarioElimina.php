<?php

require
 "srv/dao/usuRolElimina.php";
require
 "srv/dao/usuOficioElimina.php";

use srv\dao\AccesoBd;

function usuarioElimina(int $id)
{
 $con = AccesoBd::getCon();
 usuRolElimina($id);
 usuOficioElimina($id);
  
 $stmt = $con->prepare(
  "DELETE FROM USUARIO
   WHERE USU_ID = :id"
 );
 $stmt->execute([":id" => $id]);
}
