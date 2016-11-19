<?php
session_start();
include_once ("db.php");
if (isset($_SESSION['username'])) {
    $login = $_SESSION['username'];
} else {
    header("Location: http://test-application.local/index.php");
    exit;
}


if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['age'])) {
    $age = (int)$_POST['age'];
}
if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
}
//delete tags
$name = htmlspecialchars(strip_tags(trim($name)), ENT_QUOTES, 'UTF-8');
$comment = htmlspecialchars(strip_tags($comment), ENT_QUOTES, 'UTF-8');

$stmt = $conn->prepare('UPDATE users SET Name = ?, Birth_Year = ?, About_user = ? WHERE login = ?');
$stmt->execute(array($name,$age,$comment,$login));//exec with paaram


header('HTTP/1.1 307 Temporary Redirect');
header('Location: http://test-application.local/about_user.php');
//mime_content_type();

?>