<?php
    $servername = "localhost";
    $username = "project";
    $password = "propass";
    $db = "project";

  $conn = new mysqli($servername, $username, $password, $db);


  if (!$conn) {
     die("<script>console.log('$conn->connect_error');</script>");
  }else{
  }
  
  session_start();

 
?>