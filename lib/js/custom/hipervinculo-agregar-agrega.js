/**
 * Hipervínculo para agregar que
 * redirecciona a la página
 * "agrega.html".
 */
export class
 HipervinculoAgregarAgrega
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<a href="agrega.html">
     Agregar</a>`
 }

}

customElements.define(
 "hipervinculo-agregar-agrega",
 HipervinculoAgregarAgrega)