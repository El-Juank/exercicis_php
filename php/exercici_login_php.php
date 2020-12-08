<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Login amb PHP (amb sessions)" />
    <title>Login amb PHP (amb sessions)</title>
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
        .login-container {
            min-height: 100vh;
        }

        .panel-body {
            padding: 50px;
            border: 1px solid #ced4da;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center login-container">
            <div class="col-md-4 col-md-offset-4 my-auto">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="exercici_login_2_php.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuari" name="usuari" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contrasenya" name="password" type="password">
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript"></script>
</body>

</html>