<?php

class Producte
{
    public $nom;
    public $preu;
    public $quantitat;

    function __construct($nom, $preu, $quantitat = 100)
    {
        $this->nom = $nom;
        $this->preu = $preu;
        $this->quantitat = $quantitat;
    }
}
class Roba extends Producte
{
    public $talla;
}
class Gelat extends Producte
{
    public $gust;
    function __construct($nom, $preu, $gust, $quantitat = 100)
    {
        $this->nom = $nom;
        $this->preu = $preu;
        $this->gust = $gust;
        $this->quantitat = $quantitat;
    }
}

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Introducció objectes" />
    <title>Introducció objectes</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--jQueryUI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!--jQueryUI CSS-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <!--Estils-->
    <style type="text/css"></style>
</head>

<body>
    <div class="container">
        <h1></h1>
        <?php
        $samarreta = new Roba("Samarreta Snoppy", 12, 25);
        $samarreta->talla = "M";
        $pantalons = new Roba("Pantalons Levis", 80, 30);
        $tarrina_maduixa = new Gelat("Tarrina", 3.5, "maduixa");

        echo "Tenim " . $samarreta->quantitat . " unitats del producte " . $samarreta->nom . "<br>";
        echo "Tenim " . $pantalons->quantitat . " unitats del producte " . $pantalons->nom . "<br>";
        ?>
    </div>
    <script language="javascript"></script>
</body>

</html>