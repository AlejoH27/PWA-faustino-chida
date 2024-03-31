export class
 IndicaCamposObligatorios
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */ `
   <p>* Obligatorio</p>`
 }

}

customElements.define(
 "indica-campos-obligatorios",
 IndicaCamposObligatorios)