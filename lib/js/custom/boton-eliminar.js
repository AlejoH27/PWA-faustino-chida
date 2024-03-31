export class BotonEliminar
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<button id="btnElimina" type="button" class="btn btn-warning">Eliminar</button>`
 }

}

customElements.define(
 "boton-eliminar", BotonEliminar)