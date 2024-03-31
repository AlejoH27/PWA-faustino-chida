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
 "lib/php/leeEntero.php";
require_once
 "srv/creaArrayDeRoles.php";
require_once
 "srv/creaArrayDeOficios.php";
require_once
 "srv/dao/empleadoAgregaServicio.php";
require_once
 "srv/dao/usuAgregaServicio.php";
require_once
 "srv/dao/usuVerifica.php";
require_once
 "srv/dao/usuVerificaOficio.php";
require_once
 "srv/dao/oficioConsulta.php";  // Asegúrate de incluir el archivo que contiene la función de consulta de oficios

use \lib\php\Servicio;
use \srv\modelo\Servicio1;
use \srv\modelo\CosServ;
use \srv\modelo\Oficio;

class SrvEmpleadoAgregaServicio extends Servicio
{
    protected function implementacion()
    {
      $servicio1 = new Servicio1();
      $servicio1->tipo_servicio = leeSinEspaciosInFin("tipo_servicio");
      $servicio1->descripcion_de_servicio = leeSinEspaciosInFin("descripcion_de_servicio");
      $servicio1->serv_oficios_id_oficios = leeSinEspaciosInFin("ofcioId"); 
      $servicio1->costo = leeEntero("costo");

      $cue = leeSinEspaciosInFin("cue");
      $id_usuario = usuVerifica($cue);

      $servicio1->iden = $id_usuario;

      empleadoAgregaServicio($servicio1);

      //empleadoAgregaCosto();
      
      return $servicio1;
    }
}

$servicio = new SrvEmpleadoAgregaServicio();
$servicio->ejecuta();
