<?php

  class Database{

    public static $e;
    public static $database;
    ///eluosmg_database
    ///eluosmg_admin
    ///Eluos@2022

    public static function _DB(){
      try {
        self::$database = new PDO('mysql:host=127.0.0.1;dbname=ima_db;charset=utf8mb4', 'root', '');
        self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $e = self::$e;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
      return self::$database;
    }/*
    public function mysqli_db() {
      $database = mysqli_connect("127.0.0.1","root","","eluos_database");
      return $database;
    }*/

  }

?>