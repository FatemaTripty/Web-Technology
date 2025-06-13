<?php
if (isset($_POST["submit"])) {
      if ($_POST["pass"] == $_POST["cpass"]) {
            $uname = filter_var($_POST["uname"], FILTER_SANITIZE_EMAIL);
            if (filter_var($uname, FILTER_VALIDATE_EMAIL)) {
                  $pass = $_POST["pass"];
                  $conn = mysqli_connect('localhost', 'root', '', 'app_users');
                  $sql = "INSERT INTO records(username, password) VALUES('$uname', '$pass')";
                  if (mysqli_query($conn, $sql)) {                   
                       session_start();               
                       $_SESSION["uname"] = $_POST["uname"];
                       echo "Registration Accepted<br>";
                       header("refresh: 4; url = private.php");     
                  }     
            }
            else {
                  echo "Email format is not correct.";
                  header("refresh: 2; url = index.php");
            }          
      }
      else {
            echo "Please make sure both password fields are same.";
            header("refresh: 2; url = index.php");         
      }
}
else {
      if(session_status() == PHP_SESSION_NONE){}
      header("location:index.php"); 
      //  
}
?>
