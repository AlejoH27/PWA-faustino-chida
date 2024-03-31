<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/usuarioConsultaEmpleado.php";

use \lib\php\Servicio;

class SrvUsuarioConsultaEmpleado extends Servicio
{
    protected function implementacion()
    {
        $lista = usuarioConsultaEmpleado();
        $render = "";

        // Inicia el contenedor de tarjetas
        $render .= '<div class="row">';

        foreach ($lista as $modelo) {
            $usuId = htmlentities($modelo->usuId);
            $usuNombre = htmlentities($modelo->usuNombre);
            $usuCue = htmlentities($modelo->usuCue);
            $roles = $modelo->roles === null || $modelo->roles === "" ? "<em>-- Sin roles --</em>" : htmlentities($modelo->roles);

            // Inicia una tarjeta
            $render .= '<div class="col-md-4 offset-md-4 profile-card">';
            $render .= '<div class="imageE">';
            $render .= '<img src="images/empleado.png" alt="Empleado">';
            $render .= '</div>';
            $render .= '<div class="text-data">';
            $render .= "<span class='name'>{$usuNombre}</span>";
            $render .= "<span class='job'>{$usuCue}</span>";
            $render .= "<span class='job'><b>{$roles}</b></span>";
            $render .= '</div>';
            $render .= '<div class="buttons">';
            $render .= '<form>';
            $render .= "<input type='hidden' name=''>";
            $render .= '<button class="button">Leer más</button>';
            $render .= '</form>';
            // Puedes descomentar este bloque si deseas añadir el botón de Mensaje
            /*
            $render .= '<a href="indexUsu.php?pagina=contactar&id_abogado="">';
            $render .= '<button class="button">Mensaje</button>';
            $render .= '</a>';
            */
            $render .= '</div>';
            $render .= '</div>';
        }

        // Cierra el contenedor de tarjetas
        $render .= '</div>';

        return $render;
    }
}

$servicio = new SrvUsuarioConsultaEmpleado();
$servicio->ejecuta();
?>
