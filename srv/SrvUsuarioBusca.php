<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/usuarioBusca.php";
require_once "srv/txt/"
 . "txtUsuarioNoEncontrado.php";

use \lib\php\Servicio;

class SrvUsuarioBusca
extends Servicio
{

 protected
 function implementacion()
 {
  $id = leeEntero("id");
  $modelo = usuarioBusca($id);
  if ($modelo === false) {
   throw new Exception(
    txtUsuarioNoEncontrado()
   );
  }
  $roles = $modelo->roles;
  $rolIds = [];
  foreach ($roles as $rol) {
   $rolIds[$rol->id] = true;
  }
  $roles = rolConsulta();
  $render = "";
  foreach ($roles as $rol) {
   $checked =
    isset($rolIds[$rol->id])
    ? " checked"
    : "";
   $id = htmlentities($rol->id);
   $descripcion = htmlentities(
    $rol->descripcion
   );
   $render .=
    "<p>
      <label style='display: flex'>
       <input type='checkbox'
         $checked name='rolIds[]'
         value='$id'>
       <span>
        <strong>{$id}</strong>
        <br>{$descripcion}
       </span>
      </label>
     </p>";
  }
  return [
   "modelo" => $modelo,
   "render" => $render
  ];
 }
}

$servicio = new SrvUsuarioBusca();
$servicio->ejecuta();
