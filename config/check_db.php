<?php
  include 'db.php';
  include 'functions.php';
  $database = new Database();
  $db = $database->_DB();
  toJson("status", $database->message());
?>