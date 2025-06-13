

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       /*body
        {
            background-image: url('imgbook/book.jpg');
            background-color: rgba(0,0,0,0.5);
            background-repeat: no-repeat;
            background-size: cover;

        }*/
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
<div class="form-container">
        <form action="loginprocess.php" method="post">
            <h1>Login Form</h1>
            Username: <input type="text" id="user" name="user" required><br><br>
            Password: <input type="password" id="pass" name="pass" required><br><br>
            <input type="submit" id="btn" value="Login" name="submit"><br><br>
            

            <!--<a href="signup.php">Don't have an account? Signup.</a><br>-->
            <a href="forgot_password.php">Forgot Password?</a>
            
            
        </form>
    </div>
</body>
</html>
