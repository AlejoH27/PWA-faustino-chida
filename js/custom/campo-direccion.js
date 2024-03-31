export class CampoDireccion
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer13" placeholder="Direccion" name="direccion" required>
    
    <div id="validacionDireccion" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-direccion",
 CampoDireccion)