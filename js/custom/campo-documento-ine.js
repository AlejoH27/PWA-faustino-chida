export class CampoDocumentoIne
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="file" class="form-control is-valid" id="validationServer08" placeholder="Documento del ine" name="ine_doc" required>

    <div id="validacionDocumentoIne" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }

}



customElements.define("campo-documento-ine",
 CampoDocumentoIne)