export class CampoCue
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `

   <div class="input-group">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend3">@</span>
      </div>
      <input type="email" class="form-control is-valid" id="validationServerUsername" placeholder="Cue" aria-describedby="inputGroupPrepend3" name="cue" required>
    <div id="validacionCue" class="valid-feedback">
     Bien hecho!
    </div>
   </div>
   `
 }
}

customElements.define("campo-cue",
 CampoCue)