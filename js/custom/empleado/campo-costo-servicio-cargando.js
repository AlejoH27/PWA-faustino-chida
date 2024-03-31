export class CampoCostoServicioCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<div class="mb-3">
    <label class="form-label">Costo del servicio:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="costo" required value="Cargando&hellip;">
    </div>
</div>
     `
 }

}

customElements.define(
 "campo-costo-servicio-cargando",
 CampoCostoServicioCargando)