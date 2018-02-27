<?php
include "connection.php";
include "auth.php";
include "allerta.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM firefighters ORDER BY available DESC, name "; // Pesco i dati della tabella e li ordino in base alla disponibilità
$result = $conn->query($sql);

?> 
  <head>
<style>
 
 
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

  </head>
  <body class="text-center"><br /><br />
   <img alt="Firefighter" src="./images/logo.jpg" width="150" class="img-resposive"><br /><br />
   <div >
<table style="width:80%">
  <tr>
    <th>Name</th>
    <th>Availability</th>
    <th>Driver</th>
    <th>Call</th>
    <th>Text</th>
   <?php 
   while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
       echo "<tr>
          <td>";
    if ($row['teamleader'] == 1) {echo "<img src='./images/redHelmet.png' width='20px'>   ";} else{echo "<img src='./images/blackHelmet.png' width='20px'>   ";}
      echo "".$row["name"]."</td><td><a onclick='activeAdmin(\"".$row["name"]."\",".$row['available'].");'>"; 
     if ($row['disponibile'] == 1) {echo "<i class='fa fa-check' style='color:green'></i>";} else{echo "<i class='fa fa-times'  style='color:red'></i>";};
       echo  "</a></td>
       <td>"; 
    if ($row['driver'] == 1) {echo "<img src='./images/wheel.png' width='20px'>";} else{echo "";};
    echo "</td>
		  <td><a href='tel:" . $row['phone'] . "'><i class='fa fa-phone'></i></a></td><td>";
      
    if ($row['available'] == 1) {echo "  <a href='https://api.whatsapp.com/send?phone=" . $row['phone'] . "&text=ALLERT%20IN%20CORSO.%20Get%20in%20touch%20with%20your%20team%20leader'><i class='fa fa-whatsapp' style='color:green'></i>";} else{echo "";};   
      
     echo "</td></tr>";
   }
    ?>
    </table> 
    </div>
   
     <script>
   function activeAdmin(username, dispo){
    dispo = +!dispo;
    $.ajax({
     url:"ajax_aggiornadispo.php",
     method: "POST",
     data: {username: username, dispo:dispo},
     success: function (data) {
      alert("You changed the availability of " + username + " in the event of fire.");
      location.reload();
     }
    });
   }; 
   </script>
   
  </body>