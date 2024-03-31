<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/administradorConsultaOficio.php";

use \lib\php\Servicio;

class SrvAdministradorConsultaOficio extends Servicio
{
    protected function implementacion()
    {
        $lista = administradorConsultaOficio();
        $render = "";

        

        // Inicia la tabla y aplica un fondo blanco y texto negro
        $render .= '<table class="table table-white text-dark">';
        $render .= '<thead class="thead-dark">';
        $render .= '<tr>';
        $render .= '<th scope="col">ID</th>';
        $render .= '<th scope="col">Nombre</th>';
        $render .= '<th scope="col">Descripción</th>';
        $render .= '<th scope="col" class="text-center">Opciones</th>';
        $render .= '</tr>';
        $render .= '</thead>';
        $render .= '<tbody>';

        foreach ($lista as $modelo) {
            $ofiId = htmlentities($modelo->ofiId);
            $ofiNombre = htmlentities($modelo->ofiNombre);
            $ofiDescripcion = htmlentities($modelo->ofiDescripcion);

            // Agrega una fila por cada elemento en la lista
            $render .= '<tr>';
            $render .= "<td>{$ofiId}</td>";
            $render .= "<td>{$ofiNombre}</td>";
            $render .= "<td>{$ofiDescripcion}</td>";

            // Nueva celda para opciones (en este caso, un enlace para modificar)
            $render .= '<td class="text-center">';
            $render .= "<a href='modificaOficio.html?id_oficio={$ofiId}' class='btn btn-info'>Modificar</a>";
            // Puedes agregar más enlaces o botones según tus necesidades
            $render .= '</td>';

            $render .= '</tr>';
        }

        // Cierra la tabla
        $render .= '</tbody>';
        $render .= '</table>';

        

        return $render;
    }
}

$servicio = new SrvAdministradorConsultaOficio();
$servicio->ejecuta();
