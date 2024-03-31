import "../../lib/js/custom/indicador-cargando-c.js"

export class CampoOficios
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
   
       <div class="mt-3">
           <div class="row">
               <div id="oficios"class="col-md-12">
                   <span class="sr-only">Cargando...</span>
               </div>
           </div>
       </div>

   
   `

 }
}

customElements.define(
 "campo-oficios", CampoOficios)