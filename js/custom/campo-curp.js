export class CampoCurp
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
    <input type="text" class="form-control is-valid" id="validationServer14" placeholder="Curp" name="curp" required>
    
    <div id="validacionCurp" class="valid-feedback">
      Bien hecho!
    </div>
    `
 }
   
}



customElements.define("campo-curp",
 CampoCurp)