<?php
session_start();
include ("check_closed_pages.php");
//include ("db.php");
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF8">
    <title>Немного о себе</title>
    <style type="text/css">
        div{
            margin-bottom: 10px;
        }
    </style>
</head>

<?php
if (isset($_SESSION['user_id'])) {
$ID = $_SESSION['user_id'];
}
$stmt = $conn->prepare('SELECT * FROM users WHERE id = ? ');
$stmt->execute(array($ID));//exec with paaram
$myrow = $stmt->fetch();//create massive id
?>

<h2>Расскажите немного о себе, <?php echo $_SESSION['username'] ?></h2>
<p>
    <a href="http://test-application.local/users_file_list.php">Список ваших картинок  <?php echo $_SESSION['username'] ?></a>
</p>

<form action="save_inf_about_user.php" method="post" enctype="multipart/form-data">

    <div>
    <label for="name">Имя</label>
           <input type="text" name="name" id="name" size="15" maxlength="15" value ="<?php echo $myrow['Name']?>" >
    </div>
    <div>
        <label for="name">Год рождения (4 цифры)</label>
        <input type="number" name="age" id="age" min="1" max="2100" step="1" size="4" maxlength="4" value ="<?php echo $myrow['Birth_Year']?>">
    </div>
    <div>
        <label for="name">Немного о себе</label>
        <input type="text" name="comment" id="comment" size="50" maxlength="100" value ="<?php echo $myrow['About_user']?>" >
    </div>

    <p>
        <input type="submit" name="submit" value="Подтвердить">
        <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
    </p>

    <h1>Загрузка изображения</h1>
    <input type="file" name="picture">
    <input type="submit" value="Загрузить">

</form>
<?php

// Пути загрузки файлов
$path = 'photos/';
// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
$size = 1024000;

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (is_null($_FILES['picture']['type']))
        exit("нет файла");
    // Проверяем тип файла
    if (!in_array($_FILES['picture']['type'], $types))
        die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');

    // Проверяем размер файла
    if ($_FILES['picture']['size'] > $size)
        die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
    $filname = htmlspecialchars(strip_tags(trim($_FILES['picture']['name'])), ENT_QUOTES, 'UTF-8');
    // Загрузка файла и вывод сообщения
    if (!@copy($_FILES['picture']['tmp_name'], $path .$filname))
        echo 'Что-то пошло не так';
    else
        echo 'Загрузка удачна <a href="' . $path . $filname. '">Посмотреть</a> ' ;
        echo $filname;
    //insert new line about user's photos
    $stmt = $conn->prepare('INSERT INTO Photos (photo_name, id_user) VALUES (?,?)');
    $stmt->execute(array($filname,$_SESSION['user_id']));//exec with paaram
}

?>


</html>