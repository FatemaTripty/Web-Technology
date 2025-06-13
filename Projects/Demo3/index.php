<?php
 if (session_status()>=0){
//
      session_start();
      if(isset($_SESSION["uname"])) {
            header("refresh: 1; url = private.php");
           // echo $_SESSION["uname"];
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>PHP APP</title>
</head>
<body>
      <form action="loginprocess.php" method="post">
      
            Username<input type="text" name = "uname">
            Password<input type="password", name = "pass">
            <input type="submit" name="submit">
      
      </form>
      <a href="signup.php">Sign Up</a>
</body>
</html>