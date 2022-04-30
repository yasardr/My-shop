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

            $query = "SELECT * FROM customer WHERE username = '".$user."' and status =1";
			
			if($result = $connection->query($query)){
                $obj = $result->fetch_object();
            } else {
                $obj = null;
            }
            $result->close();

            if (!password_verify($pwd, $obj->password)) {
                $obj = null;
            }
            
            unset($query);
        
            $connection->close();

			return $obj;
		}

        public function addUser($customer, $address){
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

    $address['street'] = $_POST['street'];
    $address['state'] = $_POST['state'];
    $address['country'] = $_POST['country'];
    $address['zip_code'] = $_POST['zip_code'];
    $address['reference'] = $_POST['reference'];

            $pass = password_hash($customer['password'],PASSWORD_DEFAULT);
            $query = "INSERT INTO customer VALUES(0,'".$customer['email']."','".$customer['username']."','".$pass."','".$customer['name']."','".$customer['lastname']."','".$customer['telephone']."','".$customer['birthday']."',NOW(),1)";
			
			if(!$connection->query($query)){
                exit();
            }

            $query = "SELECT * FROM customer WHERE username = '".$customer['username']."' and status =1";
			
			if($result = $connection->query($query)){
                $obj = $result->fetch_object();
            } else {
                $obj = null;
            }
            $result->close();

            $query = "INSERT INTO address VALUES(0,'".$obj->id."','".$address['street']."','".$address['zip_code']."','".$address['state']."','".$address['country']."','".$address['reference']."',1)";
			
			if(!$connection->query($query)){
                exit();
            }
            
            unset($query);
        
            $connection->close();

			return $obj;
		}
    }
?>