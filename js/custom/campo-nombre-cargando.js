export class CampoNombreCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<h6 class='mb-0'>Nombre: <span class='text-secondary'> <input name="nombre" required value="Cargando&hellip;"> </span></h6>
     `
 }

}

customElements.define(
 "campo-nombre-cargando",
 CampoNombreCargando)