export class CampoIdOcultoServicio
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<input type="hidden"
      name="id_servicio">`
 }

}

customElements.define(
 "campo-id-oculto-servicio", CampoIdOcultoServicio)