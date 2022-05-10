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

        public function createCustomers(){
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

            $query = "SELECT count(id) AS total FROM customer";
			
			if($result = $connection->query($query)){
                $obj = $result->fetch_object();
            } else {
                $obj = null;
            }
            $result->close();

            if ($obj->total > 299) {
                return $obj;
            }

            $listName = ["josé", "pedro", "raúl", "maría", "luisa", "adriana", "angela", "alan", "luis", "zaira", "liliana", "montserrat", "lilia", "berenice", "karen", "ana"];
            $listLastname = ["pérez", "rodriguez", "hernández", "martínez", "garcía", "marín", "sánchez", "smith", "rivera", "alderson", "torres", "valdes", "ruiz", "abasolo", "altamirano", "bernal", "arenas", "flores", "quintero", "white"];

            $query = "INSERT INTO customer VALUES";
            for ($i=0; $i < 301; $i++) { 
                $psw = password_hash("test".$i,PASSWORD_DEFAULT);
                $nameRandom = $listName[ mt_rand(0, count($listName) - 1) ];
                $lastnameRandom = $listLastname[ mt_rand(0, count($listLastname) - 1) ];
                $date_msrand = mt_rand(strtotime("2022-01-01"), strtotime("2022-05-01"));
                $date = date("Y-m-d", $date_msrand);
                $birt_msrand = mt_rand(strtotime("1970-01-01"), strtotime("2000-01-01"));
                $birt = date("Y-m-d", $birt_msrand);
                if ($i + 1 == 301) {
                    $query = $query."(0,'cliente".$i."@test.com','cliente".$i."','".$psw."','".$nameRandom."','".$lastnameRandom."','".mt_rand(7220000000, 7229999999)."','".$birt."','".$date."',1);";
                } else {
                    $query = $query."(0,'cliente".$i."@test.com','cliente".$i."','".$psw."','".$nameRandom."','".$lastnameRandom."','".mt_rand(7220000000, 7229999999)."','".$birt."','".$date."',1),";
                }
            }
			
			if(!$connection->query($query)){
                exit();
            }
            
            unset($query);
        
            $connection->close();

			return $obj;
		}
    }
?>