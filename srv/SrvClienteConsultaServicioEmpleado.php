<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/clienteConsultaServicioEmpleado.php";

use \lib\php\Servicio;

class SrvClienteConsultaServicioEmpleado extends Servicio
{
    protected function implementacion()
    {

        $id = htmlentities($_GET['id']);
        $id_servicio = htmlentities($_GET['id_servicio']);
      
        $lista = clienteConsultaServicioEmpleado($id, $id_servicio);

        $render = "";

        // Inicia el contenedor de tarjetas
        $render .= '<div class="card-deck">';

        foreach ($lista as $modelo) {
            $servId = htmlentities($modelo->servId);
            $servNombre = htmlentities($modelo->servNombre);
            $servDescripcion = htmlentities($modelo->servDescripcion);
            //$servOficios = htmlentities($modelo->servOficios);
            $userId = htmlentities($modelo->userId);
            $userName = htmlentities($modelo->userName);
            $userPaterno = htmlentities($modelo->userPaterno);
            $userMaterno = htmlentities($modelo->userMaterno);
            $userCue = htmlentities($modelo->userCue);

            // Inicia una tarjeta
            $render .= '<div class="card">';
            $render .= '<div class="card-body">';
            $render .= "<h5 class='card-title'>Servicio: {$servNombre}</h5>";
            $render .= "<p class='card-text'>Descripcion{$servDescripcion}</p>";
            //$render .= "<p class='card-text'>Oficio: {$servOficios}</p>";
            $render .= "<p class='card-text'>Nombre del trabajador que lo realiza: {$userName} {$userPaterno} {$userMaterno}</p>";
            $render .= "<p class='card-text'>Correo: {$userCue}</p>";

            // Agrega el botón para redireccionar
            $render .= "<br>";
            $render .= "<a href='#' class='btn btn-primary' style='text-align:center;'>Cotizar</a>";

            // Cierra la tarjeta
            $render .= '</div>';
            $render .= '</div>';
        }

        // Cierra el contenedor de tarjetas
        $render .= '</div>';

        return $render;
    }
}

$servicio = new SrvClienteConsultaServicioEmpleado();
$servicio->ejecuta();
?>
