export class CampoTelefono
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="number" class="form-control is-valid" id="validationServer10" placeholder="Telefono" name="telefono" required>
    
    <div id="validacionTelefono" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-telefono",
 CampoTelefono)