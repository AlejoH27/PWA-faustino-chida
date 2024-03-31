export class CampoSeleccionarServicioOficio
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <fieldset class="border p-2">
       <legend class="w-auto">Oficios disponible/s</legend>
       <div id="servicios" class="mt-3">
           <div class="spinner-border text-primary" role="status">
               <span class="sr-only">Cargando...</span>
           </div>
       </div>
   </fieldset>
    `
 }
}

customElements.define("campo-seleccionar-servicio-oficio",
 CampoSeleccionarServicioOficio)