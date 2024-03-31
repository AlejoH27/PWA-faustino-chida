export class CampoDocumentoCurp
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="file" class="form-control is-valid" id="validationServer09" placeholder="Documento del Curp" name="curp_doc" required>

    <div id="validacionDocumentoCurp" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }

}



customElements.define("campo-documento-curp",
 CampoDocumentoCurp)