<?php
use srv\dao\AccesoBd;
use srv\modelo\Usuario;
use \srv\modelo\CosServ;

function empleadoAgregaCosto(
  $costo, $id_servicio, $serv_oficios_id_oficios, $verif
) {
    try {

        $con = AccesoBd::getCon();
        $con->beginTransaction();

        $stmt = $con->prepare(
            "INSERT INTO COS_SERV
            (COSTO, SERV_ID_SERV, SERV_COS_OFICIOS_ID_OFICIO, US_OF_ID_AB)
            VALUES
            (:servCosto, :servIdServ, :servCosOfi, :servUsOfIdAb)"
        );

        $stmt->execute([
            ":servCosto" => $costo,
            ":servIdServ" => $id_servicio,
            ":servCosOfi" => $serv_oficios_id_oficios,
            ":servUsOfIdAb" => $verif
        ]);

        $con->commit();
    } catch (PDOException $e) {
        // Captura la excepción y muestra un mensaje de error
        echo "Error al insertar en COS_SERV: " . $e->getMessage();
        $con->rollBack(); // Revierte la transacción si ocurre un error
    }
}
