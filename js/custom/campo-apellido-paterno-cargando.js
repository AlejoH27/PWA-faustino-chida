export class CampoApellidoPaternoCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<h6 class='mb-0'>Apellido Paterno: <span class='text-secondary'> <input name="apellidoP" required value="Cargando&hellip;"> </span></h6>`
 }
}

customElements.define("campo-apellido-paterno-cargando",
 CampoApellidoPaternoCargando)