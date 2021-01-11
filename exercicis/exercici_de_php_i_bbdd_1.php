<?php
$server = "localhost:8889";
$username = "root";
$password = 'root';
$databasename = "shop_db_test"; //Canviar el nom de la bbdd per el nom corresponent

//Fem la conexió
$conn = mysqli_connect($server, $username, $password, $databasename);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Required meta tags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici de PHP i BBDD, si us plau Miquel posa'm bona nota" />
    <title>Exercici de PHP i BBDD</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!--Estils-->
    <style type="text/css">
        body {
            font-family: "Questrial", sans-serif;
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
        .category-search h1,
        .category-search h2 {
            text-align: center;
        }

        .category-search h2 {
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

        .productPrice {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 1.1rem;
            text-align: left;
            margin-top: 16px;
            padding-left: 20px;
        }

        .search-results button {
            margin: 16px;
        }

        /* Footer */
        .logo-footer {
            margin: 10px 0px;
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
            .category-search {
                margin-top: 7rem !important;
            }
        }
    </style>
</head>

<body>
    <!-- Header  -->
    <div class="header d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <a href="#" class="my-0 mr-md-auto font-weight-bold logo" title="JUANNY SHOP™">JUANNY SHOP™</a>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Home</a>
            <a class="p-2 text-dark active" href="#" style="padding: 8px 0px !important; margin: auto 4px">Products</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">About</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Contact</a>
        </nav>
    </div>

    <!-- Cos pàgina -->
    <div class="category-search container px-3 py-3 pt-md-5 pb-md-4 mt-md-5 mt-md-4 mx-auto">
        <div class="mb-md-4 mb-4">
            <h1>Products</h1>
            <h2>Search what you want from our wide range of products</h2>
            <form method="POST" action="exercici_de_php_i_bbdd.php" id="form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Search all products" name="productName">
                    </div>
                    <div class="form-group col-md-4">
                        <select class="browser-default custom-select" name="category">
                            <option value="0">All categories</option>
                            <?php
                            //En cas d'haver un problema al conectar amb la bbdd mostra un missatge
                            if ($conn->connect_error) {
                                echo "FATAL ERROR";
                            }
                            $conn->set_charset('utf8');
                            $sql = "SELECT * FROM categories";
                            $categories = $conn->query($sql);
                            if ($categories->num_rows > 0) {
                                while ($category = $categories->fetch_assoc()) { ?>
                                    <option value="<?php echo $category["CategoryID"]; ?>"><?php echo $category["CategoryName"]; ?></option>
                            <?php }
                            } else {
                                //No facis res; solament es queda l'opció de "All categories"
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-dark btn-block" value="Search" name="submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="search-results row justify-content-center mb-md-3 mb-4">
            <?php
            if (isset($_POST["submit"])) {
                $productName = $_POST["productName"];
                $categoryID = $_POST["category"];

                if ($categoryID == 0) {
                    $sql = "SELECT * FROM products INNER JOIN categories ON products.CategoryID=categories.CategoryID WHERE ProductName LIKE '%" . $productName . "%'";
                } else {
                    $sql = "SELECT * FROM products INNER JOIN categories ON products.CategoryID=categories.CategoryID WHERE products.CategoryID='" . $categoryID . "' AND ProductName LIKE '%" . $productName . "%'";
                }

                $products = $conn->query($sql);
                if ($products->num_rows > 0) {
                    while ($product = $products->fetch_assoc()) { ?>
                        <div class='col-lg-4 d-flex align-items-stretch'>
                            <div class='card mb-4 box-shadow'>
                                <div class='card-header'>
                                    <h4 class='my-0 font-weight-normal'><?php echo $product["ProductName"]; ?></h4>
                                    <h5 class='my-0 font-weight-light'><?php echo $product["CategoryName"]; ?></h5>
                                </div>
                                <p class='productPrice'>$<?php echo round($product["UnitPrice"], 2); ?></p>
                                <button type='button' class='btn btn-lg btn-dark'>Add to cart</button>
                            </div>
                        </div>
            <?php }
                } else {
                    echo "No product were found with the established search criteria";
                }
            } ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small pt-4 pt-md-5 border-top">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 footer-about">
                        <div class="logo-footer">
                            <a href="#" class="my-0 mr-md-auto font-weight-bold logo" title="JUANNY SHOP™">JUANNY SHOP™</a>
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
                        <p><i class="fas fa-phone"></i> +34 645 209 235</p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:hello@domain.com"> info@juannyshop.com</a>
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
    </div>
    <script language="javascript"></script>
</body>

</html>