<?php
session_start();
include ("check_closed_pages.php");

if (isset($_SESSION['user_id'])) {
    $ID = $_SESSION['user_id'];
}

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF8">
    <title>Список ваших картинок </title>
    <style type="text/css">
        div{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h2>Список ваших картинок, <?php echo $_SESSION['username'] ?></h2>
<?php
$stmt = $conn->prepare('SELECT photo_name, users.id FROM Photos INNER JOIN users ON Photos.id_user = users.id WHERE users.id = ? ');
$stmt->execute(array($ID));//exec with paaram
$myrow = $stmt->fetchAll (PDO::FETCH_COLUMN,0);//create massive
//print_r($myrow);
if (!empty($myrow)) {
    foreach ($myrow as $value)  {
       echo  '<a href=http://test-application.local/users_file_list.php?'.$value.'>'.$value.'</a><br>';
    }
if    (preg_replace("/^\/users_file_list.php\?/", "",  $_SERVER['REQUEST_URI']) <> "") {
    $ChosenFile = preg_replace("/^\/users_file_list.php\?/", "",  $_SERVER['REQUEST_URI']);
    if ($ChosenFile == "/users_file_list.php") {
        $ChosenFile ="";
    }
    $_POST['ChosenFile'] = $ChosenFile;
    //create menu
    echo " <p>
    <form action=\"RenameDelete.php\" method=\"post\">

    <div>
    <label for=\"name\"> Имя файла</label>
           <input type=\"text\" name=\"name_rename\" id=\"name_rename\" size=\"80\" maxlength=\"250\" value =\"$ChosenFile\" >
           <input type=\"hidden\" name=\"name_rename_origin\" id=\"name_rename_origin\" size=\"80\" maxlength=\"250\" value =\"$ChosenFile\" >
    </div> 
    </p>
    
    <p>
      <input type=\"submit\" name=\"submit\" value=\"Переименовать\"
    </p>
    </form>
    <p>

    <form action=\"RenameDelete.php\" method=\"post\">

    <div>
           <input type=\"hidden\" name=\"name_delete\" id=\"name_delete\" size=\"80\" maxlength=\"250\" value =\"$ChosenFile\" >
    </div> 
    </p>
    
    <p>
      <input type=\"submit\" name=\"submit\" value=\"Удалить файл   $ChosenFile\"
    </p>
    </form>";
}
}


?>

</body>

</html>
