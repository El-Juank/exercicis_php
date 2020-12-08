<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici Cookies" />

    <title>Holas</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <!-- Custom fonts-->
    <link href="css/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- Custom styles -->
    <link href="css/landing-page.min.css" rel="stylesheet" />
    <!--Estils-->
    <style type="text/css">
        .navbar .site-logo {
            width: 150px;
        }

        header.masthead {
            position: relative;
            background-color: #343a40;
            background: url(img/Football-Stadium-background.jpg) no-repeat center center;
            background-size: cover;
        }

        .content-body {
            height: 30vh;
        }

        .content-body h1 {
            margin-top: 90px;
            margin-bottom: 20px;
        }

        .content-body .form-control {
            display: inline;
            width: 50%;
        }

        .content-body .btn-primary {
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a href="#"><img class="site-logo" src="https://lh3.googleusercontent.com/proxy/XXf2uaa0YVaPoorfLk_J2cZ8hD-DL9gIrZZaEoRNKV1gHvBsyesxspt9Cd7bNZnLpqmAcnemj3TRMbyb4ZqCzXZ9HMTPC8Dw8H-ygoUCL2dYsL9NAfNV-C6E5dWvv__3qcS5nqmctg" title="TopStars Football Logo"></a>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">
                        El millor equip de fútbol
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Content body -->
    <section class="content-body text-center">
        <div class="container">
            <form method="GET">
                <h1>T'agrada l'equip? Apunta't!</h1>
                <input type="text" class="form-control" name="nom" placeholder="Escriu el teu nom">
                <input type="submit" class="btn btn-primary mb-2" value="Apunta't">
            </form>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h2 class="mb-4">Ready to get started? Sign up now!</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input type="email" class="form-control form-control-lg" placeholder="Enter your email..." />
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">
                                    Sign up!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">
                        &copy; Your Website 2020. All Rights Reserved.
                    </p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-instagram fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>