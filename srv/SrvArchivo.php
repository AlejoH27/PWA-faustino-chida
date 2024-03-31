<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "srv/dao/archivoBusca.php";
require_once
 "lib/php/leeBytes.php";
require_once
 "lib/php/leeEntero.php";
require_once "srv/txt/"
 . "txtArchivoNoEncontrado.php";

use srv\dao\AccesoBd;

mb_internal_encoding("UTF-8");
try {
 header("Cache-Control: no-store, "
  . "no-cache, must-revalidate, "
  . "max-age=0");
 header(
  "Cache-Control: post-check=0, "
   . "pre-check=0",
  false
 );
 header("Pragma: no-cache");
 $con = AccesoBd::getCon();
 $id = leeEntero("id");
 $archivo = archivoBusca($id);
 if ($archivo === false) {
  throw new Exception(
   txtArchivoNoEncontrado()
  );
 }
 echo $archivo->bytes;
} catch (\Throwable $t) {
 http_response_code(500);
 echo $t->getMessage();
}
