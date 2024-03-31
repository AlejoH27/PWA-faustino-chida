export class CampoMatchCargando
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
    
   `<label for='match' class='form-label'>Borra los esteriscos antes de editar el match *</label>
   <h6 class='mb-0'>Match: <span class='text-secondary'> <input name="match" type="password" required value="Cargando&hellip;"> </span></h6>`
 }

}

customElements.define(
 "campo-match-cargando",
 CampoMatchCargando)