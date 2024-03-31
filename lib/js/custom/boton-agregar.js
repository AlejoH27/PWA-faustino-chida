export class BotonAgregar
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<button class="btn btn-primary" type="submit">Registrarse</button>`
 }

}

customElements.define(
 "boton-agregar", BotonAgregar)