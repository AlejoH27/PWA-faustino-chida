export class CampoDescripcionOficio
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Descripcion" name="descripcion_oficio" required>
    <div class="valid-feedback">
        Looks good!
    </div>
    `
 }
}

customElements.define("campo-descripcion-oficio",
 CampoDescripcionOficio)