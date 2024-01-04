<?php
session_start();

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "donaciones");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
    die("La conexión con la BBDD ha fallado: " . mysqli_connect_error());
}

if (isset($_POST['cantidad_donada'])) {
    $cantidad_donada = $_POST['cantidad_donada'];
    $usuario = $_SESSION['username'];

    // Actualizar la tabla de donaciones
    $query = "INSERT INTO donaciones (usuario, cantidad_donada, arboles_plantados) ";
    $query .= "VALUES ('$usuario', $cantidad_donada, $cantidad_donada)";
    mysqli_query($connection, $query);

    // Actualizar la cantidad total donada por el usuario
    $query_update = "UPDATE usuarios SET total_donado = total_donado + $cantidad_donada WHERE username = '$usuario'";
    mysqli_query($connection, $query_update);
}

mysqli_close($connection);
header("Location: dashboard.html");
exit();
?>
