<?php

function seRecibioElArchivo(
 string $parametro
): bool {
 return
  isset($_FILES[$parametro]) &&
  $_FILES[$parametro]["size"] > 0;
}
