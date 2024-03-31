<?php

use srv\modelo\Rol;

/** @return Rol[] */
function creaArrayDeRoles(
 array $rolIds
): array {
 if (sizeof($rolIds) === 0) {
  return [];
 } else {
  /** @var Rol[] $roles */
  $roles = [];
  foreach ($rolIds as $rolId) {
   $rol = new Rol();
   $rol->id = $rolId;
   $roles[] = $rol;
  }
  return $roles;
 }
}
