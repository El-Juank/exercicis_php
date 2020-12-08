<?php
/*
$arxiu = fopen("dades.txt", "w") or die("No s'ha pogut conectar a l'arxiu");
fwrite($arxiu, "Joan\n");
fwrite($arxiu, "Pere\n");
fwrite($arxiu, "Anna\n");
fclose($arxiu);
*/
echo "El archivo ha sido creado satisfactoriamente";
file_put_contents("data.log", "[" . date("d/m/y m:i:s") . "] " . "Visita anónima\n", FILE_APPEND);
