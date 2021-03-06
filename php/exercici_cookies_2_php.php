<?php
if (isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + (60 * 60 * 24 * 30));
    $lang = $_GET['lang'];
} else {
    if (isset($_COOKIE["lang"])) {
        $lang = $_COOKIE["lang"];
    } else {
        $lang = "ca";
    }
}
if (isset($_GET['size'])) {
    setcookie('size', $_GET['size'], time() + (60 * 60 * 24 * 30));
    $size = $_GET['size'];
} else {
    if (isset($_COOKIE["size"])) {
        $size = $_COOKIE["size"];
    } else {
        $size = "m";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici Cookies" />

    <title>Exercici Cookies</title>

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
        .navbar-languages button,
        .navbar-sizes button {
            background: none !important;
            border: none;
            color: #007bff;
            cursor: pointer;
        }

        .navbar-languages button:hover,
        .navbar-sizes button:hover {
            text-decoration: underline;
            color: #069;
        }

        .navbar-sizes form button:first-child {
            font-size: 12px;
        }

        .navbar-sizes form button:last-child {
            font-size: 20px;
        }

        .selected {
            text-decoration: underline;
            color: #069 !important;
        }

        /* Sizes */
        .small-text {
            font-size: 12% !important;
        }

        .medium-text {
            font-size: 16% !important;
        }

        .large-text {
            font-size: 18% !important;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <div class="navbar-products">
                <?php if ($lang == "es") { ?>
                    <a href="#">Turrones</a>
                    <a href="#">Polvorones</a>
                    <a href="#">Chocolates</a>
                <?php } ?>
                <?php if ($lang == "ca") { ?>
                    <a href="#">Torrons</a>
                    <a href="#">Polvorons</a>
                    <a href="#">Xocolates</a>
                <?php } ?>
                <?php if ($lang == "en") { ?>
                    <a href="#">Nougats</a>
                    <a href="#">shortbreads</a>
                    <a href="#">Chocolates</a>
                <?php } ?>
            </div>
            <div class="navbar-languages">
                <form action='exercici_cookies_2_php.php' method='GET'>
                    <button type='submit' name='lang' value='es' class="<?php if ($lang == "es") {
                                                                            echo "selected";
                                                                        } ?>">ES</button>
                    <button type='submit' name='lang' value='ca' class="<?php if ($lang == "ca") {
                                                                            echo "selected";
                                                                        } ?>">CA</button>
                    <button type='submit' name='lang' value='en' class="<?php if ($lang == "en") {
                                                                            echo "selected";
                                                                        } ?>">EN</button>
                </form>
            </div>
            <div class="navbar-sizes">
                <form action='exercici_cookies_2_php.php' method='GET'>
                    <button type='submit' name='size' value='s' class="<?php if ($size == "s") {
                                                                            echo "selected";
                                                                        } ?>">A</button>
                    <button type='submit' name='size' value='m' class="<?php if ($size == "m") {
                                                                            echo "selected";
                                                                        } ?>">A</button>
                    <button type='submit' name='size' value='l' class="<?php if ($size == "l") {
                                                                            echo "selected";
                                                                        } ?>">A</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="<?php if ($size == "s") {
                    echo "small-text";
                } else if ($size == "m") {
                    echo "medium-text";
                } else if ($size == "l") {
                    echo "large-text";
                } ?>">
        <!-- Masthead -->
        <header class="masthead text-white text-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h1 class="mb-5">
                            Build a landing page for your business or project and generate
                            more leads!
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Icons Grid -->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-screen-desktop m-auto text-primary"></i>
                            </div>
                            <h3>Torrons</h3>
                            <p class="lead mb-0">
                                This theme will look great on any device, no matter the size!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-layers m-auto text-primary"></i>
                            </div>
                            <h3>Polvorons</h3>
                            <p class="lead mb-0">
                                Featuring the latest build of the new Bootstrap 4 framework!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-check m-auto text-primary"></i>
                            </div>
                            <h3>Xocolates</h3>
                            <p class="lead mb-0">
                                Ready to use with your own content, or customize the source
                                files!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Image Showcases -->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Fully Responsive Design</h2>
                        <p class="lead mb-0">
                            When you use a theme created by Start Bootstrap, you know that the
                            theme will look great on any device, whether it's a phone, tablet,
                            or desktop the page will behave responsively!
                        </p>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Updated For Bootstrap 4</h2>
                        <p class="lead mb-0">
                            Newly improved, and full of great utility classes, Bootstrap 4 is
                            leading the way in mobile responsive web development! All of the
                            themes on Start Bootstrap are now using Bootstrap 4!
                        </p>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Easy to Use &amp; Customize</h2>
                        <p class="lead mb-0">
                            Landing Page is just HTML and CSS with a splash of SCSS for users
                            who demand some deeper customization options. Out of the box, just
                            add your content and images, and your new landing page will be
                            ready to go!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">What people are saying...</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="" />
                            <h5>Margaret E.</h5>
                            <p class="font-weight-light mb-0">
                                "This is fantastic! Thanks so much guys!"
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="" />
                            <h5>Fred S.</h5>
                            <p class="font-weight-light mb-0">
                                "Bootstrap is amazing. I've been using it to create lots of
                                super nice landing pages."
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="" />
                            <h5>Sarah W.</h5>
                            <p class="font-weight-light mb-0">
                                "Thanks so much for making these free resources available to
                                us!"
                            </p>
                        </div>
                    </div>
                </div>
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
    </div>
</body>

</html>