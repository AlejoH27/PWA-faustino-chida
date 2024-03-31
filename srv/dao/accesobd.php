<?php

namespace srv\dao;

require_once "srv/dao/bdCrea.php";
require_once
 "srv/dao/rolConsulta.php";
require_once
 "srv/dao/rolAgrega.php";

//Carrito

require_once
 "srv/dao/productoCuenta.php";
require_once
 "srv/dao/productoAgrega.php";
require_once
 "srv/dao/ventaCuenta.php";
require_once
 "srv/dao/ventaAgrega.php";
require_once
 "srv/txt/txtSandwich.php";
require_once
 "srv/txt/txtHotDog.php";
require_once
 "srv/txt/txtHamburguesa.php";

require_once
 "srv/dao/respuestaCuenta.php";
require_once
 "srv/dao/respuestaAgrega.php";

//


require_once "srv/txt/"
 . "txtAdministraElSistema.php";

require_once
 "srv/const/ROL_CLIENTE.php";
require_once
 "srv/const/ROL_ADMINISTRADOR.php";
require_once
 "srv/const/ROL_EMPLEADO.php";


require_once "srv/txt/"
 . "txtAdministraValidaciones.php";
require_once
 "srv/txt/txtRealizaCompras.php";
require_once
 "srv/txt/txtRealizaTrabajos.php";

use \PDO;
use srv\modelo\Rol;
use srv\modelo\Usuario;
use srv\modelo\Oficio;
use srv\modelo\Producto;
use srv\modelo\Venta;
use srv\modelo\Respuesta;


class AccesoBd
{

 private static $con = null;

 static function getCon(): PDO
 {
  if (self::$con === null) {
   self::$con = self::conecta();
   self::prepara(self::$con);
  }
  return self::$con;
 }

  private static
   function conecta(): \PDO
   {
     return new PDO(
         // cadena de conexión
          "mysql:host=34.136.15.29;dbname=all-service;charset=utf8",
         "root",
         // contraseña
         "root",
         [PDO::ATTR_ERRMODE =>
         PDO::ERRMODE_EXCEPTION]
        );
  }

 private static
 function prepara(PDO $con)
 {
  bdCrea($con);
  $roles = rolConsulta();
  if (sizeof($roles) === 0) {

     $emple = new Rol();
     $emple->id = ROL_EMPLEADO;
     $emple->descripcion =
     txtRealizaTrabajos();
     rolAgrega($emple);

     $cliente = new Rol();
     $cliente->id = ROL_CLIENTE;
     $cliente->descripcion =
     txtRealizaCompras();
     rolAgrega($cliente);
    
     /*$administrador = new Rol();
     $administrador->id = ROL_ADMINISTRADOR;
     $administrador->descripcion =
     txtAdministraElSistema();
     rolAgrega($administrador);*/

   $rol = new Rol();
   $rol->id = "Administrador";
   $rol->descripcion =
    txtAdministraElSistema();
   rolAgrega($rol);
    
    /**
   $rol = new Rol();
   $rol->id = "Cliente";
   $rol->descripcion =
    txtRealizaCompras();
   rolAgrega($rol);
    **/
  }

   /*if (productoCuenta()=== 0) {

    $producto = new Producto();
    $producto->nombre =
     txtSandwich();
    $producto->existencias = 50;
    $producto->precio = 15;
    productoAgrega($producto);

    $producto = new Producto();
    $producto->nombre = txtHotDog();
    $producto->existencias = 40;
    $producto->precio = 30;
    productoAgrega($producto);

    $producto = new Producto();
    $producto->nombre =
     txtHamburguesa();
    $producto->existencias = 30;
    $producto->precio = 40;
    productoAgrega($producto);
   }
   if (ventaCuenta() === 0) {
    $venta = new Venta();
    $venta->activa = true;
    $venta->detalles = [];
    ventaAgrega($venta);
   }*/

   if (respuestaCuenta() === 0) {
     $respuesta = new Respuesta();
     $respuesta->activa = true;
     $respuesta->detalles = [];
     respuestaAgrega($respuesta);
    }
   
 }
}
