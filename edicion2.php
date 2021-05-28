<?php

//edicion2.php

include('dbconect.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':id'  => $_POST['id'],
  ':modelo'  => $_POST['modelo'],
  ':marca'   => $_POST['marca'],
  ':idcar'    => $_POST['idcar']
 );

 $query = "
 UPDATE car
 SET id = :id, 
 modelo = :modelo, 
 marca = :marca
 WHERE idcar = :idcar
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM car
 WHERE idcar = '".$_POST["idcar"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>