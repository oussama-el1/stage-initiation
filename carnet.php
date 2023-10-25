<?php

if (isset($_POST['submit']))
{
    

    $font = "carnets/ARIAL.TTF";
    $image = imagecreatefromjpeg("carnets/temp-carnet.jpeg");
    $color = imagecolorallocate($image, 19, 21, 22);
    $fname = $_POST["pname"];
    $CIN = $_POST["cin"];
    $address = $_POST["Adresse"];
    $nomanimale = $_POST["aname"];
    $dateN = $_POST["birthd"];
    $type = $_POST["type"];
    $race = $_POST["Race"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];

    imagettftext($image, 30, 0, 403, 540, $color, $font, $fname);
    imagettftext($image, 30, 0, 403, 631, $color, $font, $CIN);
    imagettftext($image, 30, 0, 403, 722, $color, $font, $address);
    imagettftext($image, 30, 0, 403, 813, $color, $font, $nomanimale);
    imagettftext($image, 30, 0, 403, 904, $color, $font, $dateN);
    imagettftext($image, 30, 0, 403, 995, $color, $font, $type);
    imagettftext($image, 30, 0, 403, 1086, $color, $font, $race);
    imagettftext($image, 30, 0, 403, 1177, $color, $font, $email);
    imagettftext($image, 30, 0, 403, 1278, $color, $font, $tel);
   
    $conn = new mysqli('localhost','root','','onssa');
    if ($conn->connect_error)
    {
        die ("connectien failed".$conn->connect_error);
    }

$sql = "INSERT INTO `preioritaire` (`cin`, `fname`, `email`, `adresse`, `tel`)
            VALUES ('$CIN', '$fname', '$email', '$address', '$tel')";  
$sql2 =  "INSERT INTO `pet` (`type`, `race`, `date`, `holderid`)
            VALUES ('$type', '$race', '$dateN', '$CIN') ";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
  echo "<script> window.location.href = 'html/carnet.html';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql3 = mysqli_query($conn,"SELECT id FROM pet WHERE holderid = '$CIN'");
$result = mysqli_fetch_assoc($sql3);
$id = $result['id'];

imagettftext($image, 30, 0, 1108, 812, $color, $font, $id);

imagejpeg($image,"carnets/base/".$fname."-".$CIN.".jpeg");
imagedestroy($image);
mysqli_close($conn);
}
?>
