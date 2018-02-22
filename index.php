<?php
include 'connection.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, nome, disponibile, autista, telefono FROM vigili ORDER BY disponibile DESC"; // Pesco i dati della tabella e li ordino in base alla disponibilità
$result = $conn->query($sql);



?> 
<!doctype html>
<html lang="it">
  <head>
<style>
 
 body {
  background-color: dimgray;
 }
 
th, td {
    border: 1px solid grey;
    border-collapse: collapse;
 padding: 5px;
}

 table {
   box-shadow: 2px 2px 25px rgba(0,0,0,0.5);
    border-radius: 15px;
  margin: auto;
 }
 
 
</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Allerta Vigili del Fuoco</title>
  </head>
  <body class="text-center"><br /><br />
   <h1>VVF Darfo</h1><br /><br />
   <div >
<table style="width:80%">
  <caption>Disponibilità in caso di allerta</caption>
  <tr>
    <th>Nome</th>
    <th>Disponibile</th>
    <th>Autista</th>
    <th>Chiama</th>

   <?php 
   while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
       echo "<tr>
          <td>".$row["nome"]."</td><td>"; 
     if ($row['disponibile'] == 1) {echo "<i class='fa fa-check' style='color:green'></i>";} else{echo "<i class='fa fa-times'  style='color:red'></i>";};
       echo  "</td>
       <td>"; 
    if ($row['autista'] == 1) {echo "<i class='fa fa-car'></i>";} else{echo "";};
    echo "</td>
		  <td><a href='tel:" . $row['telefono'] . "'><i class='fa fa-phone'></i></a></td>
        </tr>";
   }
    ?>
    </table> 
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
