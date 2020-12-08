<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="El Juank" />
    <title>Gelats Costa</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!--Links propis-->
    <link rel="stylesheet" href="css/exercicigelateria.css" />
</head>

<body>
    <!--Header-->
    <nav id="topNav" class="navbar fixed-to navbar-expand-lg sticky">
        <a class="navbar-brand mx-auto" href="/">
            <img class="" src="https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/gelats_costa_logo.png" alt="logo/brand" />
        </a>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="">Inici</a></li>
                <li class="nav-item"><a class="nav-link" href="">Gelats</a></li>
                <li class="nav-item"><a class="nav-link" href="">Fes el teu gelat</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="">Nosaltres</a></li>
                <li class="nav-item"><a class="nav-link" href="">Contacte</a></li>
                <li class="nav-item"><a class="nav-link" href="">Serveis</a></li>
            </ul>
        </div>
    </nav>
    <!--Fi del Header-->
    <div class="container">
        <form method="POST" action="exercici_gelateria_2_php.php">
            <?php
            if (isset($_POST['tipus'])) {
                $tipus = $_POST['tipus'];
                $sabor = $_POST['sabor'];
                $img;
                switch ($tipus) {
                    case 'cucurutxo':
                        if ($sabor == 'maduixa') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxomaduixa.jpg";
                        } else if ($sabor == 'llimona') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxollimona.jpg";
                        } else if ($sabor == 'xocolata') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxoxocolata.jpg";
                        } else {
                            //Valor por defecto
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxomaduixa.jpg";
                        }
                        break;
                    case 'tarrina':
                        if ($sabor == 'maduixa') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/tarrinamaduixa.jpg";
                        } else if ($sabor == 'llimona') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/tarrinallimona.jpg";
                        } else if ($sabor == 'xocolata') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/tarrinaxocolata.jpg";
                        } else {
                            //Valor por defecto
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/tarrinamaduixa.jpg";
                        }
                        break;
                    case 'batut':
                        if ($sabor == 'maduixa') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/batutmaduixa.jpg";
                        } else if ($sabor == 'llimona') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/batutllimona.jpg";
                        } else if ($sabor == 'xocolata') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/batutxocolata.jpg";
                        } else {
                            //Valor por defecto
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/batutmaduixa.jpg";
                        }
                        break;
                    default:
                        //El valor por defecto es el cucurucho y puede cambiar en función de si se ha elegido algun sabor
                        if ($sabor == 'maduixa') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxomaduixa.jpg";
                        } else if ($sabor == 'llimona') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxollimona.jpg";
                        } else if ($sabor == 'xocolata') {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxoxocolata.jpg";
                        } else {
                            $img = "https://raw.githubusercontent.com/El-Juank/exercicis/master/img/gelats/cucurutxomaduixa.jpg";
                        }
                        break;
                }
            }
            ?>

            <h1>Fes el teu gelat!</h1>
            <div class="row">
                <div class="col-6">
                    <h2>Tipus</h2>
                    <select name="tipus" id="tipus">
                        <option>Tria el tipus</option>
                        <option value="cucurutxo">Cucurutxo</option>
                        <option value="tarrina">Tarrina</option>
                        <option value="batut">Batut</option>
                    </select>
                </div>
                <div class="col-6">
                    <h2>Sabor</h2>
                    <select name="sabor" id="sabor">
                        <option>Tria el gust</option>
                        <option value="maduixa">Maduixa</option>
                        <option value="llimona">Llimona</option>
                        <option value="xocolata">Xocolata</option>
                    </select>
                </div>
            </div>
            <div id="resultat">
                <img src="<?php echo $img; ?>">
            </div>
            <div class="container boto">
                <div id="botoreserva" class="d-flex justify-content-center">
                    <input type="submit" value="FES LA TEVA COMANDA" id="botoreservar" class="btn">
                </div>
            </div>
        </form>
    </div>
    <!--- Footer --->
    <footer>
        <div class="footer jumbotron jumbotron-fluid p-4 mt-5 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 cizgi linia">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title display-4" style="font-size: 30px">
                                    Adreça
                                </h5>
                                <p class="d-inline lead">
                                    Carrer Migdia, 40<br> 17002 Girona
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 cizgi linia">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title display-4" style="font-size: 30px">
                                    Contacte
                                </h5>
                                <a class="d-block lead" style="margin-left: -20px" href="#"><i class="fa fa-phone mr-2"></i>+90 (000) 000 0 000</a>
                                <a class="d-block lead" href="#"><i class="fa fa-envelope mr-2"></i>info@gelatscosta.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title display-4" style="font-size: 30px">
                                    Xarxes Socials
                                </h5>

                                <a class="" href="#"><i class="fab fa-facebook fa-fw fa-2x"></i></a>

                                <a class="" href="#"><i class="fab fa-twitter-square fa-fw fa-2x"></i></a>

                                <a class="" href="#"><i class="fab fa-instagram fa-fw fa-2x"></i></a>

                                <a class="" href="#"><i class="fab fa-linkedin fa-fw fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Fi del Footer -->
</body>

</html>