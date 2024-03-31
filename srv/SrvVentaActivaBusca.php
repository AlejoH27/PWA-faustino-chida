<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "srv/dao/ventaActivaBusca.php";
require_once
 "lib/php/txt/txtFaltaElId.php";
require_once "srv/txt/" .
 "txtVentaNoEncontrada.php";

use \lib\php\Servicio;

class SrvVentaActivaBusca
extends Servicio
{

 protected
 function implementacion()
 {
  $modelo = ventaActivaBusca();
  if ($modelo === false) {
   throw new Exception(
    txtVentaNoEncontrada()
   );
  } else {
   $detalles = $modelo->detalles;
   $productoIds = [];
   foreach ($detalles
    as $detalle) {
    $id = $detalle->producto->id;
    $productoIds[$id] = true;
   }
   $render = "";
   foreach ($detalles as $detalle) {
    $producto = $detalle->producto;
    $prodId =
     htmlentities($producto->id);
    $prodNombre = htmlentities(
     $producto->nombre
    );
    $precio = htmlentities(
     "$" . number_format(
      $detalle->precio,
      2
     )
    );
    $cantidad = htmlentities(
     number_format(
      $detalle->cantidad,
      2
     )
    );
    $render .=
     "<li>
       <p>
        <strong>
         $prodNombre
        </strong>
        $cantidad x $precio
  <a href=
    'modificaProducto.html?prodId=$prodId'>
   Modificar o eliminar</a>
       </p>
      </li>";
   }
   $modelo->detalles = [];
   return [
    "modelo" => $modelo,
    "render" => $render
   ];
  }
 }
}

$servicio =
 new SrvVentaActivaBusca();
$servicio->ejecuta();
