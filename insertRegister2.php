<!-- insertRegister2 -->
<?php

include ('connect.php');

try {

  $id=$_POST['id'];
  $mod=$_POST['modelo'];
  $marc=$_POST['marca'];

  $sql = "INSERT INTO car (id, modelo, marca) VALUES ('".$id."','".$mod."','".$marc."')";
  $conn->exec($sql);
  
  
}   catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  $conn = null;
?>