<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "srv/dao/productoConsulta.php";

use \lib\php\Servicio;

class SrvProductoConsulta
extends Servicio
{

 protected
 function implementacion()
 {
  $lista = productoConsulta();
  $render = "";
  foreach ($lista as $modelo) {
   $id = htmlentities($modelo->id);
   $nombre =
    htmlentities($modelo->nombre);
   $precio = htmlentities(
    "$" . number_format(
     $modelo->precio,
     2
    )
   );
   $existencias = htmlentities(
    number_format(
     $modelo->existencias,
     2
    )
   );
   $render .=
    "<li>
      <p>
       <strong>$nombre</strong>
       $precio / $existencias
      <a href='agregaProducto.html?id=$id'>
       Agregar al carrito</a>
      </p>
     </li>";
  }
  return $render;
 }
}

$servicio =
 new SrvProductoConsulta();
$servicio->ejecuta();
