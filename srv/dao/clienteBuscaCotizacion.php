<?php

use srv\dao\AccesoBd;
use srv\modelo\CosServ;

function clienteBuscaCotizacion(
 int $id
): false|CosServ {
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
    "SELECT
    cs.ID_COS AS id_cos,
    cs.COSTO AS costo,
    cs.SERV_ID_SERV AS serv_id_serv,
    cs.SERV_COS_OFICIOS_ID_OFICIO AS serv_cos_oficios_id_oficio,
    cs.US_OF_ID_AB AS us_of_id_ab,
    s.TIPO_SERVICIO AS tipo_servicio,
    o.TIPO_OFICIO AS tipo_oficio,
    u.USU_NOMBRE AS usu_nombre
FROM COS_SERV cs
JOIN SERV s ON cs.SERV_ID_SERV = s.ID_SERVICIO
JOIN OFICIOSv2 o ON cs.SERV_COS_OFICIOS_ID_OFICIO = o.OFICIO_ID
JOIN US_OFv2 uo ON cs.US_OF_ID_AB = uo.ID_AB
JOIN USUARIO u ON uo.USER_ID_US = u.USU_ID
WHERE cs.ID_COS = :id
ORDER BY cs.ID_COS
"
);

$stmt->execute([
    ":id" => $id
]);
 $stmt->setFetchMode(
  PDO::FETCH_CLASS,
   CosServ::class
 );
 return $stmt->fetch();
}
