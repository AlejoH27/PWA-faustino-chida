<?php

require_once
 "lib/php/seRecibioElArchivo.php";

function leeBytes(
 string $archivo
): string {
 $contents =
  seRecibioElArchivo($archivo)
  ?  file_get_contents(
   $_FILES[$archivo]["tmp_name"]
  )
  : false;
 return $contents === false
  ? ""
  : $contents;
}
