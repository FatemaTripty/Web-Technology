<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'login_info');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $new_password = $_POST['new_password'];

    // Update the password
    $new_password = mysqli_real_escape_string($con, $new_password); 
    $sql = "UPDATE login SET password = '$new_password' WHERE username = '$username'";
    if (mysqli_query($con, $sql)) {
        echo "<p style=\"color:green; font-size:20px; font-weight:bold;\">Password reset successful! You will be redirected shortly.</p>";
        header("refresh:3;url=index.php"); // Redirect to index.php after 3 seconds
        exit();
    } else {
        echo "Error updating password: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
         h1 {
            color: #333;
            margin-top: 20px;
        }
    .form-container {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .form-container p {
            color: #333;
            margin-bottom: 15px;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }


    </style>
</head>
<body>
    
    <div class="form-container">
    <form method="POST" action="">
    <h1>Reset Password</h1>
        New Password: <input type="password" name="new_password" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
    </div>
</body>
</html>
