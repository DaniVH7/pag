<!DOCTYPE html>
<html>
    <head>
        <title> Insertar registros - PHP con MYSQL </title>
</head>
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "pizzas";
            #
            $tipo = htmlspecialchars($_POST["txtTipo"]);
            $tama = htmlspecialchars($_POST["txtTama"]);
            $masa = htmlspecialchars($_POST["txtMasa"]);
            $queso = htmlspecialchars($_POST["txtQueso"]);
            $ingre = htmlspecialchars($_POST["areaIngre2"]);
            $precio = (int)$_POST["txtPrecio"];
            #
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name );
            #
            if (mysqli_connect_errno())
            {
            #
                printf("ERROR: %u- %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            #
            mysqli_set_charset($conectar, "utf8");
            $insertar = "INSERT INTO pedidos (Tipo, Tamano, Masa, Queso, Ingredientes, Precio)
            VALUES ('$tipo', '$tama', '$masa', '$queso', '$ingre', '$precio' )"; 

            #
            if ($resultado = mysqli_query($conectar, $insertar))
            {
                printf("Registro almacenado en la BD");
            }
            else 
            {
                printf("ERROR - Al almacenar en la BD");
            }
            #
            mysqli_close($conectar);
        ?>
    </body>
</html>

