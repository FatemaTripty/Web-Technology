
<?php
      if (session_status() >= 0){
            if(isset($_SESSION["user"])) {
                  header("refresh: 0.5; url = bookborrowingform.php");
            }
      }
if (isset($_POST["submit"])){
$user =$_POST["user"] ;
$pass = $_POST["pass"];
 
$conn = mysqli_connect('localhost', 'root', '', 'login_info');
$sql = "SELECT *FROM login WHERE username = '$user' and password = '$pass'";
 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
 
if ($count == 1) {
      session_start();
     
      $_SESSION["user"] = $user;
 
      echo "<p style=\"color:blue; font-size:20px; font-weight:bold;\">You are now redirected.</p>";;
      header("refresh: 2; url = bookborrowingform.php");
      exit();
}
else{
      echo "<p style=\"color:purple; font-size:20px; font-weight:bold;\">Something is wrong !!! </p>";
      header("refresh: 2; url = index.php");
      exit();
}
}
if (!isset($_POST["submit"]))
      {
            echo "Fill the username and password."."<br>";
            header("refresh: 2; url = index.php");
      }
      //
?>