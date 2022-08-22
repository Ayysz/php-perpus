<?php 
   
   $conn = new mysqli('localhost','root','','perpus');

   if($conn->connect_errno) {
      echo "Connection Error [Log] : ". $conn->connect_error;
      exit();
   }

 ?>