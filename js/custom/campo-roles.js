import "../../lib/js/custom/indicador-cargando-c.js"

export class CampoRoles
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
   <fieldset class="border p-2">
       <legend class="w-auto">Roles</legend>
       <div id="roles" class="mt-3">
           <div class="spinner-border text-primary" role="status">
               <span class="sr-only">Cargando...</span>
           </div>
       </div>
   </fieldset>
   `

 }
}

customElements.define(
 "campo-roles", CampoRoles)