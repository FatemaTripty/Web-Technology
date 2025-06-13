<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign POST data to variables
    $id = htmlspecialchars($_POST['number']);
    $name = htmlspecialchars($_POST['text']);
    $phone = htmlspecialchars($_POST['number']);
    $pin = htmlspecialchars($_POST['number']);
    $amount = htmlspecialchars($_POST['number']);
    $date = htmlspecialchars($_POST['date']);
    
    // Set cookies for 30 seconds
    setcookie("id", $id, time() + 30);
    setcookie("name", $name, time() + 30);
    setcookie("phone", $phone, time() + 30);
    setcookie("pin", $pin, time() + 30);
    setcookie("amount", $amount, time() + 30);
    setcookie("date", $date, time() + 30);

    // Redirect to the same page to show the data
    header("Location: process.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM Details</title>
</head>
<body>
    <h1>ATM Details</h1>
    <?php
    if (isset($_COOKIE['id'])) {
        echo "<p>ID: " . $_COOKIE['id'] . "</p>";
        echo "<p>Name: " . $_COOKIE['name'] . "</p>";
        echo "<p>Phone No.: " . $_COOKIE['phone'] . "</p>";
        echo "<p>PIN: " . $_COOKIE['pin'] . "</p>";
        echo "<p>Money Amount: " . $_COOKIE['amount'] . "</p>";
        echo "<p>Date: " . $_COOKIE['date'] . "</p>";
    } else {
        echo "<p>No data available.</p>";
    }
    ?>
</body>
</html>
