<?php
try {
    $conn = new PDO("mysql:host=test-application.local;dbname=colombo_bd", 'colombo', '132');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
//    echo '<br>';
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
//    echo '<br>';
}

$conn->exec("set names utf8");


?>
