export class BotonAgregarProducto
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<button>Agregar</button>`
 }

}

customElements.define(
 "boton-agregar-producto", BotonAgregarProducto)