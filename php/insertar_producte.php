<?php
$server = "localhost:8889";
$username = "root";
$password = 'root';
$databasename = "shop_db_test";

//Fem la conexió (ambientada a objectes)
$conn = new mysqli($server, $username, $password, $databasename);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Required meta tags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Insertar categoria" />
    <title>Insertar categoria</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!--Estils-->
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            box-sizing: content-box;
        }

        .logo {
            color: #000;
        }

        .logo:hover {
            text-decoration: none;
            color: #000;
        }

        .header nav a {
            text-decoration: none;
        }

        .header nav .active,
        .header nav a:hover {
            text-decoration: none;
            padding-bottom: 4px;
            --border-opacity: 1;
            border-color: #000;
            border-width: 0;
            border-bottom-width: 3px;
            border-style: solid;
        }

        /* Cos */
        .category-insert h1,
        .category-insert h2 {
            text-align: center;
        }

        .category-insert h2 {
            font-size: 1.5rem;
            font-weight: 300;
            padding-bottom: 25px;
        }

        .form-control.is-invalid,
        .was-validated .form-control:invalid {
            padding-right: 12px;
        }

        .d-flex div {
            flex-grow: 1;
        }

        .search-results h5 {
            font-size: 1rem;
        }

        /* Footer */
        .logo-footer {
            margin: 10px 0px;
        }

        .footer-contact a {
            color: #000;
        }

        .footer-contact a:hover {
            text-decoration: none;
        }

        .footer-social a {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 8px;
            color: #000;
            border: 0;
        }

        .footer-social i {
            font-size: 24px;
            vertical-align: middle;
        }

        /* Media Queries */
        @media only screen and (max-width: 767px) {
            .category-insert {
                margin-top: 7rem !important;
            }
        }
    </style>
</head>

<body>
    <!-- Header  -->
    <div class="header d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <a href="exercici_de_php_i_bbdd.php" class="my-0 mr-md-auto font-weight-bold logo" title="JUANNY SHOP™">JUANNY SHOP™</a>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Home</a>
            <a class="p-2 text-dark active" href="#" style="padding: 8px 0px !important; margin: auto 4px">Products</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">About</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Contact</a>
        </nav>
    </div>

    <!-- Cos pàgina -->
    <div class="category-insert container px-3 py-3 pt-md-5 pb-md-4 mt-md-5 mt-md-4 mx-auto">
        <div class="mb-md-4 mb-4">
            <h1>Add a product</h1>
            <h2>Use the following form to add a product to the DB</h2>
            <?php
            if ($conn->connect_error) {
                echo "An error occurred trying to connect to the DB";
            } else {
                if (isset($_POST["productName"])) {
                    if ($_POST["productName"] == "") {
                        echo "Product name not specified. How do you get here???";
                    } else {
                        $sql = "SELECT * FROM products WHERE ProductName='" . $_POST["productName"] . "'";
                        $results = $conn->query($sql);
                        if ($results->num_rows > 0) {
                            echo "The submitted product already exists";
                        } else {
                            $sql = "INSERT INTO products (ProductName,CategoryID,SupplierID,UnitPrice) VALUES ('" . $_POST["productName"] . "','" . $_POST["category"] . "','" . $_POST["supplier"] . "','" . $_POST["productPrice"] . "')";
                            if ($conn->query($sql)) {
                                echo "Product added successfully";
                            } else {
                                echo "An error occurred while adding the category";
                            }
                        }
                    }
                }
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small pt-4 pt-md-5 border-top">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 footer-about">
                        <div class="logo-footer">
                            <a href="exercici_de_php_i_bbdd.php" class="my-0 mr-md-auto font-weight-bold logo" title="JUANNY SHOP™">JUANNY SHOP™</a>
                        </div>
                        <p>
                            We are a young company always looking for new and creative
                            ideas to help you with our products in your everyday work.
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-4 offset-lg-1 footer-contact wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown">
                        <h3>Contact</h3>
                        <p>
                            <i class="fas fa-map-marker-alt"></i> Carrer Migdia, 40, 1, 2, 17002 Girona
                        </p>
                        <p>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+34645209235" title="Call us!">+34 645 209 235</a>
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:hello@domain.com" title="Get in touch!"> info@juannyshop.com</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 footer-social">
                        <h3>Follow us</h3>
                        <p>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 footer-copyright">
                        <p>
                            © Copyright <b>JUANNY SHOP™</b>
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script language="javascript">
        //$(function() {});
    </script>
</body>

</html>