<?php 
  session_start();
include "connection.php";



   error_reporting(E_ALL);
    if(isset($_SESSION['access'])) {
     header('Location: list.php');
    }else{
     if(isset($_POST['name'], $_POST['password'])){

      // Salvo nome e password nelle rispettive variabili
      $name = $_POST['name'];
      $password = md5($_POST['password']);

      // Prepare a select statement
      $sql = "SELECT * FROM firefighters WHERE name = '".$name."' AND password = '".$password."'";

      $result = mysqli_query($connection, $sql);
      
      if(mysqli_num_rows($result) == 1) {
       
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
       $sqladmin = "SELECT * FROM firefighters WHERE name = '".$name."' AND password = '".$password."'";
       
       $resultadmin = mysqli_query($connection, sqladmin);
       
       if($row['caposquadra'] == 1) {
        
               $_SESSION['access'] = true;
       $_SESSION['admin'] = true;
       $_SESSION['name'] = $name;
         
       header('Location: lista_admin.php');
        
       } else {
       
       $_SESSION['access'] = true;
       $_SESSION['admin'] = false;
       $_SESSION['name'] = $name;
         
       header('Location: lista.php');
        
        }
        
      } else {
       
       echo "<br /><div class='text-center'>The submitted data is wrong, get in touch with your <a href='https://api.whatsapp.com/send?phone=391234567'>Teamleader</a> to create a new account</div>";
      } 
     } 
    }
  ?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="./images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">

  <title>Login in the alert system</title>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">


  <style>
   center {
    text-align: center;
   }

   #modulogin {

    margin-top: 60px;
    padding: 30px 0 30px 0;
    width: 90%;
    height: auto;
    background: #fafafa;
    border-radius: 15px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
   }

   input::placeholder {

    color: lightgray;

   }
  </style>

 </head>

 <body>

  <div class="container text-center" id="modulogin">
   <form method="post">

     <img alt="FireFighter" src="./images/logo.jpg" class="img-resposive"><br><br><br>

    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" name="login" class="btn btn-lg btn-success" value="Login">
   </form>
  </div>


 </body>
</html>