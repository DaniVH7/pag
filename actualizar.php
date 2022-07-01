<!DOCTYPE html>
<html>
    <head>
        <title> Actualizar registros - PHP con MySQL </title>
    </head>
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "pizzas";
            #
            $codigo = (int)$_POST["txtCodigo"];
            $ingre = htmlspecialchars($_POST["areaIngre2"]);
            #
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);
            #
            if (mysqli_connect_errno())
            {
                #
                printf("ERROR: %u - %s", mysqli_connect_errno, mysqli_connect_error());
                exit();
            }
            #
            mysqli_set_charset($conectar, "utf8");
            $actualizar = "UPDATE pedidos SET INGREDIENTES = '$ingre' WHERE CODIGO = '$codigo'";
            #
            if ($resultado = mysqli_query($conectar, $actualizar))
            {
                #
                if (mysqli_affected_rows($conectar) == 0)
                {
                    printf("El codigo proporcionado no existe");
                }
                else
                {
                    printf("Se ha(n) actualizado %u registro(s)", mysqli_affected_rows($conectar));
                }
            }
            else
            {
                printf("ERROR - Al actualizar en la BD");
            }
            #
            mysqli_close($conectar);
        ?>
    </body>
</html>  