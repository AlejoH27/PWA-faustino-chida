export class CampoDescripcionServicioCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<div class="mb-3">
    <label class="form-label">Descripción del servicio:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="descripcion_de_servicio" required value="Cargando&hellip;">
    </div>
</div>
     `
 }

}

customElements.define(
 "campo-descripcion-servicio-cargando",
 CampoDescripcionServicioCargando)