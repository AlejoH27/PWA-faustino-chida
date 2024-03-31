import {
 plantillaNoEsNumero
} from "./plantilla/plantillaNoEsNumero.js"

/**
 * @template { {value:string} } E
 * @param {E} elementoHtml
 * @param {any} valor
 */
export function muestraPrecio(
 elementoHtml, valor) {
 if (typeof valor === "number"
  && !isNaN(valor)) {
  elementoHtml.value =
  "$" + valor.toFixed(2)
 } else {
  throw new Error(
   plantillaNoEsNumero(valor))
 }
}