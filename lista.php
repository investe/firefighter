<?php
include "connection.php";
include "auth.php";
include "allerta.php";

$sql = "SELECT * FROM firefighter ORDER BY available DESC"; // Pesco i dati della tabella e li ordino in base alla disponibilità
$result = mysqli_query($connessione, $sql);

?> 
<!doctype html>
<html lang="it">
 <head>
  <style>

   th, td {
    border: 1px solid grey;
    border-collapse: collapse;
    padding: 5px;
   }


   table {
    box-shadow: 0px 3px 15px rgba(0,0,0,0.5);
    border-radius: 5px;
    margin: auto;
   }
   .fa {
    margin: 0 2px 0 2px;
    border: 
   }


  </style>

  <title>Firefigher Alert Systemn</title>
 </head>
 <body class="text-center"><br /><br />
  <img alt="VVF" src="./images/logo.jpg" width="150" class="img-resposive"><br /><br />
  <div >
   <table style="width:80%">
    <tr>
     <th>Name</th>
     <th>Available</th>
     <?php 
     while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
      echo "<tr><td>";
      if ($row['teamleader'] == 1) {echo "<img src='./images/redHelmet.png' width='20px'>   ";} else{echo "<img src='./images/blackHelmet.png' width='20px'>   ";}
      echo "".$row["name"]."</td><td>"; 
      if ($row['available'] == 1) {echo "<i class='fa fa-check' style='color:green'></i>";} else{echo "<i class='fa fa-times'  style='color:red'></i>";};
      echo  "</td></tr>";
     }
     ?>
   </table> 
  </div>


 </body>
</html>