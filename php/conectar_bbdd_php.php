<!DOCTYPE html>
<html lang="en">

<head>
    <!--Required meta tags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Conectar a una BBDD" />
    <title>Conectar a una BBDD</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!--Estils-->
    <style type="text/css"></style>
</head>

<body>
    <div class="container">
        <h1>Conectar a una BBDD</h1>
        <?php
        $server = "localhost:8889";
        $username = "root";
        $password = 'root';
        $databasename = "shop_db_test";

        //Per fer una conexió a un server SQL; en cas de canviar de server (i de llenguatge) nomès s'ha de canviar aquesta línia
        $conn = mysqli_connect($server, $username, $password, $databasename);

        if ($conn->connect_error) {
            echo "Error al conectar amb el server";
        } else {
            //echo "Conexió amb èxit";
        }
        $conn->set_charset('utf8');
        $sql = "SELECT * FROM customers";
 
        //Codi nomès per SQL
        $customers = mysqli_query($conn, $sql);
        if (mysqli_num_rows($customers) > 0) {
            while ($customer = mysqli_fetch_assoc($customers)) {
                //Amb "mysqli_fetch_assoc" agafem el primer registre mitjançant un sistema associatiu 

                echo $customer["ContactName"] . "<br>";
            }
        } else {
            echo "No hi ha dades disponibles";
        }

        ?>
    </div>
    <script language="javascript"></script>
</body>

</html>