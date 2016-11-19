<?php
session_start();
include_once ("db.php");
if (isset($_SESSION['username'])) {
    $login = $_SESSION['username'];
} else {
    header("Location: http://test-application.local/index.php");
    exit;
}
?>