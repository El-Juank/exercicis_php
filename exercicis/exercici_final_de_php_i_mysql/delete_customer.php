<?php
//Iniciem una sessió per passar dades entre pàgines (en aquest cas per mostrar un missatge quan s'elimina un client)
session_start();

$server = "localhost:8889";
$username = "root";
$password = 'root';
$databasename = "shop_db_test"; //Canviar el nom de la bbdd per el nom corresponent
$conn = new mysqli($server, $username, $password, $databasename);

// Comprovem la conexió
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//isset per veure si ve de la pàgina principal
if (!isset($_GET["CustomerID"])) {
    header('Location: exercici_final_de_php_i_mysql.php'); //Si no hi ha cap CustomerID et redirigeix a la pàgina principal utilitzant el mètode header()
}

$sql = "DELETE FROM customers WHERE CustomerID='" . $_GET["CustomerID"] . "'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: exercici_final_de_php_i_mysql.php'); // Un cop eliminat es redirigeix a la pàgina principal utilitzant el mètode header()
    $_SESSION['message'] = "Successfully deleted customer";
    exit;
} else {
    echo "Error deleting customer";
}
