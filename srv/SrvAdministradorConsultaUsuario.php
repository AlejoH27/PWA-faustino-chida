<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/administradorConsultaUsuario.php";

use \lib\php\Servicio;

class SrvAdministradorConsultaUsuario extends Servicio
{
    protected function implementacion()
    {
        $lista = administradorConsultaUsuario();
        $render = "";

        // Inicia la tabla y aplica un fondo blanco y texto negro
        $render .= '<table class="table table-white text-dark">';
        $render .= '<thead class="thead-dark">';
        $render .= '<tr>';
        $render .= '<th scope="col">ID</th>';
        $render .= '<th scope="col">Nombre</th>';
        $render .= '<th scope="col">Correo</th>';
        $render .= '<th scope="col">Roles</th>';
        $render .= '<th scope="col" class="text-center">Opciones</th>';
        $render .= '</tr>';
        $render .= '</thead>';
        $render .= '<tbody>';

        foreach ($lista as $modelo) {
            $usuId = htmlentities($modelo->usuId);
            $usuNombre = htmlentities($modelo->usuNombre);
            $usuCue = htmlentities($modelo->usuCue);
            $roles = $modelo->roles === null || $modelo->roles === "" ? "<em>-- Sin roles --</em>" : htmlentities($modelo->roles);

            // Agrega una fila por cada elemento en la lista
            $render .= '<tr>';
            $render .= "<td>{$usuId}</td>";
            $render .= "<td>{$usuNombre}</td>";
            $render .= "<td>{$usuCue}</td>";
            $render .= "<td>{$roles}</td>";

            // Nueva celda para opciones (en este caso, un enlace para modificar)
            $render .= '<td class="text-center">';
            $render .= "<a href='modifica.html?id={$usuId}' class='btn btn-info'>Modificar</a>";
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

$servicio = new SrvAdministradorConsultaUsuario();
$servicio->ejecuta();
