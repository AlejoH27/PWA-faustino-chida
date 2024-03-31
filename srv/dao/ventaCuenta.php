<?php

use srv\dao\AccesoBd;

function ventaCuenta(): false|int
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT COUNT(*)
  FROM VENTA"
 );
 return $stmt->fetchColumn();
}
