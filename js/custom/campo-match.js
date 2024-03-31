export class CampoMatch
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `
   <input type="password" class="form-control is-valid" id="validationServer04" placeholder="Match" name="match" required>
   
    <div id="validacionMatch" class="valid-feedback">
      Bien hecho!
    </div>
                      `
 }
}

customElements.define("campo-match",
 CampoMatch)