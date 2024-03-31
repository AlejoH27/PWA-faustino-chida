export class BotonGuardar
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<button class="btn btn-success">Guardar</button>`
 }

}

customElements.define(
 "boton-guardar", BotonGuardar)