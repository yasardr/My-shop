<?php
    require_once('../Services/data_connection.php');

    class CrudCustomer {
        public function __construct(){}

        public function getUser($user, $pwd){
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

            //$pass = password_hash($pwd,PASSWORD_DEFAULT);
            $query = "SELECT * FROM customer WHERE username = '".$user."' and password = '".$pwd."'";
			
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