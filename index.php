<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Tiendita</title>
</head>
<body>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>