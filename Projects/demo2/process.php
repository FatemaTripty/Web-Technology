<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<?php
// Assign POST values to variables
$var1 = $_POST['uname'];
$var2 = $_POST['fullname'];
$var3 = $_POST['age'];
$var4 = $_POST['location'];

// Establish connection to the database
$con = mysqli_connect('localhost', 'root', '', 'demo2');

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Prepare SQL query
    $sql = "INSERT INTO info (username, fullname, age, location) VALUES ('$var1', '$var2', '$var3', '$var4')";

    // Execute the query and check if it was successful
    if (mysqli_query($con, $sql)) {
        echo "INSERTED";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<br><br>
    <a href="delete.php"> Delete</a><br><br>
    <a href="show.php"> Show</a><br><br>
    <a href="update.php"> Update</a>
</body>
</html>