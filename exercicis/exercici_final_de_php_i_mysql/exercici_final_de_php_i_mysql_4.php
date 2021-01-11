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
    <title>Exercici final de PHP i MySQL (Detall de comanda)</title>
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
    //isset per veure si ve de la pàgina anterior (Comandes de client)
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
            <li class="breadcrumb-item"><a href="exercici_final_de_php_i_mysql_3.php?CustomerID=<?php echo $customer["CustomerID"]; ?>" class="text-dark"><?php
                                                                                                                                                            echo $customer["ContactName"];
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
                                                                                                                                                            ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php
                                                                    $sql = "SELECT * FROM orders WHERE OrderID='" . $_GET["OrderID"] . "'";
                                                                    $orders = $conn->query($sql);
                                                                    $order = $orders->fetch_assoc();
                                                                    echo $order["OrderID"]; ?></li>
        </ol>
    </nav>

    <!-- Botó per tornar enrere-->
    <a class="btn btn-dark back-button" href="exercici_final_de_php_i_mysql_3.php?CustomerID=<?php echo $customer["CustomerID"]; ?>">Go back</a>

    <!-- Cos pàgina -->
    <div class="edit-customer container px-3 py-3 pt-md-4 pb-md-4 mt-md-5 mt-md-4 mx-auto">
        <div class="mb-md-4 mb-4">
            <h1>Order nº<?php echo $order["OrderID"]; ?> details</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover" border="1" bordercolor="#dee2e6">
                    <tbody>
                        <!-- Client(dades bàsiques) -->
                        <tr align="center">
                            <th scope="row" colspan="10">Customer Info</th>
                        </tr>
                        <tr align="center">
                            <th scope="row" colspan="5">Contact</th>
                            <th scope="row" colspan="5">Address</th>
                        </tr>
                        <tr align="center">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Fax</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Region</th>
                            <th scope="col" style="min-width: 100px;">Postal code</th>
                            <th scope="col">Country</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM customers WHERE CustomerID='" . $_GET["CustomerID"] . "'";
                        $customers = $conn->query($sql);
                        while ($customer = $customers->fetch_assoc()) {
                        ?>
                            <tr align="center">
                                <td><?php echo $customer["CustomerID"]; ?></td>
                                <td><?php echo $customer["ContactName"]; ?></td>
                                <td><?php echo $customer["CompanyName"]; ?></td>
                                <td><?php echo $customer["Phone"]; ?></td>
                                <td><?php if ($customer["Fax"] == "" || $customer["Fax"] == null) {
                                        echo "-";
                                    } else {
                                        echo $customer["Fax"];
                                    }
                                    ?></td>
                                <td><?php echo $customer["Address"]; ?></td>
                                <td><?php echo $customer["City"]; ?></td>
                                <td><?php if ($customer["Region"] == "" || $customer["Region"] == null) {
                                        echo "-";
                                    } else {
                                        echo $customer["Region"];
                                    }
                                    ?></td>
                                <td><?php echo $customer["PostalCode"]; ?></td>
                                <td><?php echo $customer["Country"]; ?></td>
                            </tr>
                        <?php } ?>
                        <!-- Empleat que ha realitzat la comanda (dades bàsiques) + dades comanda -->
                        <tr align="center">
                            <th scope="row" colspan="10">Ship Info</th>
                        </tr>
                        <tr align="center">
                            <th scope="row" colspan="4">Employee</th>
                            <th scope="row" colspan="6">Shippement</th>
                        </tr>
                        <tr align="center">
                            <th scope="col">ID</th>
                            <th scope="col" colspan="3">Name</th>
                            <th scope="col">Order ID</th>
                            <th scope="col" colspan="2">Date</th>
                            <th scope="col" colspan="2">Ship date</th>
                            <th scope="col" colspan="2">Shipper</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM employees JOIN orders ON employees.EmployeeID=orders.EmployeeID JOIN shippers ON orders.ShipVia=shippers.ShipperID WHERE OrderID='" . $_GET["OrderID"] . "'";
                        $ships = $conn->query($sql);
                        while ($ship = $ships->fetch_assoc()) {
                        ?>
                            <tr align="center">
                                <td><?php echo $ship["EmployeeID"]; ?></td>
                                <td colspan="3"><?php echo $ship["FirstName"] . " " . $ship["LastName"]; ?></td>
                                <td><?php echo $ship["OrderID"]; ?></td>
                                <td colspan="2"><?php echo $ship["OrderDate"]; ?></td>
                                <td colspan="2"><?php if ($ship["ShippedDate"] == "" || $ship["ShippedDate"] == null) {
                                                    echo "Not shipped yet";
                                                } else {
                                                    echo $ship["ShippedDate"];
                                                } ?></td>
                                <td colspan="2"><?php echo $ship["CompanyName"]; ?></td>
                            </tr>
                        <?php } ?>
                        <!-- Linies de comanda: amb nom de producte, preu, quantitat, descompte i total de linia -->
                        <tr align="center">
                            <th scope="row" colspan="10">Order Info</th>
                        </tr>
                        <tr align="center">
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col" colspan="2">Price</th>
                            <th scope="col" colspan="2">Quantity</th>
                            <th scope="col" colspan="2">Discount</th>
                            <th scope="col" colspan="2">Total</th>
                        </tr>
                        <?php
                        $sql = "SELECT *, order_details.UnitPrice AS Price FROM order_details JOIN products ON order_details.ProductID=products.ProductID WHERE OrderID='" . $_GET["OrderID"] . "'";
                        $orders = $conn->query($sql);
                        while ($order = $orders->fetch_assoc()) {
                        ?>
                            <tr align="center">
                                <td colspan="2"><?php echo $order["ProductName"]; ?></td>
                                <td colspan="2"><?php echo round($order["Price"], 2);  ?></td>
                                <td colspan="2"><?php echo $order["Quantity"];  ?></td>
                                <td colspan="2"><?php if ($order["Discount"] == 0) {
                                                    echo "-";
                                                } else {
                                                    echo ($order["Discount"] * 100) . "%";
                                                }
                                                ?></td>
                                <td colspan="2"><?php echo (round($order["Price"], 2) - (round($order["Price"], 2) * $order["Discount"])) * $order["Quantity"];  ?></td>
                            </tr>
                        <?php } ?>
                        <!-- Totals finals: Import brut, IVA(21%) i Total final -->
                        <tr align="center">
                            <th scope="col" colspan="4">&nbsp;</th>
                            <th scope="col" colspan="2">Subtotal</th>
                            <th scope="col" colspan="2">Taxes</th>
                            <th scope="col" colspan="2">Final price</th>
                        </tr>
                        <?php
                        $sql = "SELECT SUM((UnitPrice-(UnitPrice*Discount))*Quantity) AS TotalPrice FROM order_details WHERE OrderID='" . $_GET["OrderID"] . "'";
                        $orders = $conn->query($sql);
                        while ($order = $orders->fetch_assoc()) {
                        ?>
                            <tr align="center">
                                <td colspan="4">&nbsp;</td>
                                <td colspan="2"><?php echo round($order["TotalPrice"], 2); ?></td>
                                <td colspan="2">21%</td>
                                <td colspan="2"><?php echo round(round($order["TotalPrice"], 2) + (round($order["TotalPrice"], 2) * 0.21), 2); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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