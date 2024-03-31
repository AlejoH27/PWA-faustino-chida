<?php


require_once __DIR__ .
 "/../lib/php/autoload.php";
require_once
 "lib/php/leeEntero.php";
require_once
 "srv/dao/administradorBuscaOficio.php";
require_once "srv/txt/"
 . "txtUsuarioNoEncontrado.php";

use \lib\php\Servicio;

class SrvAdministradorBuscaOficio extends Servicio
{
    protected function implementacion()
    {
        $id = leeEntero("id_oficio");
        $modelo = administradorBuscaOficio($id);
        if ($modelo === false) {
            throw new Exception(txtUsuarioNoEncontrado());
        }

        // Elimina la obtención y manipulación de roles
        // $roles = $modelo->roles;
        // $rolIds = [];
        // foreach ($roles as $rol) {
        //     $rolIds[$rol->id] = true;
        // }

        // Elimina la obtención de roles con rolConsulta()
        // $roles = rolConsulta();

        // Elimina la creación del render para los roles
        // $render = "";
        // foreach ($roles as $rol) {
        //     $checked = isset($rolIds[$rol->id]) ? " checked" : "";
        //     $id = htmlentities($rol->id);
        //     $descripcion = htmlentities($rol->descripcion);
        //     $render .= "<p>
        //                     <label style='display: flex'>
        //                         <input type='checkbox' $checked name='rolIds[]' value='$id'>
        //                         <span>
        //                             <strong>{$id}</strong>
        //                             <br>{$descripcion}
        //                         </span>
        //                     </label>
        //                 </p>";
        // }

        // Retorna solo el modelo, sin render ni roles
        return ["modelo" => $modelo];
    }
}

$servicio = new SrvAdministradorBuscaOficio();
$servicio->ejecuta();
