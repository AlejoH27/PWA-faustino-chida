export class CampoDescripcionServicio
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Descripcion del servicio" name="descripcion_de_servicio" required>
    <div class="valid-feedback">
        Looks good!
    </div>
    `
 }
}

customElements.define("campo-descripcion-servicio",
 CampoDescripcionServicio)