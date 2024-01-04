<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header id="header">
        <a href="inicio.html">
            <img src="imagenes/logo.png" class="logo" >
        </a> 
        <input type="checkbox" id="menu" />
        <label for="menu">
            <img src="imagenes/menu.png" alt="menu desplegable" class="menu-icono">
        </label>
        <ul class="menu">
            <li class="item"><a href="inicio.html"> <b>Inicio</b> </a></li>
            <li class="item"><a href="#contenido"> <b>Quienes somos</b> </a></li>
            <li class="item"><a href="#contenido3"> <b>Nuestro Bosque</b> </a></li>
            <li class="item"><a href="login.html"> <b>Login</b> </a></li>
            <li class="btn"><a href="#contenido5"><b> DONAR AHORA </b></a></li>
        </ul>
    </header>

    <div id="contenido">
        <div class="cajas_texto">
            <h1>Tus donaciones</h1>
            <?php
            session_start(); 

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASS", "");
            define("DB_NAME", "donaciones");

            // 1. Crear conexión con la BBDD
            $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

            // Si hay un error, imprimimos la descripción del error y el número de error generado.
            if (mysqli_connect_errno()) {
                die("La conexión con la BBDD ha fallado: " .
                    mysqli_connect_error() .
                    " (" . mysqli_connect_errno() . ")"
                );
            }           
            $usuario = $_SESSION['username'];
            $query_info = "SELECT SUM(cantidad_donada) AS total_donado FROM donaciones WHERE id_usuario = (SELECT id_usuario FROM usuarios WHERE username = '$usuario')";
            $result_info = mysqli_query($connection, $query_info);
            $usuario_info = mysqli_fetch_assoc($result_info);
    
            if ($usuario_info && $usuario_info['total_donado'] !== null) {
                $total_donado = $usuario_info['total_donado'];
    
                echo "<p class='texto'>Has donado un total de $total_donado euros. ¡Gracias por tu apoyo!</p>";
            } else {
                echo "<p class='texto'>¡Bienvenido a tu panel de donaciones! Aún no has realizado donaciones. ¡Únete y contribuye a nuestra causa!</p>";
            }
            ?>
        </div>

        <div>
            <h2><a href="donar.html">QUIERO DONAR</a></h2>

        </div>
    </div>


    <a href=" "></a>
    
    <div><ul><li class="bye"><a href="cerrar_sesion.php"><b> Cerrar Sesión </b></a></li></ul></div>    
    
    
    
</body>
</html>