<?php

namespace srv\modelo;

require_once "lib/php/valida.php";
require_once
 "lib/php/validaIdNoVacio.php";
require_once
 "lib/php/validaTextoNoVacio.php";
require_once
 "srv/txt/txtFaltaElServicio.php";
require_once
 "srv/txt/txtFaltaElOficio.php";
require_once
 "srv/txt/txtNoEsUnOficio.php";

 use srv\modelo\Oficio;

class Servicio1
{

 public int $id_servicio;
 public string $tipo_servicio;
 public string $descripcion_de_servicio; 
 public string $serv_oficios_id_oficios;
 public int $iden;
 public int $costo;


 function valida()
 {
  $this->validaServicioNoVacio();
  $this->validaOficios();
   
 }

 function validaServicioNoVacio()
 {
  validaTextoNoVacio(
   $this->tipo_servicio,
   txtFaltaElServicio()
  );
 }

  function validaOficios()
  {
    
      valida(!empty($this->serv_oficios_id_oficios), txtFaltaElOficio());
      //valida($this->serv_oficios_id_oficios instanceof Oficio,txtNoEsUnOficio());
      //validaIdNoVacio($oficio->id_oficio);
      
  }

  
}
