export class CampoLugarNacimiento
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer06" placeholder="Lugar de nacimiento" name="lugar_nac" required>
    
    <div id="validacionLugarNacimiento" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-lugar-nacimiento",
 CampoLugarNacimiento)