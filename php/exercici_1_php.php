<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici 1 PHP; missatge per a diferents moments del dia mitjançant condicionals" />
    <title>Exercici PHP</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--jQueryUI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!--jQueryUI CSS-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <!--Chartist-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" />
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!--Estils-->
    <style type="text/css">
        .container {
            background-color: white;
        }

        .container img {
            width: 50%;
        }

        .container h1 {
            color: #333a58;
        }

        #mainContainer {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $hora = date("H");
        ?>
        <section id="mainContainer" class="d-flex justify-content-center align-items-center">
            <?php if ($hora >= 6 && $hora <= 12) { ?>
                <div class="container d-flex flex-column align-items-center justify-content-center">
                    <img src="img/mati.jpg" alt="Imatge matí">
                    <h1>Bon dia!</h1>
                    <p>Aixeca't dormilega</p>
                </div>
            <?php
            } elseif ($hora >= 13 && $hora <= 20) { ?>
                <div class="container d-flex flex-column align-items-center justify-content-center">
                    <img src="img/tarda.jpg" alt="imatge tarda">
                    <h1>Bon tarda!</h1>
                    <p>Aprofita per fer coses</p>
                </div>
            <?php
            } elseif ($hora >= 21 && $hora <= 12) { ?>
                <div class="container d-flex flex-column align-items-center justify-content-center">
                    <h1>Bon nit!</h1>
                    <p>És hora d'anar-se'n a dormir</p>
                    <img src="img/nit.jpg" alt="imatge nit">
                </div>
            <?php } ?>

        </section>

    </div>
    <script language="javascript"></script>
</body>

</html>