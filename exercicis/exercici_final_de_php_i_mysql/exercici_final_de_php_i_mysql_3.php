<?php
$server = "localhost:8889";
$username = "root";
$password = 'root';
$databasename = "shop_db_test"; //Canviar el nom de la bbdd per el nom corresponent

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
    <meta name="description" content="Exercici final de PHP i MySQL, si us plau Miquel posa'm bona nota" />
    <title>Exercici final de PHP i MySQL (Comandes de client)</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!--Estils-->
    <link rel="stylesheet" href="estils.css">
</head>

<body>
    <!-- Header  -->
    <div class="header d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <a href="exercici_de_php_i_bbdd.php" class="my-0 mr-md-auto font-weight-bold logo" title="JUANNY SHOP™">JUANNY SHOP™</a>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Home</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Products</a>
            <a class="p-2 text-dark active" href="exercici_final_de _php_i_mysql.php" style="padding: 8px 0px !important; margin: auto 4px">Customers</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">About</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Contact</a>
        </nav>
    </div>

    <?php
    //isset per veure si ve de la pàgina principal
    if (!isset($_GET["CustomerID"])) {
        header('Location: exercici_final_de_php_i_mysql.php'); //Si no hi ha cap CustomerID et redirigeix a la pàgina principal utilitzant el mètode header()
    }

    //Faig la crida damunt del breadcrumb per poder agafar el nom del client per a aquest
    $sql = "SELECT * FROM customers WHERE CustomerID='" . $_GET["CustomerID"] . "'";
    $customers = $conn->query($sql);
    $customer = $customers->fetch_assoc();
    ?>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="exercici_final_de_php_i_mysql.php" class="text-dark">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $customer["ContactName"];
                                                                    //Funció per veure si el nom del client acaba amb "s"
                                                                    function endFunc($str, $lastString)
                                                                    {
                                                                        $count = strlen($lastString);
                                                                        if ($count == 0) {
                                                                            return true;
                                                                        }
                                                                        return (substr($str, -$count) === $lastString);
                                                                    }
                                                                    if (endFunc($customer["ContactName"], "s"))
                                                                        //Si acaba amb "s" es posa ' al final del nom per fer el possessiu
                                                                        echo "' orders";
                                                                    else
                                                                        //Si no acaba amb "s" s'afeigeix 's
                                                                        echo "'s orders";
                                                                    ?></li>
        </ol>
    </nav>

    <!-- Botó per tornar enrere-->
    <a class="btn btn-dark back-button" href="exercici_final_de_php_i_mysql.php">Go back</a>

    <!-- Cos pàgina -->
    <div class="edit-customer container px-3 py-3 pt-md-4 pb-md-4 mt-md-5 mt-md-4 mx-auto">
        <div class="mb-md-2 mb-2">
            <h1><?php echo $customer["ContactName"];
                if (endFunc($customer["ContactName"], "s"))
                    echo "' orders";
                else
                    echo "'s orders";
                ?></h1>
            <?php

            //Codi paginació

            //Calcular la paginació en funció del id del client escollit
            $pagination = "SELECT count(*) as numrows FROM orders WHERE CustomerID='" . $_GET["CustomerID"] . "'";

            //Calculem el número de pàgines (o rows) que hi ha
            $c = $conn->query($pagination);
            if ($c) {
                if ($t = $c->fetch_assoc()) {
                    $numrows = $t['numrows'];
                }
            } else {
                $numrows = 0;
            }

            //nº de productes per pàgina, pàgina actual, nº de pàgines, etc...
            $rowsperpage = 9;
            $currpage = isset($_REQUEST['page']) && $_REQUEST['page'] != 0 ? $_REQUEST['page'] : 1;
            $prev_page = $currpage - 1;
            $next_page = $currpage + 1;
            $numpages = ceil($numrows / $rowsperpage);
            $startrow = ($currpage - 1) * $rowsperpage;
            if ($startrow > $numrows) {
                $startrow = $numrows - $rowsperpage;
            }
            if ($startrow < 0) {
                $startrow = 0;
            }

            $sql = "SELECT * FROM orders WHERE CustomerID='" . $_GET["CustomerID"] . "'";
            $orders = $conn->query($sql);
            $orderNumber = $orders->num_rows;
            ?>
            <h2>List of orders made by the customer (<?php echo $orderNumber;
                                                        if ($orderNumber > 1 || $orderNumber == 0) {
                                                            //Si les comandes són majors que una o no n'hi ha cap posa-ho en plural
                                                            echo " Orders";
                                                        } else {
                                                            echo " Order";
                                                        } ?>)</h2>

            <!-- Llistat de comandes -->
            <?php if ($orders->num_rows > 0) { ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <?php
                                //Filtrar ASC / DESC
                                $ascdesc = ($_GET["ad"]) ? "ASC" : "DESC"; ?>
                                <th scope="col"><a href="exercici_final_de_php_i_mysql_3.php?CustomerID=<?php echo $_GET["CustomerID"]; ?>&sortby=OrderID&ad=<?php echo ($_GET['ad'] == 'ASC') ? 'DESC' : 'ASC'; ?>" class="filter text-decoration-none text-dark">Order ID
                                        <?php if ($_GET["ad"] == "ASC" && $_GET['sortby'] == "OrderID") { ?>
                                            <i class="fas fa-sort-up"></i>
                                        <?php } else { ?>
                                            <i class="fas fa-sort-down"></i>
                                        <?php } ?>
                                    </a></th>
                                <th scope="col"><a href="exercici_final_de_php_i_mysql_3.php?CustomerID=<?php echo $_GET["CustomerID"]; ?>&sortby=OrderDate&ad=<?php echo ($_GET['ad'] == 'ASC') ? 'DESC' : 'ASC'; ?>" class="filter text-decoration-none text-dark">Order Date
                                        <?php if ($_GET["ad"] == "ASC" && $_GET["sortby"] == "OrderDate") { ?>
                                            <i class="fas fa-sort-up"></i>
                                        <?php } else { ?>
                                            <i class="fas fa-sort-down"></i>
                                        <?php } ?>
                                    </a></th>
                                <th scope="col"><a href="exercici_final_de_php_i_mysql_3.php?CustomerID=<?php echo $_GET["CustomerID"]; ?>&sortby=ShippedDate&ad=<?php echo ($_GET['ad'] == 'ASC') ? 'DESC' : 'ASC'; ?>" class="filter text-decoration-none text-dark">Ship Date
                                        <?php if ($_GET["ad"] == "ASC" && $_GET["sortby"] == "ShippedDate") { ?>
                                            <i class="fas fa-sort-up"></i>
                                        <?php } else { ?>
                                            <i class="fas fa-sort-down"></i>
                                        <?php } ?>
                                    </a></th>
                                <th scope="col">Ship Name</th>
                                <th scope="col">&nbsp;</th>
                                <?php

                                //Filtrar per columna
                                if (isset($_GET["sortby"])) {
                                    $sortby = $_GET["sortby"];
                                } else {
                                    $sortby = "OrderID";
                                    //Si no hi ha l'isset possa OrderID com a valor per defecte
                                }
                                $sql = "SELECT * FROM orders WHERE CustomerID='" . $_GET["CustomerID"] . "' ORDER BY " . $sortby . " " . $_GET["ad"] . " LIMIT " . $startrow . "," . $rowsperpage . ";";
                                $orders = $conn->query($sql);
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($order = $orders->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $order["OrderID"]; ?></td>
                                    <td><?php echo $order["OrderDate"]; ?></td>
                                    <td><?php if ($order["ShippedDate"] == "" || $order["ShippedDate"] == null) {
                                            echo "Not shipped yet";
                                        } else {
                                            echo $order["ShippedDate"];
                                        }
                                        ?></td>
                                    <td><?php echo $order["ShipName"]; ?></td>
                                    <td><a href="exercici_final_de_php_i_mysql_4.php?CustomerID=<?php echo $customer["CustomerID"]; ?>&OrderID=<?php echo $order["OrderID"]; ?>" class="text-secondary" title="View order details"><i class="fas fa-search"></i></a></td>
                                </tr>
                            <?php }
                            //Si estem a la pàgina 1 el botó "Previous" es deshabilita
                            if ($currpage == 1) {
                                $previousLink = "page-item disabled";
                            } else {
                                $previousLink = "page-item";
                            }

                            //Si estem a l'última pàgina el botó "Next" es deshabilita
                            if ($currpage == $numpages) {
                                $nextLink = "page-item disabled";
                            } else {
                                $nextLink = "page-item";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
                //Si no troba res (o el client no ha fet cap comanda) mostra el seguent missatge
            ?>
                <p class="mt-5">This customer has not placed an order yet.</p>
            <?php
                //Amaga els botons "Previous/Next" si no hi han resultats
                $previousLink = "d-none";
                $nextLink = "d-none";
            }
            ?>
        </div>
    </div>

    <!-- Paginació -->
    <div class="mb-5">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php
                //Botó per anar una pàgina enrere
                echo "<li class='" . $previousLink . "'><a class='page-link' href='?CustomerID=" . $_GET["CustomerID"] . "&sortby=" . $sortby . "&ad=" . $_GET['ad'] . "&page=" . $prev_page . "'>Previous</a></li>";

                //Botons per cada nº de pàgina
                for ($pgno = 1; $pgno <= $numpages; $pgno++) {
                    if ($pgno == $currpage) {
                        $pageLink = "page-item active";
                    } else {
                        $pageLink = "page-item";
                    }
                    echo "<li class='" . $pageLink . "'><a class='page-link' href='?CustomerID=" . $_GET["CustomerID"] . "&sortby=" . $sortby . "&ad=" . $_GET['ad'] . "&page=" . $pgno . "'>" . $pgno . "</a></li>";
                }

                //Botó per anar una pàgina endevant
                echo "<li class='" . $nextLink . "'><a class='page-link' href='?CustomerID=" . $_GET["CustomerID"] . "&sortby=" . $sortby . "&ad=" . $_GET['ad'] . "&page=" . $next_page . "'>Next</a></li>";
                ?>
            </ul>
        </nav>
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
                            <a href="mailto:info@juannyshop.com" title="Get in touch!"> info@juannyshop.com</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 footer-social">
                        <h3>Follow us</h3>
                        <p>
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
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

    <!--Scripts-->
    <script language="javascript">
        $(document).ready(function() {
            //Alert per als enllaços del header (que sinó després s'em us queixeu)
            $(".header a").click(function() {
                alert("This function is not available now.");
                return false;
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>