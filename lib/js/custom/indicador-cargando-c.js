export class IndicadorCargandoC
 extends HTMLElement {
 connectedCallback() {

  this.innerHTML = /* HTML */
   `<progress max="100">
     Cargando&hellip;
    </progress>`
 }

}

customElements.define(
 "indicador-cargando-c",
 IndicadorCargandoC)