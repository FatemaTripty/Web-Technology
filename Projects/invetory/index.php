<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$brandname = '';
$searchResult = '';
$insertMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['brandname'])) {
        $brandname = $_POST['brandname'];

        // Search query
        $sql = "SELECT * FROM products WHERE brandname LIKE '%$brandname%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display search result
            $searchResult = "<table border='1'>
                                <tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Brand Name</th><th>Country</th><th>Warranty</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $searchResult .= "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['quantity']}</td><td>{$row['brandname']}</td><td>{$row['country']}</td><td>{$row['warranty']}</td></tr>";
            }
            $searchResult .= "</table>";
        } else {
            $searchResult = "<p>{$brandname} is not available. Plelase insert the information for {$brandname}</p>";

        // This is the form, which will only be shown if the user agrees to insert the item
        $formHtml = "
            <form method='POST'>
                <label>Brand Name: </label><input type='text' name='brandname' value='$brandname'><br>
                <label>Name: </label><input type='text' name='name'><br>
                <label>Price: </label><input type='number' name='price' required><br>
                <label>Quantity: </label><input type='number' name='quantity' required><br>
                <label>Country: </label><input type='text' name='country' required><br>
                <label>Warranty: </label><input type='number' name='warranty' required><br>
                <input type='submit' name='insert' value='Insert'>
            </form>";

        // Show the dialog first using JavaScript
        $searchResult .= "
            <script>
                // Ask the user for confirmation to insert the item
                var userResponse = confirm('This item is not available. Do you want to insert it into the database?');
                if (userResponse) {
                    // If the user agrees, display the form
                    document.write(`$formHtml`);
                } 
                // If the user cancels, do nothing and don't show any message
            </script>";
                }
            }

            // Handle the "Show All" button logic
            if (isset($_POST['show_all'])) {
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display all inventory
                    $searchResult = "<table border='1'>
                                        <tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Brand Name</th><th>Country</th><th>Warranty</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        $searchResult .= "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['quantity']}</td><td>{$row['brandname']}</td><td>{$row['country']}</td><td>{$row['warranty']}</td></tr>";
                    }
                    $searchResult .= "</table>";
                } else {
                    $searchResult = "<p>No products available in the inventory.</p>";
                }
            }

            // Insert new item
            if (isset($_POST['insert'])) {
                $brandname = $_POST['brandname'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $country = $_POST['country'];
                $warranty = $_POST['warranty'];

                $insertSql = "INSERT INTO products (name, price, quantity, brandname, country, warranty)
                            VALUES ('$name', '$price', '$quantity', '$brandname', '$country', '$warranty')";

                if ($conn->query($insertSql) === TRUE) {
                    $insertMessage = '<p id="success">New record created successfully</p>';

                    // Display inserted data
                    $sql = "SELECT * FROM products WHERE brandname='$brandname'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $searchResult = "<table border='1'>
                                            <tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Brand Name</th><th>Country</th><th>Warranty</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            $searchResult .= "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['quantity']}</td><td>{$row['brandname']}</td><td>{$row['country']}</td><td>{$row['warranty']}</td></tr>";
                        }
                        $searchResult .= "</table>";
                    }
                } else {
                    $insertMessage = "Error: " . $insertSql . "<br>" . $conn->error;
                }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory - RTP Tech Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 id="title"><abbr title="Rahi Tripty Prottoy">RTP</abbr> Tech Shop</h1>
    <h2>Search for a product...</h2>
    <form method="POST" action="index.php">
        <label for="brandname">Enter Brand Name: </label>
        <input type="text" name="brandname" id="brandname" required>
        <input type="submit" value="Search">
    </form>
    <form method="POST" action="index.php">
        <input type="submit" name="show_all" value="Show All">
    </form>

    <?php echo $searchResult; ?>
    <?php if ($insertMessage) { echo "<p>$insertMessage</p>"; } ?>
</body>
</html>
