<?php 

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeSinEspaciosInFin.php";
require_once
 "lib/php/leeArray.php";
/*require_once
 "srv/creaArrayDeUsuarios.php";*/
require_once
 "srv/dao/administradorAgregaOficio.php";

use \lib\php\Servicio;
use \srv\modelo\Oficio;

class SrvAdministradorAgregaOficio
extends Servicio
{

  protected 
  function implementacion()
  {
    $oficio = new Oficio();
    $oficio->tipo_oficio = 
      leeSinEspaciosInFin("tipo_oficio");
    $oficio->descripcion_oficio = 
      leeSinEspaciosInFin("descripcion_oficio");
    
      /*$usuario->usuarios = 
        creaArrayDeOficios($usuarioIds);*/
      administradorAgregaOficio($oficio);
    return $oficio;
  }

}

$servicio = new SrvAdministradorAgregaOficio();
$servicio->ejecuta();
