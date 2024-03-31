import "./indicador-cargando.js"

export class ListaPrincipal
 extends HTMLElement {

 connectedCallback() {
  this.innerHTML = /* HTML */
   `<ul id="lista">
     <li>
      <indicador-cargando>
      </indicador-cargando>
     </li>
    </ul>`
 }

}

customElements.define(
 "lista-principal", ListaPrincipal)