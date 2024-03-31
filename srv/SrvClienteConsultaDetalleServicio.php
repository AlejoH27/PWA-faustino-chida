<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/clienteConsultaDetalleServicio.php";
require_once "srv/dao/usuarioDatos.php";

use \lib\php\Servicio;

class SrvClienteConsultaDetalleServicio extends Servicio
{
    protected function implementacion()
    {
        $id = htmlentities($_GET['id']);
        $id_servicio = htmlentities($_GET['id_servicio']);
        $id_usuario = htmlentities($_GET['id_usuario']);

        $usuario = usuarioDatos($id_usuario);

        foreach ($usuario as $us) {
            $nombre_cliente = $us->nombre_cliente;
            $cue_cliente = $us->cue_cliente;
        }

        $lista = clienteConsultaDetalleServicio($id, $id_servicio);
        $render = "";

        foreach ($lista as $modelo) {
            $servId = htmlentities($modelo->servId);
            $servNombre = htmlentities($modelo->servNombre);
            $servDescripcion = htmlentities($modelo->servDescripcion);
            $userId = htmlentities($modelo->userId);
            $userName = htmlentities($modelo->userName);
            $userPaterno = htmlentities($modelo->userPaterno);
            $userMaterno = htmlentities($modelo->userMaterno);
            $userCue = htmlentities($modelo->userCue);
            $userCosto = htmlentities("$" . $modelo->costoServicio . " pesos");

            $id_costo = htmlentities($modelo->costoId);

            $render .= '<div class="card">';
            $render .= '<div class="card-body">';
            $render .= '<h1 style="text-align:center;">Cotizacion</h1><br>';
          
            $render .= "<h5 class='card-title' style='background-color: #f8d7da; padding: 10px;'>Servicio: {$servNombre}</h5>";

            $render .= "<div style='background-color: #EFFFE3; padding: 10px;'>";
          
            $render .= "<p class='card-text' style='font-weight: bold;'>Descripción:</p>";
            $render .= "<p class='card-text'>{$servDescripcion}</p>";
            $render .= "<p class='card-text' style='font-weight: bold;'>Nombre del trabajador que lo realiza:</p>";
            $render .= "<p class='card-text'>{$userName} {$userPaterno} {$userMaterno}</p>";
            $render .= "<p class='card-text' style='font-weight: bold;'>Cue:</p>";
            $render .= "<p class='card-text'>{$userCue}</p>";
            //$render .= "<p class='card-text'>Id del costo: <br>{$id_costo}</p>";
            $render .= "<p class='card-text' style='font-weight: bold;'>Nombre del cliente:</p>";
            $render .= "<p class='card-text'>$nombre_cliente</p>";

            $render .= "</div>";

            // Agrega el botón para redireccionar
            $render .= "<br>";
            $render .= "<a href='cliente-cotiza-servicio.html?id=$id_costo&nombre_cliente=$nombre_cliente&cue_cliente=$cue_cliente' class='btn btn-primary' style='text-align:center;'>Cotizar</a>";

            // Cierra la tarjeta
            $render .= '</div>';
            $render .= '</div>';
        }

        // Cierra el contenedor de tarjetas
        $render .= '</div>';

        return $render;
    }
}

$servicio = new SrvClienteConsultaDetalleServicio();
$servicio->ejecuta();
