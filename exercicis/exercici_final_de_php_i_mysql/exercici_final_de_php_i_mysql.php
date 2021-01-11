<?php
//Iniciem una sessió per passar dades entre pàgines (en aquest cas per mostrar un missatge quan s'elimina un client)
session_start();

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
    <title>Exercici final de PHP i MySQL (Llistat de clients)</title>
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
        <a href="#" class="my-0 mr-md-auto font-weight-bold logo" title="JUANNY SHOP™">JUANNY SHOP™</a>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Home</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Products</a>
            <a class="p-2 text-dark active" href="exercici_final_de _php_i_mysql.php" style="padding: 8px 0px !important; margin: auto 4px">Customers</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">About</a>
            <a class="p-2 text-dark" href="#" style="padding: 8px 0px !important; margin: auto 4px">Contact</a>
        </nav>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Customers</li>
        </ol>
    </nav>

    <?php
    //Missatge si se'ns redirigeix de la pàgina "Editar client"
    if (isset($_POST["CompanyName"])) {
        $sql = 'UPDATE customers SET CompanyName="' . $_POST["CompanyName"] . '",
                                     ContactName="' . $_POST["ContactName"] . '",
                                     ContactTitle="' . $_POST["ContactTitle"] . '",
                                     Phone="' . $_POST["Phone"] . '",
                                     Fax="' . $_POST["Fax"] . '",
                                     Address="' . $_POST["Address"] . '",
                                     City="' . $_POST["City"] . '",
                                     Country="' . $_POST["Country"] . '",
                                     Region="' . $_POST["Region"] . '",
                                     PostalCode="' . $_POST["PostalCode"] . '"
                                 WHERE CustomerID="' . $_POST["CustomerID"] . '"';
        if ($conn->query($sql)) {
            //Si la informació del client ha sigut actualitzada mostra la següent alerta 
    ?>
            <div class="alert alert-success alert-dismissible fade show client-alert" role="alert">
                Successfully updated customer
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else { ?>
            <div class="alert alert-danger alert-dismissible fade show client-alert" role="alert">
                Error updating customer
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
    }
    //Missatge si se'ns redirigeix de la pàgina per borrar el client (per això utilitzem la sessió)
    if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-success alert-dismissible fade show client-alert" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['message']);
        //Tanquem la sessió
    } ?>

    <!-- Cos pàgina -->
    <div class="customers-list container px-3 py-3 pb-md-4 mt-md-4 mt-md-4 mx-auto">
        <div class="mb-md-2 mb-2">
            <h1>Customers</h1>
            <h2>The following table contains information about our customers</h2>
        </div>
        <!-- Select amb els països-->
        <?php
        $sql = "SELECT Country FROM customers GROUP BY Country";
        $countries = $conn->query($sql);
        if ($countries->num_rows > 0) { ?>
            <div class="mb-md-4 mb-4">
                <form method="REQUEST" action="exercici_final_de_php_i_mysql.php">
                    <select id="form_Country" name="Country" class="form-control" required="required" data-error="Please select a country.">
                        <option value="" disabled>Select the country</option>
                        <option value="All">All</option>
                        <?php
                        //Filtrar per columna
                        if (isset($_GET["sortby"])) {
                            $sortby = $_GET["sortby"];
                        } else {
                            $sortby = "CompanyName";
                            //Si no hi ha l'isset possa OrderID com a valor per defecte
                        }

                        if ($conn->connect_error) {
                            echo "An error ocurred";
                        } else {
                            $url = urlencode($country["Country"] . "&sortby=" . $sortby . "&ad=" . (($_GET['ad'] == 'ASC') ? 'DESC' : 'ASC'));
                            while ($country = $countries->fetch_assoc()) { ?>
                                <option <?php if ($country["Country"] == $_GET["Country"]) {
                                            echo "selected";
                                        }

                                        ?> value="<?php echo $country["Country"]; ?>"><?php echo $country["Country"]; ?></option>
                        <?php }
                        } ?>
                    </select>
                    <input type="hidden" name="sortby" value="<?php echo $sortby; ?>">
                    <input type="hidden" name="ad" value="<?php echo ($_GET['ad'] == 'ASC') ? 'DESC' : 'ASC'; ?>">
                </form>
            </div>
        <?php } else { ?>
            <input type="hidden" name="Country" value="0">
        <?php }

        //Codi paginació

        //Fem una variable amb un REQUEST amb els països (L'utilitzarem per fer l'enllaç més endevant)
        if (isset($_GET["Country"])) {
            $Country = $_REQUEST["Country"];
        } else {
            $Country = "All";
            //Si no hi ha un isset de country aquest té un valor "All"
        }

        //Calcular la paginació en funció del país escollit
        if (isset($_GET["Country"])) {
            if ($_GET["Country"] == "All") {
                $pagination = "SELECT count(*) as numrows FROM customers ORDER BY ContactName";
            } else {
                $pagination = "SELECT count(*) as numrows FROM customers WHERE Country='" . $Country . "' ORDER BY ContactName";
            }
        } else {
            $pagination = "SELECT count(*) as numrows FROM customers ORDER BY ContactName";
        }
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

        //Agafem les dades de la BBDD en funció del país
        if (isset($_GET["Country"])) {
            if ($_GET["Country"] == "All") {
                $sql = "SELECT * FROM customers ORDER BY " . $sortby . " " . $_GET["ad"] . " LIMIT " . $startrow . "," . $rowsperpage . ";";
            } else {
                $sql = "SELECT * FROM customers WHERE Country='" . $Country . "' ORDER BY " . $sortby . " " . $_GET["ad"] . "  LIMIT " . $startrow . "," . $rowsperpage . ";";
            }
        } else {
            $sql = "SELECT * FROM customers ORDER BY " . $sortby . " " . $_GET["ad"] . "  LIMIT " . $startrow . "," . $rowsperpage . ";";
        }
        $customers = $conn->query($sql);
        ?>

        <!-- Taula amb els clients -->
        <div class="wrapper1">
            <div class="div1">
            </div>
        </div>
        <div class="table-responsive wrapper2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <?php
                        //Filtrar ASC / DESC
                        $ascdesc = ($_GET["ad"]) ? "DESC" : "ASC"; ?>
                        <th scope="col" style="width: 175px;"><a href="exercici_final_de_php_i_mysql.php?Country=<?php echo $Country; ?>&sortby=CompanyName&ad=<?php echo ($_GET['ad'] == 'DESC') ? 'ASC' : 'DESC'; ?>" class="filter text-decoration-none text-dark">Company Name
                                <?php if ($_GET["ad"] == "ASC" && $_GET['sortby'] == "CompanyName") { ?>
                                    <i class="fas fa-sort-up"></i>
                                <?php } else { ?>
                                    <i class="fas fa-sort-down"></i>
                                <?php } ?>
                            </a></th>
                        <th scope="col" style="width: 175px;"><a href="exercici_final_de_php_i_mysql.php?Country=<?php echo $Country; ?>&sortby=ContactName&ad=<?php echo ($_GET['ad'] == 'DESC') ? 'ASC' : 'DESC'; ?>" class="filter text-decoration-none text-dark">Contact Name
                                <?php if ($_GET["ad"] == "ASC" && $_GET['sortby'] == "ContactName") { ?>
                                    <i class="fas fa-sort-up"></i>
                                <?php } else { ?>
                                    <i class="fas fa-sort-down"></i>
                                <?php } ?>
                            </a></th>
                        <th scope="col" style="width: 175px;"><a href="exercici_final_de_php_i_mysql.php?Country=<?php echo $Country; ?>&sortby=ContactTitle&ad=<?php echo ($_GET['ad'] == 'DESC') ? 'ASC' : 'DESC'; ?>" class="filter text-decoration-none text-dark">Contact Title
                                <?php if ($_GET["ad"] == "ASC" && $_GET['sortby'] == "ContactTitle") { ?>
                                    <i class="fas fa-sort-up"></i>
                                <?php } else { ?>
                                    <i class="fas fa-sort-down"></i>
                                <?php } ?>
                            </a></th>
                        <th scope="col" style="width: 175px;"><a href="exercici_final_de_php_i_mysql.php?Country=<?php echo $Country; ?>&sortby=Address&ad=<?php echo ($_GET['ad'] == 'DESC') ? 'ASC' : 'DESC'; ?>" class="filter text-decoration-none text-dark">Address
                                <?php if ($_GET["ad"] == "ASC" && $_GET['sortby'] == "Address") { ?>
                                    <i class="fas fa-sort-up"></i>
                                <?php } else { ?>
                                    <i class="fas fa-sort-down"></i>
                                <?php } ?>
                            </a></th>
                        <th scope="col" style="width: 175px;"><a href="exercici_final_de_php_i_mysql.php?Country=<?php echo $Country; ?>&sortby=Phone&ad=<?php echo ($_GET['ad'] == 'DESC') ? 'ASC' : 'DESC'; ?>" class="filter text-decoration-none text-dark">Phone
                                <?php if ($_GET["ad"] == "ASC" && $_GET['sortby'] == "Phone") { ?>
                                    <i class="fas fa-sort-up"></i>
                                <?php } else { ?>
                                    <i class="fas fa-sort-down"></i>
                                <?php } ?>
                            </a></th>
                        <th scope="col" style="width: 175px;"><a href="exercici_final_de_php_i_mysql.php?Country=<?php echo $Country; ?>&sortby=Fax&ad=<?php echo ($_GET['ad'] == 'DESC') ? 'ASC' : 'DESC'; ?>" class="filter text-decoration-none text-dark">Phone
                                <?php if ($_GET["ad"] == "ASC" && $_GET['sortby'] == "Fax") { ?>
                                    <i class="fas fa-sort-up"></i>
                                <?php } else { ?>
                                    <i class="fas fa-sort-down"></i>
                                <?php } ?>
                            </a></th>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($customers->num_rows > 0) {
                        while ($customer = $customers->fetch_assoc()) {
                            if ($customer["Region"] === NULL || $customer["Region"] === "") {
                                $customer["Region"] = "";
                            } else {
                                $customer["Region"] = ", " . $customer["Region"];
                            }
                    ?>
                            <tr>
                                <td><?php echo $customer["CompanyName"]; ?></td>
                                <td><?php echo $customer["ContactName"]; ?></td>
                                <td><?php echo $customer["ContactTitle"]; ?></td>
                                <td><?php echo $customer["Address"] . $customer["Region"] . ", " . $customer["City"] . ", " . $customer["Country"] . ", " . $customer["PostalCode"]; ?></td>
                                <td><?php echo $customer["Phone"]; ?></td>
                                <?php if ($customer["Fax"] == "" || $customer["Fax"] == null) { ?>
                                    <td style="text-align: center; padding-right: 50px;">-</td>
                                <?php } else { ?>
                                    <td><?php echo $customer["Fax"]; ?></td>
                                <?php } ?>
                                <td><a href="exercici_final_de_php_i_mysql_2.php?CustomerID=<?php echo $customer["CustomerID"]; ?>" title="Edit customer"><i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="delete_customer.php?CustomerID=<?php echo $customer["CustomerID"]; ?>" class="text-danger delete-customer" title="Delete customer"><i class="fas fa-times"></i></a></td>
                                <td><a href="exercici_final_de_php_i_mysql_3.php?CustomerID=<?php echo $customer["CustomerID"]; ?>" class="text-secondary" title="View customer orders"><i class="fas fa-search"></i></a></td>
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
                    } else {
                        echo "Nothing found";

                        //Amaga els botons "Previous/Next" si no hi han resultats
                        $previousLink = "d-none";
                        $nextLink = "d-none";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Paginació -->
    <div class="mb-5">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php
                //Botó per anar una pàgina enrere 
                echo "<li class='" . $previousLink . "'><a class='page-link' href='?Country=" . $Country . "&sortby=" . $sortby . "&ad=" . $_GET['ad'] . "&page=" . $prev_page . "'>Previous</a></li>"; //Utilitzem la variable que hem fet abans per a l'enllaç

                //Botons per cada nº de pàgina
                for ($pgno = 1; $pgno <= $numpages; $pgno++) {
                    if ($pgno == $currpage) {
                        $pageLink = "page-item active";
                    } else {
                        $pageLink = "page-item";
                    }
                    echo "<li class='" . $pageLink . "'><a class='page-link' href='?Country=" . $Country . "&sortby=" . $sortby . "&ad=" . $_GET['ad'] . "&page=" . $pgno . "'>" . $pgno . "</a></li>";
                }

                //Botó per anar una pàgina endevant
                echo "<li class='" . $nextLink . "'><a class='page-link' href='?Country=" . $Country . "&sortby=" . $sortby . "&ad=" . $_GET['ad'] . "&page=" . $next_page . "'>Next</a></li>";
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

            //Al triar el país al select del llistat de clients és fa un submit
            $("#form_Country").change(function() {
                $(this).closest("form").trigger("submit");
            });

            //Confirm abans no s'elimini el client
            $(".delete-customer").click(function() {
                if (!confirm("Are you sure you want to delete this costumer?")) {
                    return false;
                }
            });

            //Scroll lateral adalt (i abaix) de la taula en mides petites
            $(function() {
                $(".wrapper1").scroll(function() {
                    $(".wrapper2")
                        .scrollLeft($(".wrapper1").scrollLeft());
                });
                $(".wrapper2").scroll(function() {
                    $(".wrapper1")
                        .scrollLeft($(".wrapper2").scrollLeft());
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>