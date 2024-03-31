/**
 * Hipervínculo para cancelar que
 * redirecciona a la página
 * "index.html".
 */
export class
 HipervinculoCancelarGlobal
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<a class="btn btn-danger" type="submit" href="javascript: history.go(-1)">
      Cancelar</a>
      `
 }
}

customElements.define(
 "hipervinculo-cancelar-global",
 HipervinculoCancelarGlobal)