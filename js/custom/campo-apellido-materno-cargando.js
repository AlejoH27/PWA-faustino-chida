export class CampoApellidoMaternoCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<h6 class='mb-0'>Apellido Materno: <span class='text-secondary'> <input name="apellidoM" required value="Cargando&hellip;"> </span></h6>`
 }
}

customElements.define("campo-apellido-materno-cargando",
 CampoApellidoMaternoCargando)