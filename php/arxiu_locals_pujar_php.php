<?php
if (!file_exists("img/")) {
    mkdir("img");
}
$nomArxiu = "img/" . $_FILES["foto"]["name"];
if (move_uploaded_file($_FILES["foto"]["tmp_name"], $nomArxiu)) {
    echo "Mission completed!";
} else {
    echo "Mission Failed!";
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Pujar arxius locals" />

    <title>Pujar arxius locals</title>

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
    <style type="text/css"></style>
</head>

<body></body>

</html>