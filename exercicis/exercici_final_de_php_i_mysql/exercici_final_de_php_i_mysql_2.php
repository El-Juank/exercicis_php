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
    <title>Exercici final de PHP i MySQL (Editar client)</title>
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

    //Faig la crida amunt del breadcrumb per poder agafar el nom del client per a aquest
    $sql = "SELECT * FROM customers WHERE CustomerID='" . $_GET["CustomerID"] . "'";
    $customers = $conn->query($sql);
    $customer = $customers->fetch_assoc();
    ?>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="exercici_final_de_php_i_mysql.php" class="text-dark">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $customer["ContactName"]; ?></li>
        </ol>
    </nav>

    <!-- Botó per tornar enrere-->
    <a class="btn btn-dark back-button" href="exercici_final_de_php_i_mysql.php">Go back</a>

    <!-- Cos pàgina -->
    <div class="edit-customer container px-3 py-3 pt-md-4 pb-md-4 mt-md-5 mt-md-4 mx-auto">
        <div class="mb-md-4 mb-4">
            <h1>Edit the customer</h1>
            <h2>Use the following form to modify the costumer information</h2>
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                            <div class="container">
                                <form method="POST" action="exercici_final_de_php_i_mysql.php">
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group"> <label for="form_CompanyName">Company Name *</label> <input id="form_CompanyName" type="text" name="CompanyName" class="form-control" placeholder="Please enter the company name *" required="required" data-error="Company name is required." value="<?php echo $customer["CompanyName"]; ?>"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_ContactName">Contact Name *</label> <input id="form_ContactName" type="text" name="ContactName" class="form-control" placeholder="Please enter a contact name *" required="required" data-error="Contact name is required." value="<?php echo $customer["ContactName"]; ?>"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_ContactTitle">Contact Title *</label> <input id="form_ContactTitle" type="text" name="ContactTitle" class="form-control" placeholder="Please enter the contact title *" required="required" data-error="Contact title is required" value="<?php echo $customer["ContactTitle"]; ?>"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_Phone">Phone *</label> <input id="form_Phone" type="text" name="Phone" class="form-control" placeholder="Please enter a phone number *" required="required" data-error="Phone name is required." value="<?php echo $customer["Phone"]; ?>"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_Fax">Fax</label> <input id="form_Fax" type="text" name="Fax" class="form-control" placeholder="Enter a fax number title" value="<?php echo $customer["Fax"]; ?>"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group"> <label for="form_Address">Address *</label> <input id="form_Address" type="text" name="Address" class="form-control" placeholder="Please enter an address *" required="required" data-error="Address is required." value="<?php echo $customer["Address"]; ?>"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_City">City *</label> <input id="form_City" type="text" name="City" class="form-control" placeholder="Please enter a city *" required="required" data-error="City is required." value="<?php echo $customer["City"]; ?>"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_Country">Country *</label>
                                                    <?php
                                                    $sql = "SELECT Country FROM customers GROUP BY Country";
                                                    $countries = $conn->query($sql);
                                                    if ($countries->num_rows > 0) { ?>
                                                        <select id="form_Country" name="Country" class="form-control" required="required" data-error="Please select a country.">
                                                            <option value="" disabled>Select the Country</option>
                                                            <?php if ($conn->connect_error) {
                                                                echo "An error ocurred";
                                                            } else {
                                                                while ($country = $countries->fetch_assoc()) { ?>
                                                                    <option <?php if ($country["Country"] == $customer["Country"]) {
                                                                                echo "selected";
                                                                            } ?> value="<?php echo $country["Country"]; ?>"><?php echo $country["Country"]; ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    <?php } else { ?>
                                                        <input type="hidden" name="Country" value="0">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_Region">Region</label> <input id="form_Region" type="text" name="Region" class="form-control" placeholder="Enter the region" value="<?php echo $customer["Region"]; ?>"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label for="form_PostalCode">Postal Code *</label> <input id="form_PostalCode" type="text" name="PostalCode" class="form-control" placeholder="Please enter the postal code *" required="required" data-error="Postal Code is required" value="<?php echo $customer["PostalCode"]; ?>"> </div>
                                            </div>
                                            <div class="col-md-12"> <input type="hidden" name="CustomerID" value="<?php echo $customer["CustomerID"]; ?>"> </div>
                                            <div class="col-md-12"> <input type="submit" class="btn btn-dark btn-send pt-2 btn-block " value="Update customer"> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-5">
                    <a class="btn btn-dark" href="exercici_final_de_php_i_mysql.php">Go back</a>
                </div>
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