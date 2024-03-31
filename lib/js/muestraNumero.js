import {
 plantillaNoEsNumero
} from "./plantilla/plantillaNoEsNumero.js"

/**
 * @template { {value:string} } E
 * @param {E} elementoHtml
 * @param {any} valor
 */
export function muestraNumero(
 elementoHtml, valor) {
 if (typeof valor === "number"
  && !isNaN(valor)) {
  elementoHtml.value =
   valor.toString()
 } else {
  throw new Error(
   plantillaNoEsNumero(valor))
 }
}