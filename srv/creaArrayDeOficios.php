<?php

use srv\modelo\Oficio;

/** @return Rol[] */
function creaArrayDeOficios(
 array $oficioIds
): array {
 if (sizeof($oficioIds) === 0) {
  return [];
 } else {
  /** @var Rol[] $roles */
  $oficios = [];
  foreach ($oficioIds as $oficioId) {
   $ofi = new Oficio();
   $ofi->id_oficio = $oficioId;
   $oficios[] = $ofi;
  }
  return $oficios;
 }
}

