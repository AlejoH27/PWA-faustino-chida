/**
 * Hipervínculo para agregar que
 * redirecciona a la página
 * "agregaOficio.html".
 */
export class
 HipervinculoAgregarOficio
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<a href="agregaOficio.html" class="btn btn-primary">
    Nuevo
    </a>`
 }

}

customElements.define(
 "hipervinculo-agregar-oficio",
 HipervinculoAgregarOficio)