<?php
    session_start();
    session_unset();
    session_destroy();

    echo "<script>window.close() </script>";
    header("Location:http://localhost:8001/demo/process.php");


?>