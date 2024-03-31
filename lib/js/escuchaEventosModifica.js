/**
 * @param {HTMLFormElement} forma
 * @param {EventListener} modifica
 * @param {HTMLElement} btnElimina
 * @param {EventListener} elimina
 */
export function
 escuchaEventosModifica(forma,
  modifica, btnElimina, elimina) {
 forma.addEventListener(
  "submit", modifica)
 btnElimina.addEventListener(
  "click", elimina)
}