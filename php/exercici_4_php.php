<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici 4 PHP" />
    <title>Exercici 4 PHP</title>
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
        table {
            margin-top: 15px;
        }

        table tr td {
            padding: 10px 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Taula</h1>
        <h2>Introdueix qualsevol número per generar la taula</h2>
        <form method="POST" action="exercici_4_php.php">
            <label for="num">Número:</label>
            <input type="text" name="num" id="num">
            <input type="submit" value="Enviar">
        </form>
        <table border="1" class="text-center">
            <?php
            //Le ponemos un numero por defecto a la variable $num cuando aun no tenga contenido
            if (isset($_POST["num"])) {
                $num = $_POST["num"];
            } else {
                $num = 5;
            }

            for ($i = 0; $i < 10; $i++) { ?>
                <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo ($i + 1); ?></td>
                    <td><?php echo ($i + 1) * $num; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <script language="javascript"></script>
</body>

</html>