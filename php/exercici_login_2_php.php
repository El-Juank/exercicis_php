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
        .alert-container {
            min-height: 100vh;
        }

        .alert-container .btn {
            margin-top: 21px;
        }
    </style>
</head>

<body>
    <?php
    $_SESSION["usuari"] = $_POST["usuari"];
    $_SESSION["password"] = $_POST["password"];

    //Simplifiquem els $_SESSION
    $usuari = $_SESSION["usuari"];
    $password = $_SESSION["password"];

    //Fem la comprovació
    if ($usuari == "Joan" && $password == "ABC" || $usuari == "Cris" && $password == "ABC") { ?>

        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="#">Productes</a>
                <a class="p-2 text-dark" href="#">Clients</a>
                <a class="p-2 text-dark" href="#">Comandes</a>
            </nav>
            <a class="btn btn-outline-primary" href="exercici_login_logout_php.php">Logout</a>
        </div>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4"><?php echo "Benvingut/da " . $_SESSION["usuari"] . "!"; ?></h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, deleniti dolorum? Aliquid neque corporis, deserunt quaerat rem quasi. Ratione ad ipsam sequi dolorem iste repudiandae numquam molestiae! Quod, culpa enim?</p>
        </div>

        <div class="container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Free</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 users included</li>
                            <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>20 users included</li>
                            <li>10 GB of storage</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Enterprise</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>30 users included</li>
                            <li>15 GB of storage</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                    </div>
                </div>
            </div>

            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                        <small class="d-block mb-3 text-muted">© 2017-2018</small>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Features</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Cool stuff</a></li>
                            <li><a class="text-muted" href="#">Random feature</a></li>
                            <li><a class="text-muted" href="#">Team feature</a></li>
                            <li><a class="text-muted" href="#">Stuff for developers</a></li>
                            <li><a class="text-muted" href="#">Another one</a></li>
                            <li><a class="text-muted" href="#">Last time</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Resources</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Resource</a></li>
                            <li><a class="text-muted" href="#">Resource name</a></li>
                            <li><a class="text-muted" href="#">Another resource</a></li>
                            <li><a class="text-muted" href="#">Final resource</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>About</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Team</a></li>
                            <li><a class="text-muted" href="#">Locations</a></li>
                            <li><a class="text-muted" href="#">Privacy</a></li>
                            <li><a class="text-muted" href="#">Terms</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Bootstrap core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
        </script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <script>
            Holder.addTheme('thumb', {
                bg: '#55595c',
                fg: '#eceeef',
                text: 'Thumbnail'
            });
        </script>
</body>
<?php  } else { ?>
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center alert-container">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Usuari o contrasenya incorrectes</h4>
                <hr>
                <a class="btn btn-outline-danger btn-block" href="exercici_login_php.php">Torna a l'inici</a>
            </div>
        </div>
    </div>
    <script language="javascript"></script>
<?php } ?>

</html>