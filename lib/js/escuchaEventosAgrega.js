/**
 * @param {HTMLFormElement} forma
 * @param {EventListener} agrega
 */
export function
 escuchaEventosAgrega(forma,
  agrega) {
 forma.addEventListener("submit",
  agrega)
}