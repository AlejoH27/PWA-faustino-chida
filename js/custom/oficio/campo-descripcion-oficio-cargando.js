export class CampoDescripcionOficioCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<div class="mb-3">
    <label class="form-label">Descripción:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="descripcion_oficio" required value="Cargando&hellip;">
    </div>
</div>
     `
 }

}

customElements.define(
 "campo-descripcion-oficio-cargando",
 CampoDescripcionOficioCargando)