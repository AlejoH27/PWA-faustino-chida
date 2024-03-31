export class CampoFotografia
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="file" accept="image/*" class="form-control is-valid" id="validationServer07" placeholder="Fotografia" name="fotografia" required>
    
    <div id="validacionFotografia" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-fotografia",
 CampoFotografia)