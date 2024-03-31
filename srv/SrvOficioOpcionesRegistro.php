<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/oficioConsulta.php";

use \lib\php\Servicio;

class SrvOficioOpciones extends Servicio
{
    protected function implementacion()
    {
        $listaOficios = oficioConsulta();
        $render = "<select class='form-control' name='ofcioIds[]' id='rolCheckbox_' multiple>";

        foreach ($listaOficios as $modelo) {
            $id = htmlentities($modelo->id_oficio);
            $tipo = htmlentities($modelo->tipo_oficio);
            $descripcion = htmlentities($modelo->descripcion_oficio);

            $render .= "<option value='$id'>{$tipo} - {$descripcion}</option>";
        }

        $render .= "</select>";

        return $render;
    }
}

$servicio = new SrvOficioOpciones();
echo $servicio->ejecuta();
?>
