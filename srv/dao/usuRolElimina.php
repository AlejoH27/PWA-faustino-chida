<?php

use srv\dao\AccesoBd;

function usuRolElimina(int $usuId)
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "DELETE FROM USU_ROL
    WHERE USU_ID = :usuId"
 );
 $stmt->execute([
  ":usuId" => $usuId
 ]);
}
