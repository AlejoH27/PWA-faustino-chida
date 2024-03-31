export class CampoNombre
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Nombre" name="nombre" required>
    
    <div id="validacionNombre" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-nombre",
 CampoNombre)