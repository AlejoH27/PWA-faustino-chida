<?php 

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";
require_once
 "lib/php/leeArray.php";
require_once
 "lib/php/leeBytes.php";
require_once
 "srv/creaArrayDeRoles.php";
require_once
 "srv/creaArrayDeOficios.php";
require_once
 "srv/dao/usuarioAgregaEmpleado.php";


use \lib\php\Servicio;
use \srv\modelo\Usuario;
//use \srv\modelo\Archivo;

class SrvUsuarioAgregaEmpleado
extends Servicio
{

 protected
 function implementacion()
 {
  $usuario = new Usuario();
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
  $usuario->fecha_nac =
   leeSinEspaciosInFin("fecha_nac");
   /*$usuario->lugar_nac =
   leeSinEspaciosInFin("lugar_nac");
   $usuario->curp =
   leeSinEspaciosInFin("curp");

   /*
   $archivo = new Archivo();
   $archivo->foto =
    leeBytes("fotografia");
   $usuario->fotografia = $archivo;
   /* Los bytes se daescargan con
    * SrvArchivo. 
   $archivo->foto = "";//

   $usuario->telefono =
   leeSinEspaciosInFin("telefono");
   $usuario->ubicacion =
   leeSinEspaciosInFin("ubicacion");
   $usuario->comp_dom_doc =
   leeSinEspaciosInFin("comp_dom_doc");
   $usuario->direccion =
   leeSinEspaciosInFin("direccion");*/

   $rolIds = leeArray("rolIds");
   $usuario->roles = creaArrayDeRoles($rolIds);

   $oficio = leeArray("ofcioIds");  // Asumiendo que tienes una función leeArrayOficio que devuelve un array

   //echo "Contenido de \$oficio:\n";
   //var_dump($oficio); 

   $usuario->oficio = creaArrayDeOficios($oficio);

   //echo "Contenido de \$oficio:\n";
    //var_dump($usuario->oficio); 


  usuarioAgregaEmpleado($usuario);
  return $usuario;
 }

}

$servicio = new SrvUsuarioAgregaEmpleado();
$servicio->ejecuta();
