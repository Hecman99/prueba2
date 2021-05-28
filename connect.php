<!-- connect.php -->
<?php
$servername = "127.0.0.1:3307";
$username = "adminSD";
$password = "adminSD12345";
$dbname = "testdb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();;
}


?>