<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/clienteConsultaServicio.php";
require_once "srv/dao/usuVerifica.php";

require_once "lib/php/leeSinEspaciosInFin.php";

use \lib\php\Servicio;

class SrvClienteConsultaServicio extends Servicio
{
    protected function implementacion()
    {
        $iden = leeSinEspaciosInFin("cue");
        $id_usuario = usuVerifica($iden);

        $lista = clienteConsultaServicio();

        $render = "";

        // Inicia el contenedor de tarjetas con clase "row"
        $render .= '<div class="row">';

        foreach ($lista as $modelo) {
            $servId = htmlentities($modelo->servId);
            $servNombre = htmlentities($modelo->servNombre);
            $servDescripcion = htmlentities($modelo->servDescripcion);
            //$servOficios = htmlentities($modelo->servOficios);
            $userId = htmlentities($modelo->userId);
            $userName = htmlentities($modelo->userName);

            // Inicia una columna con clase "col-md-4" (ocupando 4 de las 12 columnas en dispositivos medianos y grandes)
            $render .= '<div class="col-md-4 mb-4">';
            // Inicia una tarjeta con clase "card"
            $render .= '<div class="card">';
            $render .= '<div class="card-body">';
            $render .= "<h5 class='card-title'>{$servNombre}</h5>";
            $render .= "<p class='card-text'>{$servDescripcion}</p>";
            //$render .= "<p class='card-text'>Oficio: {$servOficios}</p>";
            $render .= "<p class='card-text'>Trabajador: {$userName} </p>";

            // Agrega el botón para redireccionar
            $render .= "<br>";
            $render .= "<a href='cliente-detalle-servicio.html?id={$userId}&id_servicio={$servId}&id_usuario=$id_usuario' class='btn btn-primary' style='text-align:center;'>Ver Detalles</a>";

            // Cierra la tarjeta
            $render .= '</div>';
            $render .= '</div>';
            // Cierra la columna
            $render .= '</div>';
        }

        // Cierra el contenedor de tarjetas
        $render .= '</div>';

        return $render;
    }
}

$servicio = new SrvClienteConsultaServicio();
$servicio->ejecuta();
?>
