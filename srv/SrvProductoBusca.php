<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/productoBusca.php";
require_once "srv/txt/" .
 "txtProductoNoEncontrado.php";

use \lib\php\Servicio;

class SrvProductoBusca
extends Servicio
{

 protected
 function implementacion()
 {
  $id = leeEntero("id");
  $modelo = productoBusca($id);
  if ($modelo === false) {
   throw new Exception(
    txtProductoNoEncontrado()
   );
  } else {
   return $modelo;
  }
 }
}

$servicio = new SrvProductoBusca();
$servicio->ejecuta();
