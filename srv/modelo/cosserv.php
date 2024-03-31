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
 "srv/txt/txtFaltaElCosto.php";
require_once
 "srv/txt/txtNoEsUnOficio.php";

 use srv\modelo\Oficio;
 use srv\modelo\Servicio1;
 use srv\modelo\Usuario;

class CosServ
{

 public int $id_cos;
 public int $costo;
 public int $serv_id_serv; 
 public int $serv_cos_oficios_id_oficio;
 public int $us_of_id_ab;
 public string $tipo_servicio;
 public string $tipo_oficio;
 public string $usu_nombre;


 function valida()
 {
  $this->validaCostoNoVacio();
  //$this->validaServicios();
  //$this->validaOficios();
   
 }

 function validaCostoNoVacio()
 {
  validaTextoNoVacio(
   $this->costo,
   txtFaltaElCosto()
  );
 }

 /* function validaServicios()
  {
    
      valida(!empty($this->serv_id_serv), txtFaltaElServicio());
      //valida($this->serv_oficios_id_oficios instanceof Oficio,txtNoEsUnOficio());
      //validaIdNoVacio($oficio->id_oficio);
      
  }*/

/*  function validaOficios()
  {

      valida(!empty($this->serv_oficios_id_oficio), txtFaltaElOficio());
      //valida($this->serv_oficios_id_oficios instanceof Oficio,txtNoEsUnOficio());
      //validaIdNoVacio($oficio->id_oficio);

  }*/

  
}
