<?php
  if (!isset($_COOKIE["cuenta"])) { //si no hay cookie la creas y le das el valor de 1
    $contador =1 ; 
    setcookie("cuenta", $contador);
    echo "<br> Has visitado la página una vez";
} else {
    $contador = ++$_COOKIE['cuenta']; //si ya hay cookie toca sumarle
    setcookie("cuenta", $contador);
    echo "<br> Has visitado la página " . $_COOKIE['cuenta'] . " veces";
  }

