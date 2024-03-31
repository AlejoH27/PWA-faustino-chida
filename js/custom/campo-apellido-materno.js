export class CampoApellidoMaterno
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer03" placeholder="Apellido Materno" name="apellidoM" required>
    <div id="validacionApellidoM" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
}

customElements.define("campo-apellido-materno",
 CampoApellidoMaterno)