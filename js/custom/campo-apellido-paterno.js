export class CampoApellidoPaterno
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Apellido Paterno" name="apellidoP" required>
    
    <div id="validacionApellidoP" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
}

customElements.define("campo-apellido-paterno",
 CampoApellidoPaterno)