export class CampoNombreOficioCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<div class="mb-3">
    <label class="form-label">Oficio:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="tipo_oficio" required value="Cargando&hellip;">
    </div>
</div>

     `
 }

}

customElements.define(
 "campo-nombre-oficio-cargando",
 CampoNombreOficioCargando)