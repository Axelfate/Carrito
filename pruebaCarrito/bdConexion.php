<?php
$servername = "localhost";
$username = "vanessa";
$password = "12345";
//$dbname   = "dbstore";

// Create connection
/*$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("No se pudo conectar a la bd: " . $conn->connect_error);
}
echo "Se conecto a la bd!";*/

try {
  $conn = new PDO("mysql:host=$servername;dbname=dbstore", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Se conecto a la BD!!";
} catch(PDOException $e) {
  echo "No se pudo conectar a la BD: " . $e->getMessage();
}


?>