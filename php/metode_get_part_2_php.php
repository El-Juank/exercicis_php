<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Autocrides PHP" />
    <title>Autocrides PHP</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="bootstrap.min.css" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--jQueryUI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!--jQueryUI CSS-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <!--Chartist-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" />
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!--Estils-->
    <style type="text/css">
        img {
            max-width: 750px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET["producte"])) {
            $producte = $_GET["producte"];
        } else {
            $producte = 0;
        }
        $productes = array("https://www.backgroundsy.com/file/large/blank-white-box.jpg", "https://metro.co.uk/wp-content/uploads/2020/09/ps5-box-9859.jpg?quality=90&strip=all", "https://generacionxbox.com/wp-content/uploads/2020/09/xbox-series-x-box-art.jpg", "https://www.nintendo.com/content/dam/noa/en_US/hardware/switch/nintendo-switch-new-package/gallery/package_redblue.jpg")
        ?>
        <img src="<?php echo $productes[$producte]; ?>">
    </div>
    <script language="javascript"></script>
</body>

</html>