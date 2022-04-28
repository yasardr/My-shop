<?php

    class Connection {
        private static $connection = null;
        /*$db_host = "localhost";
        $db_name = "my_shop";
        $db_user = "root";
        $db_password = "";*/
        public function __construct(){}

		public static function connect(){
            //self::$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
            self::$connection = new mysqli("localhost", "root", "", "my_shop");
			return self::$connection;
		}
    }

?>