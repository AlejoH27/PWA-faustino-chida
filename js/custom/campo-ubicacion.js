export class CampoUbicacion
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer11" placeholder="Ubicacion" name="ubicacion" required>
    
    <div id="validacionUbicacion" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-ubicacion",
 CampoUbicacion)