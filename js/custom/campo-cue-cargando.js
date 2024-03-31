export class CampoCueCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<h6 class='mb-0'>Cue: <span class='text-secondary'> <input name="cue" required value="Cargando&hellip;"> </span></h6>`
 }

}

customElements.define(
 "campo-cue-cargando",
 CampoCueCargando)