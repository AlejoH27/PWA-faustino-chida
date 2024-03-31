/**
 * En HTTP cada URL representa a
 * una entidad con datos.
 * 
 * Cada método HTTP indica la
 * acción que debe realizar un
 * servidor sobre la URL,
 * utilizando los datos que lleva
 * el cuerpo de la petición.
 * 
 * Fuente:
 * https://developer.mozilla.org/es/docs/Web/HTTP/Methods
 * 
 * @enum {string}
 */
export const MetodoHttp = {
 /**
  * Devuelve, sin modificar el
  * estado del servidor, la entidad
  * corresponte a la URL.
  * 
  * La URL puede representar una
  * lista o solo un objeto.
  * 
  * Pueden tomarse en cuenta los
  * parámetros que lleva la URL,
  * como si fueran las condiciones
  * de una cláusula WHERE de SQL.
  */
 GET: "GET",

 /**
  * Devuelve una respuesta como la
  * de GET, pero sin el cuerpo de
  * la respuesta.
  */
 HEAD: "HEAD",

 /**
  * Envía una entidad a una URL.
  * 
  * Si la URL representa una lista
  * que no contiene esa entidad, la
  * agrega.
  * 
  * Los datos de la entidad se
  * indican en el cuerpo de la
  * petición.
  * 
  * A menudo causa un cambio o
  * efectos secundarios en el
  * servidor.
  */
 POST: "POST",

 /**
  * Reemplaza los datos de la URL
  * con el contenido delcuerpo de
  * la petición.
  */
 PUT: "PUT",

 /** Borra los datos de la URL. */
 DELETE: "DELETE",

 /**
  * Establece un tunel
  * bidireccional hacia el
  * servidor.
  */
 CONNECT: "CONNECT",

 /**
  * Devuelve una descripción de las
  * opciones de cominicación de la
  * URL.
  */
 OPTIONS: "OPTIONS",

 /**
  * Realiza una prueba del ciclo de
  * retorno de un mensaje a lo
  * largo de la a la URL.
  */
 TRACE: "TRACE",

 /**
  * Modifica parcialmente la
  * entidad de la URL, modificando
  * solamente los datos enviados en
  * el cuerpo de la URL.
  */
 PATCH: "PATCH"
}