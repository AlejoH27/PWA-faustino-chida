<?php

require_once __DIR__ . "/../lib/php/autoload.php";
require_once "srv/dao/usuarioConsultaUsuarioPerfil.php";

use \lib\php\Servicio;

class SrvUsuarioConsultaUsuarioPerfil extends Servicio
{
    protected function implementacion()
    {
        $lista = usuarioConsultaUsuarioPerfil();
        $render = "";
        foreach ($lista as $modelo) {

            $usuId = htmlentities($modelo->usuId);
            $usuNombre = htmlentities($modelo->usuNombre);
            $usuApellidoP = htmlentities($modelo->usuApellidoP);
            $usuApellidoM = htmlentities($modelo->usuApellidoM);
            $usuCue = htmlentities($modelo->usuCue);

            $usuFecha_nac = htmlentities($modelo->usuFecha_Nac);
            /*$usuLugar_nac = htmlentities($modelo->usuLugar_Nac);
            $usuCurp = htmlentities($modelo->usuCurp);
            $usuTelefono = htmlentities($modelo->usuTelefono);
            $usuUbicacion = htmlentities($modelo->usuUbicacion);
            $usuDireccion = htmlentities($modelo->usuDireccion);*/

            $roles = $modelo->roles === null || $modelo->roles === "" ? "<em>-- Sin roles --</em>" : htmlentities($modelo->roles);

            

            $oficio = $modelo->oficios;

         


            $identificadorCue = $_GET['cue'];

            if ($identificadorCue == $usuCue) {

                $render .= "
                <div class='container perfil'>
                    <div class='main-body'>
                        <div class='row'>

                           <!-- <div class='col-md-4 mb-3'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <div class='d-flex flex-column align-items-center text-center'>
                                            <img class='foto-perfil img-fluid' src='images/carpinteria.jpg' alt='Admin' width='265' height='265'>
                                        </div>
                                    </div>
                                </div>

                                <div class='card mt-3'>
                                    <ul class='list-group list-group-flush'>
                                        <li class='list-group-item'>
                                            <h6 class='mb-0'>Fecha de nacimiento: <span class='text-secondary'>{$usuFecha_nac}</span></h6>
                                        </li>

                                        

                                        
                                    </ul>
                                </div>
                            </div>-->

                            <div class='col-md-12'>
                                <div class='card mb-3'>
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-12'>
                                                <h6 class='mb-0'>Nombre: <span class='text-secondary'>{$usuNombre}</span></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class='row'>
                                            <div class='col-12'>
                                                <h6 class='mb-0'>Apellido Paterno: <span class='text-secondary'>{$usuApellidoP}</span></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class='row'>
                                            <div class='col-12'>
                                                <h6 class='mb-0'>Apellido Materno: <span class='text-secondary'>{$usuApellidoM}</span></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class='row'>
                                            <div class='col-12'>
                                                <h6 class='mb-0'>Cue: <span class='text-secondary'>{$usuCue}</span></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class='row'>
                                            <div class='col-12'>
                                                <a class='btn btn-info btn-block' target='__blank' href='modifica.html?id=$usuId'>Editar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Verificar si el oficio no es nulo antes de mostrarlo -->
                                " . (!is_null($oficio) ? "
                                <div class='card mb-3'>
                                    <div class='card-body'>
                                         
                                        <div class='row'>
                                            <div class='col-12'>
                                                <h6 class='mb-0'>Oficio: <span class='text-secondary'>{$oficio}</span></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                </div>" : "") . "
                                <!-- Fin de verificación -->
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
        return $render;
    }
}

$servicio = new SrvUsuarioConsultaUsuarioPerfil();
$servicio->ejecuta();
?>
