<?php
// открываем сессию
session_start();
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
        unset($password);}
}
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
// подключаемся к базе
include_once ("db.php");
// проверка на существование пользователя с таким же логином
$stmt = $conn->prepare('SELECT id FROM users WHERE login = ? and password = ?');
$stmt->execute(array($login, $password));//exec with paaram
$myrow = $stmt->fetch();//create massive id
//print_r($myrow);
if (empty($myrow['id'])) {
    echo "Извините, введённый вами логин или пароль не найден. Введите другой логин или пароль.";
 //   header("Location: http://test-application.local/enter.php")
    echo "<a href=\"http://test-application.local/enter.php\"> Ввести еще раз (авторизация)</a>";
   } else {
    $_SESSION['user_id'] = $myrow['id'];
    $_SESSION['username'] = $login;
    header("Location: http://test-application.local/about_user.php");
    exit;
}

?>
