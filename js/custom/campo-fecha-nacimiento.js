export class CampoFechaNacimiento
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="date" class="form-control is-valid" id="validationServer05" placeholder="Fecha de nacimiento" name="fecha_nac" required>
    
    <div id="validacionFechaNacimiento" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-fecha-nacimiento",
 CampoFechaNacimiento)