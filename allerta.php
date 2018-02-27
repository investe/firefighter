

  <div class="text-center">
   <p>Are you available in the event of fire?</p>
   <button class="btn btn-lg btn-success " onclick="Available()">Available</button>

   <button class="btn btn-lg btn-danger" onclick="notAvailable()">Not available</button>
  </div>


  <script>
   function Available(){
    var username = "<?php echo $_SESSION['name']; ?>";
    var dispo = 1;
    $.ajax({
     url:"ajax_updateavailability.php",
     method: "POST",
     data: {username: username, dispo:dispo},
     success: function (data) {
      alert("Thank you, " + username + ", you're available in the event of fire.");
      location.reload();
     }
    });
   }; 

   function notAvailable(){
    var username = "<?php echo $_SESSION['name']; ?>";
    var dispo = 0;
    $.ajax({
     url:"ajax_updateavailability.php",
     method: "POST",
     data: {username: username, dispo:dispo},
     success: function (data) {
      alert("" + username + ", you're not available in the event of fire.");
      location.reload();
     }
    });
   }; 

  </script>

