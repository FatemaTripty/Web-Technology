<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
</head>
<body>
    <h1>Enter Your Information</h1>
    <form  method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br><br>

        <input type="submit" value="Submit" name ="submit">
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $marks =$_SESSION['marks'];
        $name=$_POST['name'];
        $id=$_POST['id'];
        $con = mysqli_connect('localhost', 'root', '', 'my database');
        $sql_check = "INSERT INTO tablename (name, id,  marks) VALUES ('$name','$id','$marks')";
        $result = mysqli_query($con, $sql_check);
    }
?>