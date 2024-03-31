<?php

require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "srv/dao/rolConsulta.php";
require_once
 "srv/dao/oficioConsulta.php";

use \lib\php\Servicio;

class SrvRolOpciones
extends Servicio
{

 protected
 function implementacion()
 {
  $lista = rolConsulta();
  $render = "";
  $listaOficios = oficioConsulta();
  foreach ($lista as $modelo) {
   $id = htmlentities($modelo->id);
   $descripcion = htmlentities(
    $modelo->descripcion
   );

    $render .=
        "<p>
            <label style='display: flex'>
                <input type='checkbox'
                       class='rolCheckbox'
                       name='rolIds[]'
                       id='rolCheckbox_$id'
                       value='$id'>
                <span>
                    <strong>{$id}</strong>
                    <br>{$descripcion}
                </span>
            </label>
        </p>";

    // Buscar oficios solo si el ID es 'Empleado'
    if ($id === 'Empleado') {

    $renderOficios = "<div class='rolInputContainer rolContainer_$id' style='display: none;'>
    <p>Escoge los oficios que inpartes:</p>";
    foreach ($listaOficios as $modeloOficio) {
        $id_oficio = htmlentities($modeloOficio->id_oficio);
        $tipo_oficio = htmlentities($modeloOficio->tipo_oficio);
        $descripcion_oficio = htmlentities($modeloOficio->descripcion_oficio);

        $renderOficios .= "
            <label style='display: flex'>
                <input type='checkbox' class='oficioCheckbox' name='idOficios[]' value='$id_oficio'>
                <span>{$tipo_oficio}</span>
            </label>
        ";
    }
    $renderOficios .= "</div>";

        $render .= $renderOficios;
    }
  }
  return $render;
 }
}

$servicio = new SrvRolOpciones();
$servicio->ejecuta();
?>
