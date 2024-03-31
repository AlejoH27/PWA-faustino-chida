export class CampoCostoServicio
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Costo del servicio (Pesos MXM)" name="costo" required>
    <div class="valid-feedback">
        Looks good!
    </div>
    `
 }
}

customElements.define("campo-costo-servicio",
 CampoCostoServicio)