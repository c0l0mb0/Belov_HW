<!--
Принятые задачи: 1,2,5,8
Непринятые задачи: 3,4,6,7
-->
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title> домашка 1 </title>
</head>
<body>
<H1> домашка 1</H1>

<?php
////---------------------------------------------------------------------
// Принято
$name = "Ivan";
$age = 30;
echo 'Меня зовут ' . $name, '<br>';
echo 'Мне ' . $age, '<br>';
echo '"!|\/\'"\\', '<br>';
//---------------------------------------------------------------------
// Принято
$PictureAll = 80;
$PictureFeltpen = 23;
$PicturePencil = 40;
echo $PicturePaint = $PictureAll - $PictureFeltpen - $PicturePencil, '<br>';
//---------------------------------------------------------------------
// Не соответствует заданию
define("LENGTH", 155, true);
if (defined("LENGTH") == true) {
    echo "Константа LENGTH объявлена!", '<br>';
}
echo LENGTH, '<br>';
//echo LENGTH = 321, '<br>';
//---------------------------------------------------------------------
// Не соответствует заданию
$age = rand(1, 120);
if (18 < $age and $age <= 65) {
    echo "Вам еще работать и работать", '<br>';
} elseif ($age > 65) {
    echo "Вам   пора   на   пенсию", '<br>';
} elseif ($age <= 17 and $age > 0) {
    echo "Вам   ещё   рано   работать", '<br>';
} else {
    echo "Неизвестный   возраст", '<br>';
}
//---------------------------------------------------------------------
// Принято
$day = 6;
switch ($day) {
    case (1 < $day and $day < 5):
        echo "Это   рабочий   день", '<br>';
        break;
    case ($day == 6 or $day == 7):
        echo "Это   выходной   день", '<br>';
        break;
    default:
        echo "Неизвестный   день", '<br>';
        break;

}
/////////---------------------------------------------------------------------
// Не соответствует заданию.
$BMW = array(
    "model" => "X5",
    "speed" => "120",
    "doors" => "5",
    "year" => "2015"
);
$Toyota = array(
    "model" => "Camry",
    "speed" => "110",
    "doors" => "3",
    "year" => "2010"
);
$Opel = array(
    "model" => "Astra",
    "speed" => "10",
    "doors" => "4",
    "year" => "2011"
);

$arrGen = array('BMW' => $BMW,'Tyota' => $Toyota,'Opel' => $Opel);
foreach($arrGen as $key => $value)
{
    echo "CAR " . $key, '<br>';
    echo $value["model"] . " " . $value["speed"] . " " . $value["doors"] . " " . $value["year"], '<br>';
}




//---------------------------------------------------------------------
// Не соответствует заданию.

for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        if ($i % 2 == 0 and $i % 2 == 0) {
            echo "(" . $i . " * " . $j . " = " . $i * $j . ")&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        } elseif ($i % 2 <> 0 and $j % 2 <> 0) {
            echo "[" . $i . " * " . $j . " = " . $i * $j . "]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        } else {
            echo $i . " * " . $j . " = " . $i * $j . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
        }
        if ($j == 10) {
            echo '<br>';
        }
    }
}
//---------------------------------------------------------------------
// Принято
$str = 'test test2 taburetka';
echo $str, '<br>';
$arr = explode(" ", $str);
for ($i = 0; $i <= count($arr); $i++) {
    echo $arr[$i] . " ", '<br>';
}
$str = '';
$i = 0;
while ($i < count($arr)) {

    $str = $str . $arr[$i] . "||";
    $i++;
}
$str = rtrim($str, "||");
echo $str, '<br>';
?>
</body>
</html>