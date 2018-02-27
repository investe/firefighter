<?php

session_start();

include 'connection.php';

 if(isset($_POST["username"])&& $_POST["dispo"] == 1 )	{  

$sql = "UPDATE firefighter SET available = 1 WHERE name ='".$_POST["username"]."'";
$result = mysqli_query($connection, $sql);

 } else {
  
  $sql = "UPDATE firefighter SET available = 0 WHERE name ='".$_POST["username"]."'";
$result = mysqli_query($connection, $sql);
  
  
 }

?>
