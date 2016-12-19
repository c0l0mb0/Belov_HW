<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Запрос API с mymvclocal</title>
</head>
<body>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<div>
<button id="btn_AllGoods" >Все  товары</button>
</div>
<br>
<div>
<button id="btn_IdFilter" >Товар выбранный по ID</button>
<input type="text" id="IdFilter">
</div>
<br>
<div>
<button id="btn_IdEdit" >Редактировать название товара</button>
<label>id товара</label><input type="text" id="IdEdit">
    <label></label> новое имя товара <input type="text" id="EditName">
</div>
<br><br>
<div>
<button id="btn_IdDelete" >Удалить товар</button>
    <label>id товара для удаления</label><input type="text" id="IdDelete">
</div>
<br>
<div>
<button id="btn_NewGood" >Создать товар</button>
    <label>имя товара</label><input type="text" id="NewName">
    <label>категоря</label><input type="text" id="NewCategory">
    <label>количество</label><input type="text" id="NewAmount">

</div>
<br>
<a href="http://mymvclacal//sender.php"> отправить мне на стену в ВК картинку fire1.jpg</a>


<div class="result"></div>
<script src="/assets/template/js/main.js"></script>




</body>
</html>
