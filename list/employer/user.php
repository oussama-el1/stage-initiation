<?php
include 'config/db.php';
if (isset($_POST['submit']))
{
    $name=$_POST['name'];
    $last = $_POST['last'];
    $email = $_POST['email'];

    $sql = "insert into `users` (name,last,email)
    values('$name','$last','$email')";

    $result = mysqli_query($conn,$sql);
    if ($result)
    {
      echo "<script>window.location.assign(\"index.php\");</script>";
    }
    else
    {
        die(mysqli_error($conn));
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body >
    <div class="container mt-5">
    <form method="post">
  <div class="form-group mt-5">
    <label >Ename</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name">
  </div>
 
  <div class="form-group mt-5">
    <label >last</label>
    <input type="text" class="form-control" placeholder="Enter your mobile" name="last">
  </div>

  <div class="form-group mt-5">
    <label >email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email">
  </div>
 
    <button type="submit" class="btn btn-primary mt-3" name="submit">submit</button>
</form>
    </div>
    <style>
      a{text-decoration: none;}
    </style>
</body>
</html>