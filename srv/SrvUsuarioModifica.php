<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";
require_once
 "lib/php/leeArray.php";
require_once
 "srv/creaArrayDeRoles.php";
require_once
 "srv/dao/usuarioModifica.php";

use \lib\php\Servicio;
use \srv\modelo\Usuario;

class SrvUsuarioModifica
extends Servicio
{

 protected
 function implementacion()
 {
  $usuario = new Usuario();
  $usuario->id = 
    leeEntero("id");
  $usuario->nombre = 
    leeSinEspaciosInFin("nombre");
  $usuario->apellidoP = 
    leeSinEspaciosInFin("apellidoP");
  $usuario->apellidoM =
    leeSinEspaciosInFin("apellidoM");
  $usuario->cue =
   leeSinEspaciosInFin("cue");
   
  $usuario->match =
   leeSinEspaciosInFin("match");
   
  $rolIds = leeArray("rolIds");
  $usuario->roles =
   creaArrayDeRoles($rolIds);
  usuarioModifica($usuario);
  return $usuario;
 }
}

$servicio =
 new SrvUsuarioModifica();
$servicio->ejecuta();
