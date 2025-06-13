<?php
session_start(); 

$con = mysqli_connect('localhost', 'root', '', 'login_info');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $answer = $_POST['answer']; // User's answer from the form

    // Fetch the stored answer for the user
    $sql = "SELECT answer FROM login WHERE username = '$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_answer = $row['answer'];

        // Check if the provided answer matches the stored answer
        if ($answer == $stored_answer) {
            $_SESSION['username'] = $username;
            header("Location: reset_password.php");
            exit();
        } else {
            echo "Incorrect answer!";
        }
    } 

    else{
        echo "User not found !";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
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
    <h1 >Forgot Password</h1>
        Enter your username: <input type="text" name="username" required><br><br>
        Answer the security question: What is your favorite Disney character? <input type="text" name="answer" required><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
