export class CampoAceptarTerminosCondiciones
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <div class="form-check">
       <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
       <label class="form-check-label" for="invalidCheck3">
           Aceptar los terminos y condiciones
       </label>
       <div class="invalid-feedback">
           Debes aceptar los terminos y condiciones antes de registrarte.
       </div>
   </div>
    `
 }
   
}



customElements.define("campo-aceptar-terminos-condiciones",
                     CampoAceptarTerminosCondiciones)