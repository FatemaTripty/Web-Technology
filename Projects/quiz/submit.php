<?php
session_start();
// Correct answers
$correct_answers = array("Paris", "4", "Shakespeare", "Mars", "H2O", "Pacific", "Cheetah", "Atom", "4", "Leonardo");

// User answers from POST data (assuming all questions were answered)
$user_answers = array(
    isset($_POST['q1']) ? $_POST['q1'] : "",
    isset($_POST['q2']) ? $_POST['q2'] : "",
    isset($_POST['q3']) ? $_POST['q3'] : "",
    isset($_POST['q4']) ? $_POST['q4'] : "",
    isset($_POST['q5']) ? $_POST['q5'] : "",
    isset($_POST['q6']) ? $_POST['q6'] : "",
    isset($_POST['q7']) ? $_POST['q7'] : "",
    isset($_POST['q8']) ? $_POST['q8'] : "",
    isset($_POST['q9']) ? $_POST['q9'] : "",
    isset($_POST['q10']) ? $_POST['q10'] : ""
);

// Initialize variables
$total_questions = count($correct_answers);
$score = 0;

// Check answers using a for loop
for ($i = 0; $i < $total_questions; $i++) {
    if ($user_answers[$i] == $correct_answers[$i]) {
        $score++;
    }
}

// Calculate percentage
$percentage = ($score / $total_questions) * 100;

// Output the result
echo "<h1>Your Score: $score / $total_questions</h1>";
echo "<p>You scored $percentage%</p>";

if ($percentage<60){
    echo "<a href= quiz.html> Retry </a>";
}
else{
    $_SESSION['marks']= $percentage;
    header("Location: quizpass.php");
}
// Display correct answers for incorrect responses
/*
echo "<h2>Review your answers:</h2>";
for ($i = 0; $i < $total_questions; $i++) {
    $question_number = $i + 1;
    echo "<p>For question $question_number:<br>";
    echo "Your answer: <strong>" . ($user_answers[$i] ?: 'No answer') . "</strong><br>";
    echo "Correct answer: <strong>{$correct_answers[$i]}</strong><br></p>";
}*/


?>
