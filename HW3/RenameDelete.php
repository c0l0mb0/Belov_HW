<?php
session_start();
include ("check_closed_pages.php");

if (isset($_SESSION['user_id'])) {
    $ID = $_SESSION['user_id'];
}

if (isset($_POST['name_rename']) and isset($_POST['name_rename_origin'])) {
    $name_rename = $_POST['name_rename'];
    $name_rename_origin = $_POST['name_rename_origin'];
    rename ("photos/".$name_rename_origin, "photos/".$name_rename);

    $stmt = $conn->prepare('UPDATE Photos SET photo_name = ? WHERE id_user = ? AND photo_name = ? ');
    $stmt->execute(array($name_rename, $ID, $name_rename_origin));//exec with paaram

    unset($_POST['name_rename']);
    unset($_POST['name_rename_origin']);
    header("Location: http://test-application.local/users_file_list.php");
    exit;
}
if (isset($_POST['name_delete'])) {
    $name_delete = $_POST['name_delete'];
    unlink ("photos/".$name_delete);
    $stmt = $conn->prepare('DELETE FROM Photos WHERE id_user = ? AND photo_name = ? ');
    $stmt->execute(array($ID, $name_delete));//exec with paaram
    unset($_POST['name_delete']);
    header("Location: http://test-application.local/users_file_list.php");
    exit;
}



?>