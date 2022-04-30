<?php

    class Connection {
        private static $connection = null;
        
        public function __construct(){}

		public static function connect(){
            //self::$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
            self::$connection = new mysqli("localhost", "root", "", "my_shop");
			return self::$connection;
		}
    }

?>