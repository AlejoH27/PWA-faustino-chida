<?php

use srv\dao\AccesoBd;
use srv\modelo\Servicio1;

function empleadoBuscaServicio(int $idServ)
{
    try {
        $con = AccesoBd::getCon();

        $stmt = $con->prepare(
            "SELECT
    s.ID_SERVICIO AS id_servicio,
    s.TIPO_SERVICIO AS tipo_servicio,
    s.DESCRIPCION_DE_SERVICIO AS descripcion_de_servicio,
    o.TIPO_OFICIO AS serv_oficios_id_oficios,
    cs.COSTO AS costo
FROM
    SERV s
INNER JOIN
    OFICIOSv2 o ON s.SERV_OFICIOS_ID_OFICIOS = o.OFICIO_ID
LEFT JOIN
    COS_SERV cs ON s.ID_SERVICIO = cs.SERV_ID_SERV
WHERE
    s.ID_SERVICIO = :idServ"
        );

     

        $stmt->execute([
            ":idServ" => $idServ
        ]);

        $stmt->setFetchMode(
            PDO::FETCH_CLASS,
            Servicio1::class
        );

        $servicio = $stmt->fetch();



        if ($servicio === false) {
            return false;
        } else {
            // Comenté la línea siguiente para quitar el manejo de roles
            // $usuario->roles = usuRolConsulta($idOfi);
            return $servicio;
        }
    } catch (Exception $e) {
        // Manejar el error (puedes imprimir o registrar el mensaje de error)
        echo "Error: " . $e->getMessage();
        return false;
    }
}