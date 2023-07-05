<?php

  class Database{

    public static $e = "connected";
    public static $database;
    private static $host = "127.0.0.1";
    private static $db = "ima_db"; //eluosmg_ima
    private static $username = "root"; //eluosmg_ima
    private static $password = ""; //Madagascar@2023


    public static function _DB(){
      try {
        self::$database = new PDO('mysql:host='.self::$host.';dbname='.self::$db.';charset=utf8mb4', self::$username, self::$password);
        self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $e = self::$e;
      } catch (PDOException $e) {
        $message = $e->getMessage();
        $pos = strpos($message, "php_network_getaddresses");
        if ($pos != "") {
          echo $message;
        } else {
          self::$e = $message;
        }
      }
      return self::$database;
    }

    public function message() {
      return self::$e;
    }

  }

?>
