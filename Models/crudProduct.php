<?php
    require_once('Services/data_connection.php');

    class CrudProduct {
        public function __construct(){}

        public function getProducts(){
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

            $query = "SELECT * FROM product WHERE status = 1";
            $products = [];
			
			if($result = $connection->query($query)){
                $cont = 0;
                while($obj = $result->fetch_object()){
                    $products[$cont] = $obj;
                    $cont++;
                }
            } else {
                $products = null;
            }
            $result->close();
            
            unset($query);
        
            $connection->close();

			return $products;
		}

        public function getProduct($id){
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

            $query = "SELECT * FROM product WHERE id = '".$id."' AND status = 1";
			
			if($result = $connection->query($query)){
                $obj = $result->fetch_object();
            } else {
                $obj = null;
            }
            $result->close();
            
            unset($query);
        
            $connection->close();

			return $obj;
		}
    }
?>