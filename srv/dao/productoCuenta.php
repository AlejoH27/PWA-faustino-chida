<?php

use srv\dao\AccesoBd;

function productoCuenta(): false|int
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT COUNT(*)
  FROM PRODUCTO"
 );
 return $stmt->fetchColumn();
}
