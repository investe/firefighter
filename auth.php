<?php
// Initialize the session
session_start();

//Controllo se l' utente è admin
if ($_SESSION['admin'] == false) {
header('Location: lista.php');
}

if(isset($_SESSION['access'])){
 // If session variable is not set it will redirect to login page

?>

<!DOCTYPE html>
<html lang="it">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link href="./images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
 
  <title>Fire Fighter alert</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>

<style>
 a, a:hover {
  color: #009A28;
 }
 
 
</style>

<div class="page-header" style="background-color:#9a0007; color:#f2f2f2">
 <p>Hi, <?php echo $_SESSION['name']; ?>, you are connected to the database.  <a href="logout.php">Logout</a></p>
</div>
<?php
}else{
 header('Location: index.php');		
}
?>