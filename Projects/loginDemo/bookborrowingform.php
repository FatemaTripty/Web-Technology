<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Borrowing System</title>
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

        .book-container {
            display: flex;
            justify-content: center;
            flex-wrap:wrap;
            gap: 50px;
            margin: 20px auto;
            max-width: 1200px;
        }

        .book {
            text-align: center;
            border-radius: 10px;
            background-color: #fff;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            width: 200px;
        }

        .book img {
            width: 100%;
            height: 300px;
            border-radius: 5px;
            object-fit: cover;
        }

        .book h3 {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
        }

        .book:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
    <h1 style="text-align: center;">Book Borrowing System</h1>
    <div class="book-container">
    <div class="book">
    <img src="imgbook/365fairytale.jpg" width="250" alt="365fairytale">
    <h3>365 Fairytale</h3>
        </div>
        <div class="book">

    <img src="imgbook/fairytale.jpg" width="250" alt="fairytale.jpg">
    <h3>Fairytale</h3>
    </div>
        <div class="book">
    <img src="imgbook/grims fairytale.jpg" width="250" alt="grims fairytale.jpg">
    <h3>Grims Fairytale</h3>
    </div>
    <div class="book">
    <img src="imgbook/jack and the beanstalk.jpg" width="250" alt="jack and the beanstalk.jpg">
    <h3>Jack & The Beanstalk</h3>
        </div>
        <div class="book">
<img src="imgbook/magical faory.jpg" width="250" alt="magical faory.jpg">
<h3>Magical Fairytale</h3>
        </div>
        <div class="book">
    <img src="imgbook/the land of stories.jpg" width="250" alt="the land of stories.jpg"><br>
    <h3>The Land of Stories</h3>
        </div>
    </div>
   

    <h2>Student Information</h2>


 <div class="form-container">
    <form action="process.php" method="post">
        <p>Name: <input type="text" name="name"></p>
        <p>ID: <input type="text" name="id"></p>
        <p>Email: <input type="email" name="email"></p>
        <p>Book Selected:
            <select name="book">
                <option value="">--select a book--</option>
                <option value="365 Fairytale">365 Fairytale</option>
                <option value="Fairytale">Fairytale</option>
                <option value="Grims Fairytale">Grims Fairytale</option>
                <option value="Jack and The Beanstalk">Jack and The Beanstalk</option>
                <option value="Magical Fairytale">Magical Fairytale</option>
                <option value="The Land of Stories">The Land of Stories</option>
            </select>
        </p>
        <p>Borrow Date: <input type="date" name="borrow_date"></p>
        <p>Return Date: <input type="date" name="return_date"></p>
        <input type="submit" value="Submit">
    
    </form>
    </div>

    <a href="logout.php">Logout</a>
</body>
</html>
