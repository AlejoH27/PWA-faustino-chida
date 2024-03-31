<?php

namespace srv\modelo;

require_once 
  "lib/php/valida.php";
require_once
 "lib/php/validaIdNoVacio.php";
require_once
 "lib/php/validaTextoNoVacio.php";
require_once
 "lib/php/validaNoNull.php";
require_once
 "srv/txt/txtFaltaElCue.php";
require_once
 "srv/txt/txtNoEsUnRol.php";
require_once
 "srv/txt/txtFaltaElArchivo.php";


 use srv\modelo\Rol;

class Usuario
{

 public int $id;
 public string $nombre;
 public string $apellidoP; 
 public string $apellidoM;
 public string $cue;
 public string $match;
  
 public string $fecha_nac;
 public string $lugar_nac;
 public string $curp;
 //public ?Archivo $fotografia;
 //public string $ini_doc;
 //public string $curp_doc;
 public int $telefono;
 public string $ubicacion;
 public string $comp_dom_doc;
 public string $direccion;
 /** @var Rol[] */
 public array $roles;
 public array $oficio;
 public array $servicio;

/**
  public function __construct()
  {
      $this->roles = []; // Inicializa la propiedad $roles como un arreglo vacío.
  }

  public function valida()
  {
      if ($this->cue === null || $this->cue === "") {
          throw new Exception(txtFaltaElCue());
      }
      if ($this->match === null || $this->match === "") {
          throw new Exception(txtFaltaElMatch());
      }
  }
  **/


 function valida()
 {
  $this->validaCueNoVacio();
  $this->validaRoles();
   //$this->validaArchivoNoNull();  
 }

 function validaCueNoVacio()
 {
  validaTextoNoVacio(
   $this->cue,
   txtFaltaElCue()
  );
 }

  /*function validaArchivoNoNull()
   {
    validaNoNull(
     $this->fotografia,
     txtFaltaElArchivo()
    );
   }*/

 function validaRoles()
 {
  foreach ($this->roles as $rol) {
   valida(
    $rol instanceof Rol,
    txtNoEsUnRol()
   );
   validaIdNoVacio($rol->id);
  }
 }

  
}
