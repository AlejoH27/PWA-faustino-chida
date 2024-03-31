export class BotonMandarSolicitud
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<button class="btn btn-success">Mandar solicitud</button>`
 }

}

customElements.define(
 "boton-mandar-solicitud", BotonMandarSolicitud)