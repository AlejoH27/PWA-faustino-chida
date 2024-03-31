export class CampoCantidad
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<p>
     <label>
      Cantidad *
      <input name="cantidad"
        required type="number"
        min="0" step="0.01">
     </label>
    </p>`
 }

}

customElements.define(
 "campo-cantidad", CampoCantidad)