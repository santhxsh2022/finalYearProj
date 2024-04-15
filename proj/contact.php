<?php

$name = $_POST['name'];
$email  = $_POST['email'];
$msg = $_POST['msg'];




if (!empty($name) || !empty($email) || !empty($msg) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From review Where email = ? Limit 1";
  $INSERT = "INSERT Into review (name , email , msg )values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $name,$email,$msg);
      $stmt->execute();
      echo"<script type='text/javascript'>alert('Review Uploaded !!')</script>";
      include 'page1.html';
     } else {
      echo"<script type='text/javascript'>alert('Someone Already Using This Email')</script>";
      include 'page1.html';
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>