<!DOCTYPE html>
<html>
    <head>
        <a href="pag.inicial.html">Inicio</a>
        <title> Buscar registros - PHP con MYSQL </title>
        <style>
            table{margin: auto; width: 900px;border-collapse: collapse;}
            table,tr,th,td{border: 1px solid white; background-color: rgb(0, 119, 255);}
            td{width: 125px;color: black} th {color: white}
        </style>
<body style="background-color: black;"></body>
    </head>
    <body>
        <?php
        $bd_host = "127.0.0.1";
        $bd_user = "root";
        $bd_pass = "";
        $bd_name = "pizzas";
        $buscar = htmlspecialchars($_POST["txtQueso"]);
        $conectar = mysqli_connect($bd_host,$bd_user,$bd_pass,$bd_name,3306);
        if (mysqli_connect_errno())
        {
            printf("ERROR: %u-%s", mysqli_connect_errno(), mysqli_connect_error());
            exit();
        }
        # mysqli_set_charset - Establece el conjunto de caracteres predeterminado del cliente
        mysqli_set_charset ($conectar,"utf8");
        $consultar = "SELECT * FROM pedidos WHERE QUESO LIKE '%$buscar%' ";
        # mysqli_query -Realiza una consulta a la base de datos
        if ($resultado = mysqli_query($conectar,$consultar))
        {
            printf("<table><tr><th>C&oacutedigo</th> <th>Tipo</th> <th>Tama&ntilde;o</th>
            <th>Masa</th> <th>Queso</th> <th>Extra</th> <th>Precio</th></tr>");
            # mysqli_fetch_row - Obtener una lista de resultados como un array enumerado
            while ($fila = mysqli_fetch_row($resultado))
            {
                printf("<tr><td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>
                <td>%s</td> <td>$%d</td> </tr>", $fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
            }
            printf("</table>");
            #mysqli_free_result -Libera a la memoria asociada a un resultado
            mysqli_free_result($resultado);        
        }
        # mysqli close - Cierra una conexion previamente abierta a una base de datos
        mysqli_close($conectar);
        ?>   
    </body>
    
</html>