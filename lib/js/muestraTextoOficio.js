import {
 plantillaNoEsTexto
} from "./plantilla/plantillaNoEsTexto.js"

/**
 * @template { {value:string} } E
 * @param {E} elementoHtml
 * @param {string} valor
 */
export function muestraTextoOficio(
 elementoHtml, valor) {
 if (typeof valor === "string") {
  elementoHtml.value = valor
 } else {
  throw new Error(
   plantillaNoEsTexto(valor))
 }
}