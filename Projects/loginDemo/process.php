
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Book Details</title>
</head>
<body>
    <h1>Borrowed Book Details</h1>

<?php

function validateID($id) 
{
    $pattern = '/^\d{2}-\d{5}-\d$/';
    
    if (preg_match($pattern, $id)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $birth = $_POST['birth'];
    $address = $_POST['address'];
    $book = $_POST['book'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];

    
   if (empty($_POST['id']))
    {
        echo "Student ID required!";
    }
    elseif (!validateID($id))
    {
        echo "Invalid Student ID format!";
    }
   
    if (isset($_COOKIE['id']) && $_COOKIE['id'] == $id) {
       header("Location: process.php?status=already_borrowed");
        exit();
    } else {
        setcookie("name", $name, time() + 604800);
        setcookie("id", $id, time() + 604800);
        setcookie("email", $email, time() + 604800);
        setcookie("birth", $birth, time() + 604800);
        setcookie("address", $address, time() + 604800);
        setcookie("book", $book, time() + 604800);
        setcookie("borrow_date", $borrow_date, time() + 604800);
        setcookie("return_date", $return_date, time() + 604800);

        header("Location: process.php?status=success");
        exit();
    }
    
}

?>

<?php
  if (isset($_GET['status'])) {
    if ($_GET['status'] == 'already_borrowed') {
        echo "<p style=\"color:red; font-size:20px; font-weight:bold;\">You have already borrowed a book! Please return it first.</p>";
        echo "<p style = \"font-size:20px; font-weight:bold;\">Here are the details of your previous book borrowing history. </p>";
    } elseif ($_GET['status'] == 'success') {
        echo "<p style=\"color:green; font-size:20px; font-weight:bold;\">You have borrowed the book successfully.</p>";
        echo "<p style = \"font-size:20px; font-weight:bold;\">Here are the details. </p>";
    }
}
  
    ?>
<?php
  if (isset($_COOKIE['name'])) {
    echo "<p>Name: " . $_COOKIE['name'] . "</p>";
    echo "<p>ID: " . $_COOKIE['id'] . "</p>";
    echo "<p>Email: " . $_COOKIE['email'] . "</p>";
    echo "<p>Date of birth : " . $_COOKIE['birth'] . "</p>";
    echo "<p>Address: " . $_COOKIE['address'] . "</p>";
    echo "<p>Selected Book : " . $_COOKIE['book'] . "</p>";
    echo "<p>Borrowing Date: " . $_COOKIE['borrow_date'] . "</p>";
    echo "<p>Returning Date: " . $_COOKIE['return_date'] . "</p>";
} else {
    echo "<p>No data available.</p>";
}


?>
<br>
<a href="index.php">Logout</a>

</body>
</html>
