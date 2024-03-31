export class CampoIdOculto
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<input type="hidden"
      name="id">`
 }

}

customElements.define(
 "campo-id-oculto", CampoIdOculto)