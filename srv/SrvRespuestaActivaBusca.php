<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "srv/dao/respuestaActivaBusca.php";
require_once
 "lib/php/txt/txtFaltaElId.php";
require_once "srv/txt/" .
 "txtVentaNoEncontrada.php";

use \lib\php\Servicio;

class SrvRespuestaActivaBusca
extends Servicio
{

 protected
 function implementacion()
 {
  $modelo = respuestaActivaBusca();
  if ($modelo === false) {
   throw new Exception(
    txtVentaNoEncontrada()
   );
  } else {
   $detalles = $modelo->detalles;
   $cosservIds = [];
   foreach ($detalles
    as $detalle) {
    $id = $detalle->cosserv->id_cos;
    $cosservIds[$id] = true;
   }


    
    $render = "";
    foreach ($detalles as $detalle) {
        $cosserv = $detalle->cosserv;
        $cosId = htmlentities($cosserv->id_cos);
        $cosServicio = htmlentities($cosserv->tipo_servicio);
        $costo = htmlentities("$" . number_format($detalle->det_costo, 2));

        $render .=
        "<div class='card mb-3'>
            <div class='card-body'>
                <h5 class='card-title'>$cosServicio</h5>
                <p class='card-text'>$costo</p>
                <a href='modificaProducto.html?prodId=$cosId' class='btn btn-primary'>Modificar o eliminar</a>
            </div>
        </div>";
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
 new SrvRespuestaActivaBusca();
$servicio->ejecuta();
