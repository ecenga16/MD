<?php
    define('DB_SERVER', 'localhost');
  // define('DB_USERNAME', 'aldo');
  // define('DB_PASSWORD', 'qwerty123!');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', "");
    define('DB_DATABASE', 'md');
   $conn =  new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
