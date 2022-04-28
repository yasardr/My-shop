<?php

        require("data_connection.php");

        // New Connection
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        // Check for errors
        if($connection->connect_errno){
            printf("Falló la conexión: %s\n", $connection->connect_error);
            exit();
        }

        /* cambiar el conjunto de caracteres a utf8 */
        if(!$connection->set_charset("utf8")){
            printf("Error cargando el conjunto de caracteres utf8: %s <br>", $mysqli->error);
            exit();
        }else {
            printf("Conjuntode caracteres actual: %s <br>", $connection->character_set_name());
        }

        $query = "SELECT * FROM product";


        /* Consultas de selección que devuelven un conjunto de resultados */
        if($result = $connection->query($query)){
            printf("La selección devolvió %d filas. <br>", $result->num_rows);

            /* liberar el conjunto de resultados */
            $result->close();
        }

        if($result = $connection->query($query)){
            while($obj = $result->fetch_object()){
                echo $obj->id . '<br>';
                echo $obj->name . '<br>';
                echo $obj->description . '<br>';
                echo $obj->stock . '<br>';
                echo $obj->price . '<br>';
                echo $obj->status . '<br>';
            }
        }
        $result->close();
        unset($obj);
        unset($query);

        $connection->close();

    ?>
<!--
//ejemplo de tabla
<table>
   <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>City</th>
   </tr>
   <?php /*while ($row = $myquery->fetch_assoc()) { ?>
   <tr>
     <td><?php echo $row["firstname"]; ?></td>
     <td><?php echo $row["lastname"]; ?></td>
     <td><?php echo $row["city"];?></td>
   </tr>
   <?php } ?>
</table>

<form action=“pagine_search.php” method=“get”>
	label…
	<input type=“text” name=“input_search”>
	input type=submit…
</form>-->

//pagine_search.php
<?php
//$search = $_GET[“input_search”];

?>

<?php
    require("Services/data_connection.php");
    $obj = new Connection;
    $connection = $obj->connect();
    if($connection->connect_errno){
        printf("Falló la conexión: %s\n", $connection->connect_error);
        exit();
    }
    if(!$connection->set_charset("utf8")){
        printf("Error cargando el conjunto de caracteres utf8: %s <br>", $mysqli->error);
        exit();
    }else {
        printf("Conjunto de caracteres actual: %s <br>", $connection->character_set_name());
    }

    $query = "SELECT * FROM product";


    /* Consultas de selección que devuelven un conjunto de resultados */
    if($result = $connection->query($query)){
        printf("La selección devolvió %d filas. <br>", $result->num_rows);

        /* liberar el conjunto de resultados */
        $result->close();
    }

    if($result = $connection->query($query)){
        while($obj = $result->fetch_object()){
            echo $obj->id . '<br>';
            echo $obj->name . '<br>';
            echo $obj->description . '<br>';
            echo $obj->stock . '<br>';
            echo $obj->price . '<br>';
            echo $obj->status . '<br>';
        }
    }
    $result->close();
    unset($obj);
    unset($query);

    $connection->close();
?>