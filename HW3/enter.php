<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Вход в систему (авторизация)</title>
</head>
<body>
<h2>Вход в систему (авторизация)</h2>
<form action="check_user.php" method="post">
    <p>
        <label>Ваш логин:<br></label>
        <input name="login" type="text" size="15" maxlength="15">
    </p>
    <p>
        <label>Ваш пароль:<br></label>
        <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
        <input type="submit" name="submit" value="Войти">
    </p></form>
</body>
</html>