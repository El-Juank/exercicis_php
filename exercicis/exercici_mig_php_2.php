<?php
if (isset($_REQUEST["submit"])) {
    $nom = $_REQUEST["nom"];
    $cognom = $_REQUEST["cognom"];
    $address = $_REQUEST["address"];
    $telf = $_REQUEST["telf"];
    $email = $_REQUEST["email"];
    $edat = $_REQUEST["edat"];
    $esport = $_REQUEST["esport"];
    $esportNom = array("Atletisme", "Bàsquet", "Ciclisme", "Futbol", "Handbol", "Natació", "Piragüisme", "Rem", "Rugby", "Tenis");

    $categoriaEdat = array("Benjamí", "Aleví", "Infantil", "Cadet", "Juvenil", "Sènior");

    if (!file_exists("img/")) {
        mkdir("img");
    }
    $fotoNom = "img/" . $_FILES["foto"]["name"];
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotoNom)) {
        //echo "Imatge pujada exitosament!";
    } else {
        //echo "Error!";
        $fotoNom = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
    }
} else {
    //Si s'intenta carregar directament, sense pasar per la Plana 1, redirigeix a la Plana 1.
    header("Location: exercici_mig_php.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici mig PHP 2, renoi, cada vegada són més difícils! Si us plau Miquel posa'm bona nota" />
    <title>Exercici mig PHP 2</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Estils-->
    <style type="text/css">
        body {
            overflow-x: hidden;
            /* Deshabilitem l'scroll horizontal */
            background-color: #d4d4dc;
        }

        .profile-container {
            min-height: 100vh;
            /* Centrem el contingut verticalment */
        }

        .user-card {
            overflow: hidden;
        }

        .card {
            border-radius: 5px;
            border: none;
            margin-bottom: 30px;
            /* Ombra */
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        }

        .m-r-0 {
            margin-right: 0px;
        }

        .m-l-0 {
            margin-left: 0px;
        }

        .user-card .user-profile {
            border-radius: 5px 0 0 0;
        }

        .user-profile {
            padding: 20px 0;
            background-color: #007bff;
        }

        .card-block {
            padding: 1.25rem .25rem;
        }

        .m-b-25 {
            margin-bottom: 25px;
        }

        .profile-pic {
            width: 75px;
            height: 75px;
            border-radius: 50%;
        }

        h6 {
            font-size: 14px;
        }

        .card .card-block p {
            line-height: 25px;
        }

        .b-b-default {
            border-bottom: 1px solid #f8f8f9;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .card .card-block p {
            line-height: 25px;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .requested-text {
            color: #919aa3 !important;
        }

        .b-b-default {
            border-bottom: 1px solid #f8f8f9;
        }

        .f-w-600 {
            font-weight: 600;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        /* Media queries */
        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="row h-100 justify-content-center align-items-center profile-container">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-3 user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="<?php echo $fotoNom ?>" class="profile-pic" alt=""></div>
                                <h6 class="f-w-600"><?php echo $nom . " " . $cognom  ?></h6>
                                <p><?php if ($edat <= 10) {
                                        echo $categoriaEdat[0];
                                    } else if ($edat >= 11 && $edat <= 12) {
                                        echo $categoriaEdat[1];
                                    } else if ($edat >= 13 && $edat <= 14) {
                                        echo $categoriaEdat[2];
                                    } else if ($edat >= 15 && $edat <= 16) {
                                        echo $categoriaEdat[3];
                                    } else if ($edat >= 17 && $edat <= 18) {
                                        echo $categoriaEdat[4];
                                    } else if ($edat >= 19) {
                                        echo $categoriaEdat[5];
                                    }
                                    echo " (" . $edat . ")"; ?></p>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informació</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Adreça</p>
                                        <h6 class="requested-text f-w-400"><?php echo $address ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Telèfon</p>
                                        <h6 class="requested-text f-w-400"><?php echo $telf ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Correu electrònic</p>
                                        <h6 class="requested-text f-w-400"><?php echo $email ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Disciplina esportiva</p>
                                        <h6 class="requested-text f-w-400"><?php echo $esportNom[$esport - 1] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>