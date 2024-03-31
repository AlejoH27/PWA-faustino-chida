export class CampoOficioServicioCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<div class="mb-3">
    <label class="form-label">Oficio correspondiente:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="serv_oficios_id_oficios" required value="Cargando&hellip;" readonly>
    </div>
</div>
     `
 }

}

customElements.define(
 "campo-oficio-servicio-cargando",
 CampoOficioServicioCargando)