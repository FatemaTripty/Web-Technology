<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User Information</title>
</head>
<body>
    <h3>Type the username you want to update</h3> 
    <form method="post"> 
        Username : <input type="text" name="uname" placeholder="Username" required><br><br>
        New Full Name : <input type="text" name="fullname" placeholder="New Full Name"><br><br>
        New Age : <input type="number" name="age" placeholder="New Age"><br><br>
        New Location : <input type="text" name="location" placeholder="New Location"><br><br>
        <input type="submit" name="submit" value="Update">     
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Retrieve form values
        $var1 = $_POST['uname'];
        $var2 = $_POST['fullname'];
        $var3 = $_POST['age'];
        $var4 = $_POST['location'];

        // Connect to the database
        $con = mysqli_connect('localhost', 'root', '', 'demo2');

        // Initialize the SQL query
        $sql = "UPDATE info SET ";
        $fields = [];

        // Only add fields to the query if they are provided
        if (!empty($var2)) $fields[] = "fullname = '$var2'";
        if (!empty($var3)) $fields[] = "age = '$var3'";
        if (!empty($var4)) $fields[] = "location = '$var4'";

        // If there are fields to update, proceed
        if (count($fields) > 0) {
            $sql .= implode(", ", $fields) . " WHERE username = '$var1'";

            // Execute the update query
            if (mysqli_query($con, $sql)) {
                echo "UPDATED successfully!";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        } else {
            echo "Please provide at least one field to update!";
        }

        // Close the database connection
        mysqli_close($con);
    }
    ?>
      <a href="show.php"> Show</a><br><br>
</body>
</html>
