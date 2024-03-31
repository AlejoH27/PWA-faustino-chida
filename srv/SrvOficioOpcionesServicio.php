<?php

require_once __DIR__ . "/../lib/php/autoload.php";

require_once "lib/php/leeSinEspaciosInFin.php";
require_once "srv/dao/oficioConsultaServicio.php";
require_once "srv/dao/usuVerifica.php";

use \lib\php\Servicio;

class SrvOficioOpciones extends Servicio
{
    protected function implementacion()
    {
        $cue = leeSinEspaciosInFin("cue");
        $id_usuario = usuVerifica($cue);

        $listaOficios = oficioConsultaServicio($id_usuario);
      $render ="";

        // Obtener el primer id_oficio, si existe
        $primerIdOficio = isset($listaOficios[0]) ? htmlentities($listaOficios[0]->id_oficio) : '';

        $primerTipoOficio = isset($listaOficios[0]) ? htmlentities($listaOficios[0]->tipo_oficio) : '';
      
        $render .= "
        <label class='form-label'>Tu oficio:</label>
        <input type='text' class='form-control' name='tipo_oficio' id='oficioId' value='$primerTipoOficio' placeholder='$primerTipoOficio' readonly><br>";

        $render .= "
        <label class='form-label'>ID de tu oficio:</label>
        <input type='text' class='form-control' name='ofcioId' id='oficioId' value='$primerIdOficio' placeholder='$primerTipoOficio' readonly>";

        return $render;
    }
}

$servicio = new SrvOficioOpciones();
$servicio->ejecuta();


?>
