export class CampoNombreServicioCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<div class="mb-3">
    <label class="form-label">Servicio:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="tipo_servicio" required value="Cargando&hellip;">
    </div>
</div>

     `
 }

}

customElements.define(
 "campo-nombre-servicio-cargando",
 CampoNombreServicioCargando)