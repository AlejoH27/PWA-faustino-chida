<?php

use srv\dao\AccesoBd;

function usuOficioElimina(int $usuId)
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "DELETE FROM US_OFv2
    WHERE USER_ID_US = :usuId"
 );
 $stmt->execute([
  ":usuId" => $usuId
 ]);
}
