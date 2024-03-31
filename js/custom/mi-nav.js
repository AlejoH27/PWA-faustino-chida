import "../../lib/js/custom/indicador-cargando.js"
import { 
  htmlentities 
} from "../../lib/js/htmlentities.js"
import {
 Sesion
} from "../Sesion.js"
import {
 ROL_ADMINISTRADOR
} from "../const/ROL_ADMINISTRADOR.js"
import {
 ROL_CLIENTE
} from "../const/ROL_CLIENTE.js"
import {
 ROL_EMPLEADO
} from "../const/ROL_EMPLEADO.js"

export class MiNav
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
    
   `
    <!-- Inicio nav-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="index.html"><img class="logo-pagina" src="/images/loguito.png" alt="All service"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarsExample04">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <indicador-cargando></indicador-cargando>
                  </li>
              </ul>
          </div>
      </nav>
      <!-- Fin nav -->
    `

 }

 /** @param {Sesion} sesion */
 set sesion(sesion) {
  const nombre = sesion.nombre

   if (nombre !== undefined && nombre !== null) {
       var resultado = nombre.toString();
   } else {
       // Manejar el caso en el que nombre es undefined o null
      // console.log("nombre no está definida o es null");
   }
 
  const cue = sesion.cue
  const rolIds = sesion.rolIds
  let innerHTML =
   this.hipervinculoInicio()
  innerHTML +=
   this.hipervinculosAdmin(rolIds)
  innerHTML += 
   this.hipervinculosCliente(rolIds)
  innerHTML +=
   this.hipervinculosEmpleados(rolIds)
  innerHTML += 
  this.usuario(cue)
  innerHTML +=
   this.hipervinculosClienteServicios(rolIds)
  innerHTML +=
   this.hipervinculoPerfil(cue)
  
   
  const ul =
   this.querySelector("ul")
  if (ul !== null) {
   ul.innerHTML = innerHTML
    
   ul.insertAdjacentHTML('afterend', this.hipervinculoSesion(cue));
  }

   /* Para reutilizar */
   /*ul.insertAdjacentHTML('afterend', `
          <li class="nav-item">
              <a class="nav-link" href="tu-enlace-aqui">Hay sesion</a>
          </li>
      `);
    : ul.insertAdjacentHTML('afterend', `
        <li class="nav-item">
            <a class="nav-link" href="tu-enlace-aqui">No hay sesion</a>
        </li>
    `);*/
   
 }

 hipervinculoInicio() {
  return (/* HTML */
   `<li class="nav-item">
     <a class="nav-link" href="../index.html">
      Inicio</a>
    </li>`)
 }

 /** @param {string} cue */
 usuario(nombre) {
  const nombreHtml =
   htmlentities(nombre)
  return nombre === "" ?
   ""
   : /* HTML */
   `<li class="nav-item">
      <p class="nav-link">
      ${nombreHtml}
      </p>
    </li>`
 }

 hipervinculoPerfil(cue) {
  return cue ?
   /* HTML */
   `<li class="nav-item">
     <a class="nav-link" href="../perfil.html">
       Perfil</a>
    </li>`
    : ""
 }

 /** @param {Set<string>} rolIds */
 hipervinculosAdmin(rolIds) {
  return rolIds.
   has(ROL_ADMINISTRADOR) ?
   /* HTML */
   `<li class="nav-item">
     <a class="nav-link" href="../admin.html">
     Para administradores</a>
    </li>`
   : ""
 }

 /** @param {Set<string>} rolIds */
 hipervinculosCliente(rolIds) {
  return rolIds.has(ROL_CLIENTE) ?
   /* HTML */
   `<li class="nav-item">
     <a class="nav-link" href="../cliente.html">
     Cliente</a>
    </li>
    `
   : ""
 }

   /** @param {Set<string>} rolIds */
    hipervinculosClienteServicios(rolIds) {
     return rolIds.has(ROL_CLIENTE) ?
      /* HTML */
      `<li class="nav-item">
        <a class="nav-link" href="../cliente-servicios.html">
        Servicios</a>
       </li>
       `
      : ""
    }

   hipervinculosEmpleados(rolIds) {
    return rolIds.has(ROL_EMPLEADO) ?
     /* HTML */
     `<li class="nav-item">
       <a class="nav-link" href="../empleado.html">
       Para Empleados</a>
      </li>
      `
     : ""
   }

   hipervinculoSesion(cue){
     return cue ?
     /* HTML */
        `
       `
     :  `
            
               <div class="row">
                 <div class="col-md-6">
                   <a type="button" class="btn btn-outline-success btn-block" href="login.html">Iniciar sesión</a>
                 </div>
                 <div class="col-md-6">
                   <a type="button" class="btn btn-outline-warning btn-block" href="agrega.html">Registrarse</a>
                 </div>
               </div>
            


     `
   }

   
 }
customElements
 .define("mi-nav", MiNav)