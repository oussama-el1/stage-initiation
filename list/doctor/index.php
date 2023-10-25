<?php
/*
require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($conn,$query);
*/

require_once "../config/db.php";
require_once "../config/function.php";

$result = display_data();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="../../css/list.css">
    <title>list</title>
</head>
<body>

<div class="containerr">

<nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="../../images/logo-onssa.png" alt="">
          <span class="nav-item">ONSSA</span>
        </a></li>
        <li><a href="../../html/dashbord.html">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="../../html/carnet.html">
          <i class="fas fa-book-medical"></i>
          <span class="nav-item">Carnet</span>
        </a></li>
        <li><a href="calander.html">
          <i class="fas fa-calendar"></i>
          <span class="nav-item">calendrier</span>
        </a></li>
        <li><a href="index.php">
          <i class="fas fa-syringe"></i>
          <span class="nav-item">Doctor</span>
        </a></li>
        <li><a href="../employer/index.php">
          <i class="fas fa-briefcase"></i>
          <span class="nav-item">Employer</span>
        </a></li>
        <li><a href="">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Settings</span>
        </a></li>
        <li><a href="">
          <i class="fas fa-question-circle"></i>
          <span class="nav-item">Help</span>
        </a></li>
        <li><a href="../index.html" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

<section class="main">

    <button class="btn btn-primary mb-4"><a href="user.php" class="text-white">Add doctor</a></button>

<div class="main-skillss">

<div class="alllist">
<div class="horizontal-scroll-container">
<div class="row content">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">List Doctor</h2>
                    </div> 
                    <div class="card-body">
                        <table class="table table-b ordered text-center">
                        <tr class="table-dark text-white">
                                <td>id</td>
                                <td>first name</td>
                                <td>last</td>
                                <td>email</td>
                                <td>edit</td>
                                <td>delite</td>
                            </tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $last = $row['last'];
                                        $email = $row['email'];
                                        echo '<tr>
                                        <td>'.$id.'</td>             
                                        <td>'.$name.'</td>             
                                        <td>'.$last.'</td>             
                                        <td>'.$email.'</td>
                                        <td><a href="update.php?updateid='.$id.'" class="btn btn-primary ">edit</a></td>             
                                        <td><a href="del.php?deleteid='.$id.'" class="btn btn-danger" >delete</a></td>           
                                    </tr>';
                                    }
                                    ?>
                                <?php    
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
a{
    text-decoration: none;
}
ul{
    padding: 0px;
}
ul li{
    list-style: none;
    list-style-type: none;
    padding: 0px;
}

</style>
</body>
</html>