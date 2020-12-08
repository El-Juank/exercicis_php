<?php
$arxiu = fopen("data.log", "r");
while (!feof($arxiu)) {
    echo fgets($arxiu) . "<br>";
}
fclose($arxiu);
