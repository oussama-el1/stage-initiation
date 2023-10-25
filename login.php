<?php
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   // data base connection here
  $con = new mysqli("localhost","root","","onssa");
  if($con->connect_error) {

    die("Failed to connect : ".$con->connect_error);
  } else {
     $stmt = $con->prepare("select * from registration where email = ?");
     $stmt->bind_param("s",$email);
     $stmt->execute();
     $stmt_result = $stmt->get_result();

       if($stmt_result->num_rows > 0) {
              $data = $stmt_result->fetch_assoc();
              if($data['password'] === $password) {
                //echo "<h2>login seccesfully</h2>";
                echo "<script>window.location.assign(\"html/dashbord.html\");</script>";
              }
              else {
                echo "<script>alert(\"Invalid information\");window.location.assign(\"index.html\");</script>";
              }
       } else {
            echo "<h2>Invalid email or password</h2>";
       }
  }
?>