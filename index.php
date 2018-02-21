<?php
include connection.php;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, nome, disponibile, autista, telefono FROM vigili";
$result = $conn->query($sql);




/*
$vigili = [
    'id' => [],
    'Nome' => [],
    'Disponibile' => [],
    'Autista' => [],
    'Telefono' => []
];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $Nome = $row["Nome"];
        $Disponibile = $row["Disponibile"];
        $Autista = $row["Autista"];
        $Telefono = $row["Telefono"];
        $vigili['id'] = $id;
        $vigili['Nome'] = $Nome;
        $vigili['Disponibile'] = $Disponibile;
        $vigili['Autista'] = $Autista;
        $vigili['Telefono'] = $Telefono;
        echo "id: " . $row["id"]. "<br>";
        echo "id: " . $id . "<br>";
        print_r($vigili);
        echo "<br>";

    }
} else {
    echo "0 results";
}

$conn->close(); */
?> 
<!doctype html>
<html lang="it">
  <head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
 margin: auto;
}
th, td {
    padding: 5px;
}
</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Allerta Vigili del Fuoco!</title>
  </head>
  <body class="text-center"><br /><br />
   <h1>Disponibilità VVF Darfo</h1><br /><br />
   <div >
<table style="width:80%">
  <caption>Vigili del fuoco</caption>
  <tr>
    <th>Nome</th>
    <th>Disponibile</th>
    <th>Autista</th>
    <th>Telefono</th>

  
   <?php 
   while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
       echo "<tr>
          <td>".$row["nome"]."</td>
          <td>".$row["disponibile"]."</td>
          <td>"; 
    if ($row['autista'] == 1) {echo "<i class='fa fa-car'></i>";} else{echo "";};;
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