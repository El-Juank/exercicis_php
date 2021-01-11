<?php
$server = "localhost:8889";
$username = "root";
$password = 'root';
$databasename = "shop_db_test";

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
    <meta name="description" content="Exercici conexió a una BBDD" />
    <title>Exercici conexió a una BBDD</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!--Estils-->
    <style type="text/css">
        table.cinereousTable {
            border: 6px solid #948473;
            background-color: #FFE3C6;
            width: 100%;
            text-align: center;
        }

        table.cinereousTable td,
        table.cinereousTable th {
            border: 1px solid #948473;
            padding: 4px 4px;
        }

        table.cinereousTable tbody td {
            font-size: 13px;
        }

        table.cinereousTable thead {
            background: #948473;
            background: -moz-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
            background: -webkit-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
            background: linear-gradient(to bottom, #afa396 0%, #9e9081 66%, #948473 100%);
        }

        table.cinereousTable thead th {
            font-size: 17px;
            font-weight: bold;
            color: #F0F0F0;
            border-left: 2px solid #948473;
        }

        table.cinereousTable thead th:first-child {
            border-left: none;
        }

        table.cinereousTable tfoot {
            font-size: 16px;
            font-weight: bold;
            color: #F0F0F0;
            background: #948473;
            background: -moz-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
            background: -webkit-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
            background: linear-gradient(to bottom, #afa396 0%, #9e9081 66%, #948473 100%);
        }

        table.cinereousTable tfoot td {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Products categories</h1>
        <?php
        if ($conn->connect_error) {
            echo "Error al conectar amb el server";
        } else {
            //echo "Conexió amb èxit";
        }
        $conn->set_charset('utf8');
        $sql = "SELECT * FROM categories";
        $categories = $conn->query($sql);
        if ($categories->num_rows > 0) { ?>
            <table class="cinereousTable">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <?php while ($category = $categories->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $category["CategoryID"]; ?></td>
                        <td><?php echo $category["CategoryName"]; ?></td>
                        <td><?php echo $category["Description"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo "No hi han categories disponibles";
        }

        ?>
    </div>
    <script language="javascript"></script>
</body>

</html>