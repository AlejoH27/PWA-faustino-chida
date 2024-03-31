export class CampoIdOcultoOficio
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<input type="hidden"
      name="id_oficio">`
 }

}

customElements.define(
 "campo-id-oculto-oficio", CampoIdOcultoOficio)