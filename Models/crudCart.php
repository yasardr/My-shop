<?php
    require_once('Services/data_connection.php');

    class CrudCart {
        public function __construct(){}

        public function addCart($user, $product){
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

            $query = "SELECT * FROM product WHERE id = '".$product."'";
			
			if($result = $connection->query($query)){
                $product = $result->fetch_object();
            } else {
                $product = null;
            }

            if (!isset($product)) exit();

            $query = "SELECT id, total FROM cart WHERE id_customer = '".$user->id."' AND status=1";
			
			if($result = $connection->query($query)){
                $cart = $result->fetch_object();
            } else {
                $cart = null;
            }
            $result->close();

            if (!isset($cart)) {
                $query = "INSERT INTO cart VALUES(0,".$user->id.",NOW(),".$product->price.",1)";
                if(!$connection->query($query)){
                    exit();
                }
                $query = "SELECT id FROM cart WHERE id_customer = '".$user->id."' AND status=1";
			
                if($result = $connection->query($query)){
                    $cart = $result->fetch_object();
                } else {
                    $cart = null;
                }
                $result->close();
            } else {
                $total = $cart->total + $product->price;
                $query = "UPDATE cart SET total = ".$total." WHERE id =".$cart->id."";
                if(!$connection->query($query)){
                    exit();
                }
            }

            if (isset($cart)) {
                $query = "SELECT id, amount FROM detail_cart WHERE id_cart = ".$cart->id." AND id_product =".$product->id."";
                if($result = $connection->query($query)){
                    $detail = $result->fetch_object();
                } else {
                    $detail = null;
                }

                if (isset($detail)) {
                    $amount = $detail->amount + 1;
                    $query = "UPDATE detail_cart SET amount = ".$amount." WHERE id =".$detail->id."";
                    if(!$connection->query($query)){
                        exit();
                    }
                } else {
                    $query = "INSERT INTO detail_cart VALUES(0,".$cart->id.",".$product->id.",1)";
                    if(!$connection->query($query)){
                        exit();
                    }
                }

                $stock = $product->stock - 1;
                $query = "UPDATE product SET stock=".$stock." WHERE id =".$product->id."";
                if(!$connection->query($query)){
                    exit();
                }
            }

            unset($query);
        
            $connection->close();

			return $cart;
		}

        public function getCart($user){
            $info = [];
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

            $query = "SELECT * FROM cart WHERE id_customer = '".$user->id."' AND status=1";
			
			if($result = $connection->query($query)){
                $cart = $result->fetch_object();
            } else {
                $cart = null;
            }
            $info["cart"] = $cart;
            $result->close();

            if (isset($cart)) {
                $query = "SELECT * FROM detail_cart WHERE id_cart = '".$cart->id."'";
			
                if($result = $connection->query($query)){
                    $cont = 0;
                    $details = null;
                    while($obj = $result->fetch_object()){
                        $details[$cont] = $obj;
                        $cont++;
                    }
                }
                $info["details"] = $details;
                $result->close();
            }

            if (isset($details)) {
                $query = "SELECT * FROM product WHERE status=1";

                if($result = $connection->query($query)){
                    $cont = 0;
                    while($obj = $result->fetch_object()){
                        $products[$cont] = $obj;
                        $cont++;
                    }
                } else {
                    $products = null;
                }
                $info["products"] = $products;
                $result->close();
            }

            unset($query);
        
            $connection->close();

			return $info;
		}

        public function removeCart($user, $product, $cart){
            $obj = new Connection;
            $connection = $obj->connect();
            if($connection->connect_errno){
                printf("Falló la conexión: %s\n", $connection->connect_error);
                exit();
            }

            $query = "SELECT * FROM product WHERE id = '".$product."'";
			
			if($result = $connection->query($query)){
                $product = $result->fetch_object();
            } else {
                $product = null;
            }

            if (!isset($product)) exit();

            $query = "SELECT id, total FROM cart WHERE id = '".$cart."'";
			
			if($result = $connection->query($query)){
                $cart = $result->fetch_object();
            } else {
                $cart = null;
            }
            $result->close();

            if (isset($cart)) {
                $query = "SELECT id, amount FROM detail_cart WHERE id_cart = ".$cart->id." AND id_product =".$product->id."";
                if($result = $connection->query($query)){
                    $detail = $result->fetch_object();
                } else {
                    $detail = null;
                }
                $result->close();

                if (isset($detail)) {
                    $total = $cart->total - ($product->price * $detail->amount);
                    $query = "UPDATE cart SET total = ".$total." WHERE id =".$cart->id."";
                    if(!$connection->query($query)){
                        exit();
                    }

                    $stock = $product->stock + $detail->amount;
                    $query = "UPDATE product SET stock=".$stock." WHERE id =".$product->id."";
                    if(!$connection->query($query)){
                        exit();
                    }

                    $query = "DELETE FROM detail_cart WHERE id =".$detail->id."";
                    if(!$connection->query($query)){
                        exit();
                    }
                }
            }

            unset($query);
        
            $connection->close();

			return $cart;
		}
    }
?>