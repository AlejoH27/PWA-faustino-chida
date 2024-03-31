<?php

use srv\dao\AccesoBd;

function respuestaCuenta(): false|int
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT COUNT(*)
  FROM RESPUESTA"
 );
 return $stmt->fetchColumn();
}
