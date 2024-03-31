import "../../lib/js/custom/indicador-cargando.js"

export class CampoProducto
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<p>
     <label>
      Producto
      <output name="producto">
       <indicador-cargando>
       </indicador-cargando>
      </output>
     </label>
    </p>`
 }

}

customElements.define(
 "campo-producto", CampoProducto)