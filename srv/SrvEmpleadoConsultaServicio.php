<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/empleadoConsultaServicio.php";

use \lib\php\Servicio;

class SrvEmpleadoConsultaServicio extends Servicio
{
    protected function implementacion()
    {
        $lista = empleadoConsultaServicio();

        $render = "";

        // Inicia la tabla y aplica un fondo blanco y texto negro
        $render .= '<table class="table table-white text-dark">';
        $render .= '<thead class="thead-dark">';
        $render .= '<tr>';
        $render .= '<th scope="col">ID</th>';
        $render .= '<th scope="col">Nombre</th>';
        $render .= '<th scope="col">Descripción</th>';
        $render .= '<th scope="col">Oficio perteneciente</th>';
        $render .= '<th scope="col" class="text-center">Opciones</th>';
        $render .= '</tr>';
        $render .= '</thead>';
        $render .= '<tbody>';

        foreach ($lista as $modelo) {
            $servId = htmlentities($modelo->servId);
            $servNombre = htmlentities($modelo->servNombre);
            $servDescripcion = htmlentities($modelo->servDescripcion);
            $servOficios = htmlentities($modelo->servOficios);

            // Agrega una fila por cada elemento en la lista
            $render .= '<tr>';
            $render .= "<td>{$servId}</td>";
            $render .= "<td>{$servNombre}</td>";
            $render .= "<td>{$servDescripcion}</td>";
            $render .= "<td>{$servOficios}</td>";

            // Nueva celda para opciones (en este caso, un enlace para modificar)
            $render .= '<td class="text-center">';
            $render .= "<a href='modificaServicioEmpleado.html?id_servicio={$servId}' class='btn btn-info'>Modificar</a>";
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

$servicio = new SrvEmpleadoConsultaServicio();
$servicio->ejecuta();
