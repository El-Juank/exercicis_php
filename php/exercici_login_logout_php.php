<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

//echo 'Has tencat la sessió';
//No em va el header()
//header('Refresh: 2; URL = exercici_login_php.php');
//header("Location: exercici_login_php.php");
//exit();
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Login amb PHP (amb sessions)" />
    <title>Logout PHP (amb sessions)</title>
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
    <style type="text/css">
        .alert-container {
            min-height: 100vh;
        }

        .alert-container .btn {
            margin-top: 21px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center alert-container">
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">Has tencat la sessió</h4>
                <hr>
                <a class="btn btn-outline-primary btn-block" href="exercici_login_php.php">Torna a l'inici</a>
            </div>
        </div>
    </div>
    <script language="javascript"></script>
</body>

</html>