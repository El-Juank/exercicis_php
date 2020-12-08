<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici bàsic PHP, renoi, cada vegada són més difícils! Si us plau Miquel posa'm bona nota" />
    <title>Exercici bàsic PHP</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--Estils-->
    <style type="text/css">
        .vertical-center {
            min-height: 100vh;
        }

        .botiga-dades {
            border: 1px solid #ced4da;
            border-radius: 10px;
            width: 428px;
            /* Ombra */
            -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.25);
            -moz-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.25);
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.25);
        }

        .botiga-dades .col-6 {
            padding: 0px;
        }

        .botiga-dades img {
            height: 160px;
            width: 213px;
        }

        .botiga-foto img {
            border-top-left-radius: 10px;
        }

        .botiga-ubi img {
            border-top-right-radius: 10px;
        }

        .botiga-nom,
        .botiga-info {
            padding: 15px;
        }

        .botiga-nom {
            border-bottom: 1px solid #ced4da;
        }

        .botiga-nom h1 {
            font-size: 24px;
            line-height: 1.34;
        }

        .botiga-info h2 {
            font-weight: bold;
            font-size: 14px;
        }

        .botiga-info h2 span {
            font-weight: normal;
        }

        .ver-fotos {
            background-color: rgba(0, 0, 0, .6);
            color: #fff;
            font-size: 14px;
            line-height: 1.58;
            padding: 5px 10px;
            position: absolute;
            right: 0;
            bottom: 0;
        }

        .requadre-ampliar-ubi {
            background-color: rgba(255, 255, 255, 0.87);
            border-radius: 2px;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
            height: 32px;
            width: 32px;
            display: block;
            outline: 0;
            position: absolute;
            top: 4px;
            text-align: left;
            right: 4px;
        }

        .ampliar-ubi {
            opacity: 0.6;
            margin: 4px 0 0 4px;
        }

        img.ampliar-ubi {
            height: 24px;
            width: 24px;
        }
    </style>
</head>

<body>
    <?php
    //Llistat de variables
    $botigaNom = "Hostaljobs. Selecció personal d'Hostaleria, Consultoria & Formació";
    $botigaImatge = "https://lh3.ggpht.com/p/AF1QipMgEDN4Zm6FkiEhiGwszmym3B4vyfCdUp3llez1=s1024";
    $botigaUbi = "Carrer Migdia, 40, 1, 2, 17002 Girona";
    $botigaImatgeUbi = "https://www.google.es/maps/vt/data=Lvl_Sb6nuooWAYSFVk7p1MAwoUCgfPfm3ozicuaTwtJK1uE18pZl7-AtuOarZyoUKZOq776-bxCgL_SE84VUBR5DG6QuDOLcbO8om9FguRaHEsu1rcGyADcL-bwMG69OsPH4C_cvMtsRWGJnrmZNDNAoUbvesQrw8CZlDo75aN9tAHMnlfIxI_QiPZMBSw";
    
    //Enllaços imatges
    $ImatgeEnllac = "https://www.google.es/maps/uv?pb=!1s0x12bae7c06f7a9e65%3A0x35c5ed8957c50b1a!3m1!7e115!4shttps%3A%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipOhLcnPcM_jlALNKS77w5ZKjOGpbcz-LwZC6BFS%3Dw426-h320-k-no!5shostaljobs%20-%20Buscar%20con%20Google!15sCgIgAQ&imagekey=!1e10!2sAF1QipOhLcnPcM_jlALNKS77w5ZKjOGpbcz-LwZC6BFS&hl=es&sa=X&ved=2ahUKEwil-onJh7TtAhUpSRUIHZN3AbMQoiowDXoECBYQAw";
    //Enllaç a la direcció mitjançant Google Maps
    $UbiEnllac = "https://www.google.es/maps/place/Hostaljobs.+Selecció+personal+d'Hostaleria,+Consultoria+%26+Formació/@41.9752091,2.8204,15z/data=!4m2!3m1!1s0x0:0x35c5ed8957c50b1a?sa=X&ved=2ahUKEwil-onJh7TtAhUpSRUIHZN3AbMQ_BIwDXoECBYQBQ";

    //Horari amb festius i caps de setmana
    $dia = date("d/m");
    $diaSetmana = date("D");

    //Fem una array amb els festius en format "d/m" (https://seu.girona.cat/portal/girona_ca/ajuntament/calendari/)
    $festius = array("01/01", "06/01", "10/04", "13/04", "01/05", "01/06", "24/06", "15/08", "11/09", "12/10", "29/10", "08/12", "25/12", "26/12");

    //Fem la condició de si està tencat per els festius i caps de setmana
    if (in_array($dia, $festius) || $diaSetmana = "Sat" || $diaSetmana = "Sun") {
        $horari = "TANCAT";
        $horariColor = "red";
    }

    //Comprovar quants minuts falten per obrir/tencar
    date_default_timezone_set('Europe/Madrid');
    //Definim la franja horaria

    $horaActual = time();
    //Agafem l'hora actual en format "unix timestamp"

    //Horari obrir/tancar matí
    $horaObrirMati = mktime(9, 0, 0);
    $horaTancarMati = mktime(13, 0, 0);

    //Horari obrir/tancar tarda
    $horaObrirTarda = mktime(16, 0, 0);
    $horaTancarTarda = mktime(20, 0, 0);

    //Variables del temps restants buides
    $tempsRestantMati = "";
    $tempsRestantTarda = "";

    //Mostrar si està tencat pel matí i/o quantes hores falten per tancar
    if ($horaActual > $horaTancarMati && $horaActual < $horaObrirTarda) {
        $horari = "TANCAT";
        $horariColor = "red";
    } else {
        $hoursLeft = gmdate("G", $horaTancarMati - $horaActual);
        //Comprovem les hores que falten
        $minutesLeft = gmdate("i", $horaTancarMati - $horaActual);
        if ($hoursLeft > 1) {
            //Si falta més d'una hora no mostra res
            $tempsRestantMati = "";
        } else {
            //Si falta menys d'una hora mostra quan falta
            $tempsRestantMati = "Tanquem en " . ($minutesLeft+1) . " minuts.";
             //Poso ($minutesLeft+1) per solucionar el problema amb els segons 
        }
    }

    //Mostrar si està obert pel matí i/o quantes hores falten per obrir per la tarda
    if ($horaActual > $horaObrirMati && $horaActual < $horaTancarMati) {
        $horari = "OBERT";
        $horariColor = "green";
    } else {
        $hoursLeft = gmdate("G", $horaObrirTarda - $horaActual);
        //Comprovem les hores que falten
        $minutesLeft = gmdate("i", $horaObrirTarda - $horaActual);
        if ($hoursLeft > 1) {
            //Si falta més d'una hora no mostra res
            $tempsRestantMati = "";
        } else {
            //Si falta menys d'una hora mostra quan falta
            $tempsRestantMati = "Obrim en " . ($minutesLeft+1) . " minuts.";
        }
    }

    //Mostrar si està tencat per la tarda i/o quantes hores falten per tancar
    if ($horaActual > $horaTancarTarda && $horaActual < $horaObrirMati) {
        $horari = "TANCAT";
        $horariColor = "red";
    } else {
        $hoursLeft = gmdate("G", $horaTancarTarda - $horaActual);
        //Comprovem les hores que falten
        $minutesLeft = gmdate("i", $horaTancarTarda - $horaActual);
        if ($hoursLeft > 1) {
            //Si falta més d'una hora no mostra res
            $tempsRestantTarda = "";
        } else {
            //Si falta menys d'una hora mostra quan falta
            $tempsRestantTarda = "Tanquem en " . ($minutesLeft+1) . " minuts.";
        }
    }

    //Mostrar si està obert per la tarda i/o quantes hores falten per obrir pel matí
    if ($horaActual > $horaObrirTarda && $horaActual < $horaTancarTarda) {
        $horari = "OBERT";
        $horariColor = "green";
    } else {
        $hoursLeft = gmdate("G", $horaObrirMati - $horaActual);
        //Comprovem les hores que falten
        $minutesLeft = gmdate("i", $horaObrirMati - $horaActual);
        if ($hoursLeft > 1) {
            //Si falta més d'una hora no mostra res
            $tempsRestantTarda = "";
        } else {
            //Si falta menys d'una hora mostra quan falta
            $tempsRestantTarda = "Obrim en " . ($minutesLeft+1) . " minuts.";
        }
    }

    ?>
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center vertical-center">
            <div>
                <div class="row botiga-dades">
                    <div class="col-6 botiga-foto">
                        <a href="<?php echo $ImatgeEnllac; ?>" title="Veure més fotos"><img src="<?php echo $botigaImatge; ?>"></a>
                        <!-- Span amb el requadre de "Ver fotos" -->
                        <span class="ver-fotos">Ver fotos</span>
                    </div>
                    <div class="col-6 botiga-ubi">
                        <a href="<?php echo $UbiEnllac; ?>" title="Veure l'ubicació a Google Maps"><img src="<?php echo $botigaImatgeUbi; ?>">
                            <!-- Div amb el requadre per "ampliar" l'ubicació -->
                            <div class="requadre-ampliar-ubi"><img class="ampliar-ubi" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAYAAABV7bNHAAAAmElEQVR4Ae3a1xHDIBQAQfpvglLxr+M5572Z18AqC4YkSZIkSdF60DwzQIAAaQK6HWfBAXQVzmwgOKOA4AQQnAaC00BwGghOA8FpIDgNBKeB4ADaw9GEc74JR5Kkr39sy4ufT4e1N7fjAPo/nAaC00BwGghOA8FpIDgNBKeB4DQQnAKC00BwdoPTwfnlDd2AAAGSJEmSJGkDhfC3AD4fHSUAAAAASUVORK5CYII="></div>
                        </a>
                    </div>
                    <div class="col-12 botiga-nom">
                        <h1><?php echo $botigaNom; ?></h1>
                    </div>
                    <div class="col-12 botiga-info">
                        <h2>Direcció: <span><?php echo $botigaUbi; ?></span></h2>
                        <h2>Horari: <span style="color:<?php echo $horariColor; ?>;"><?php echo $horari; ?></span><span><?php echo " " . $tempsRestantMati . $tempsRestantTarda; ?></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript"></script>
</body>

</html>