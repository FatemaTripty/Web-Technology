<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'login_info');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $answer = $_POST['answer'];

    // Insert data into the login table
    $sql = "INSERT INTO login (username, password,  answer) VALUES ('$username', '$password',  '$answer')";

    if (mysqli_query($con, $sql)) {
        echo "<p style=\"color:green; font-size:20px; font-weight:bold;\">Signup successful!</p>";
        header("refresh:2;url=index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            text-align: center;
        }

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

        .logout-btn {
            margin-top: 20px;
        }

        .logout-btn input {
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
        }

        .logout-btn input:hover {
            background-color: #d32f2f;
        }

    </style>
</head>
<body>
    <h1>Signup Page</h1>
    <div class="form-container">
    <form method="POST" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Security Question: What is your favorite Disney character?<br><br>
        Answer: <input type="text" name="answer" required><br><br>
        <input type="submit" value="Signup">
    </form>
    </div>
    <br>
    <a href="index.php">Already have an account? Login here</a>
</body>
</html>
