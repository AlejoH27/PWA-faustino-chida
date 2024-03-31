import "../../lib/js/custom/indicador-cargando.js"

export class CampoPrecio
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<p>
     <label>
      Precio
      <output name="precio">
       <indicador-cargando>
       </indicador-cargando>
      </output>
     </label>
    </p>`
 }

}

customElements.define(
 "campo-precio", CampoPrecio)