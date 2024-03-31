export class CampoComprobanteDomicilio
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="file" class="form-control is-valid" id="validationServer12" placeholder="Comprobante de domicilio" name="comp_dom_doc" required>
    
    <div id="validacionComprobanteDomicilio" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-comprobante-domicilio",
 CampoComprobanteDomicilio)