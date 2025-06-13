<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "web_dictionary";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$feedback = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_word = trim($_POST['new_word']);
    $definition = trim($_POST['definition']);

    
    if (!preg_match("/^[a-zA-Z ]+$/", $new_word)) {
        $feedback = "<p class='warning'>Only letters and spaces are allowed for the word (no numbers or special characters).</p>";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO words (word, definition) VALUES (?, ?)");
        $stmt->bind_param("ss", $new_word, $definition);

        if ($stmt->execute()) {
            $feedback = "<p class='success'>Word added successfully!</p>";
        } else {
            $feedback = "<p class='warning'>Error: Could not add word. Please try again.</p>";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Word</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="dictionary-app">
    <h1>Add a New Word</h1>

    <form action="add_word.php" method="POST">
        <label for="new_word">Word:</label><br>
        <input type="text" id="new_word" name="new_word" required><br><br>
        
        <label for="definition">Definition:</label><br>
        <textarea id="definition" name="definition" rows="4" required></textarea><br><br>

        <button type="submit">Add Word</button>
        <br><br>
        <a href="index.html">Home</a>
    </form>

    <div id="feedback">
        <?php
        
        echo $feedback;
        ?>
    </div>
</div>



</body>
</html>
