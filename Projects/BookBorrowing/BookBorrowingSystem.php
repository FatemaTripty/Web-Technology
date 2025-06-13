<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Borrowing System</title>
</head>
<body>
    <h1 style="text-align: center;">Book Borrowing System</h1>

    <img src="imgbook/365fairytale.jpg" width="250" alt="365fairytale">
    <figcaption><b>365 Fairytale</b></figcaption>

    <img src="imgbook/fairytale.jpg" width="250" alt="fairytale.jpg">
    <figcaption><b>Fairytale</b></figcaption>

    <img src="imgbook/grims fairytale.jpg" width="250" alt="grims fairytale.jpg">
    <figcaption><b>Grims Fairytale</b></figcaption>

    <img src="imgbook/jack and the beanstalk.jpg" width="250" alt="jack and the beanstalk.jpg">
    <figcaption><b>Jack & The Beanstalk</b></figcaption>

    <img src="imgbook/magical faory.jpg" width="250" alt="magical faory.jpg">
    <figcaption><b>Magical Fairytale</b></figcaption>

    <img src="imgbook/the land of stories.jpg" width="250" alt="the land of stories.jpg"><br>
    <figcaption><b>The Land of Stories</b></figcaption>

    <h2>Student Information</h2>

 Book type: <p><input type="radio" name = "book" value="story">Story Type</p>
 <input type="radio" name="book" value="science" >Science

    <form action="process.php" method="post">
        <p>Name: <input type="text" name="name"></p>
        <p>ID: <input type="text" name="id"></p>
        <p>Email: <input type="email" name="email"></p>
        <p>Date of birth <input type="date" name="birth"></p>
        <p>Address: <input type="text" name="address"></p>
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
</body>
</html>
