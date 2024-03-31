export class
 CampoSubeImagenObligatorio
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `
    <input type="file" accept="image/*" class="form-control is-valid" id="validationServer07" placeholder="Fotografia" name="fotografia" required>
    
    <div id="validacionFotografia" class="valid-feedback">
      Bien hecho!
    </div>`
 }

}

customElements.define(
 "campo-sube-imagen-obligatorio",
 CampoSubeImagenObligatorio)