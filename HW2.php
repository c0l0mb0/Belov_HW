<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title> домашка 2 </title>
</head>
<body>
<H1> домашка 2</H1>

<?php
//------------------------------ 1 ---------------------------------------

//$arr1 = array('banana','apple','car');
//
//function StringOperations($arr1, $param = false)
//{
//    if ($param) {
//        return implode("", $arr1);
//    }
//    return $arr1;
//}
//StringOperations($arr1);
//$strWithTrue = StringOperations($arr1, true);
//for ($i = 0; $i <= count($strWithTrue); $i++) {
//    echo '<p>'.$strWithTrue[$i].'</p>';
//}

//------------------------------2---------------------------------------
//
//$Arr123 = array(2,0,6,5);
//
//set_error_handler(function () {
//    throw new Exception('Ach!');
//});
//
//
//
//function calc($ArrNumb, $operation)
//{
//    if (empty($ArrNumb)) { // is an array empty
//        return 'array error';
//    }
//    foreach ($ArrNumb as $value) {//are elements correct
//           if (strcasecmp(gettype ($value), 'NULL') == 0 or strcasecmp(gettype ($value), 'object') == 0 or strcasecmp(gettype($value), 'string') == 0) {
//               return 'array element error';
//           }
//
//    }
//    for ($i = 0; $i < count($ArrNumb)-1; $i++) {
//        switch ($operation) {
//            case ('+'):
//                  $ArrNumb[$i + 1] = $ArrNumb[$i] + $ArrNumb[$i + 1];
//                break;
//            case ('-'):
//                 $ArrNumb[$i + 1] = $ArrNumb[$i] - $ArrNumb[$i + 1];
//                break;
//            case ('/'):
//                try {
//                     $ArrNumb[$i + 1] = $ArrNumb[$i] / $ArrNumb[$i + 1];
//                    break;
//                }
//                catch (Exception $e) {
//                    echo "Divide by zero!", '<br>';
//                    return 'error';
//
//                }
//
//            case ('*'):
//                 $ArrNumb[$i + 1] = $ArrNumb[$i] * $ArrNumb[$i + 1];
//                break;
//            default:
//                echo "Unknown operation", '<br>';
//                return 'error';
//                break;
//        }
//    }
//    return $ArrNumb[count($ArrNumb)-1];//return the last element
//}
//
//$FunResult = calc($Arr123, '/');
//
//echo $FunResult, '<br>';
//------------------------------3-----------------------------------------
//set_error_handler(function () {
//    throw new Exception('Ach!');
//});
//
//
//function get_sum()
//{
//    $operation = func_get_arg(0);//get first element
//    $ArrNumb = (func_get_args());//create array
//    array_shift($ArrNumb);//delete 1 element
//    if (empty($ArrNumb)) { // is an array empty
//        return 'array error';
//    }
//    foreach ($ArrNumb as $value) {//are elements correct
//           if (strcasecmp(gettype($value), 'NULL') == 0 or strcasecmp(gettype($value), 'object') == 0 or strcasecmp(gettype ($value), 'string') == 0 ){
//               return 'array element error';
//           }
//
//    }
//    for ($i = 0; $i < count($ArrNumb)-1; $i++) {
//        switch ($operation) {
//            case ('+'):
//                  $ArrNumb[$i + 1] = $ArrNumb[$i] + $ArrNumb[$i + 1];
//                break;
//            case ('-'):
//                 $ArrNumb[$i + 1] = $ArrNumb[$i] - $ArrNumb[$i + 1];
//                break;
//            case ('/'):
//                try {
//                     $ArrNumb[$i + 1] = $ArrNumb[$i] / $ArrNumb[$i + 1];
//                    break;
//                }
//                catch (Exception $e) {
//                    echo "Divide by zero!", '<br>';
//                    return 'error';
//
//
//                }
//
//            case ('*'):
//                 $ArrNumb[$i + 1] = $ArrNumb[$i] * $ArrNumb[$i + 1];
//                break;
//            default:
//                echo "Unknown operation", '<br>';
//                return 'error';
//                break;
//        }
//    }
//    return $ArrNumb[count($ArrNumb)-1];//return the last element
//}
//$FunResult = get_sum('+', 2, 8, 6, 5.5);
//
//echo $FunResult, '<br>';
//------------------------------4-----------------------------------------
//function CheckVarble(){
//    $ArrNumb = (func_get_args());//create array
//    foreach ($ArrNumb as $value) {//are elements correct
//        if (strcasecmp(gettype($value), 'integer') <> 0) {
//            return false;
//        }
//    }
//    return true;
//}
//
//
//function MultipTable($Multiplier1, $Multiplier2)
//{
//    if (CheckVarble($Multiplier1, $Multiplier2)) {//are elements correct
//        for ($i = 1; $i <= $Multiplier1; $i++) {
//            for ($j = 1; $j <= $Multiplier2; $j++) {
//                echo $i . " * " . $j . " = " . $i * $j, '<br>';
//
//            }
//        }
//    } else {
//        return 'incorrect argument';
//    }
//
//}
//
//
//$FunResult = MultipTable(2, 6);
//
//echo $FunResult, '<br>';





//------------------------------5-----------------------------------------
//$Word = '  ';
//
//function Palindrom($Word){
//    $ArrWord = str_split($Word);
//
//    $counter1 = 0;
//    for ($i = 0; $i <= (int)((count($ArrWord))/2)-1; $i++) {
//        if ($ArrWord[$i] == $ArrWord[count($ArrWord)-$i-1]) {
//            $counter1++;
//        }
//    }
//    if (intval((count($ArrWord))/2) == $counter1) {
//        return 'Палиндром';
//    } else {
//        return 'НЕ палиндром';
//    }
//}
//$FunResult = Palindrom($Word);
//echo $FunResult, '<br>';
//------------------------------6-----------------------------------------
//echo date('d.m.o G:i'), '<br>';
//echo strtotime("24 February 2016 4 hours 2 minutes"), '<br>';
////------------------------------7-----------------------------------------
//$str='Карл у Клары украл Кораллы';
//echo str_replace('К', '', $str), '<br>';
//
//$str='Две бутылки лимонада';
//print_r(str_replace('Две', 'три', $str));
////------------------------------8-----------------------------------------
//$str1='RX packets:381 errors:0 dropped:0 overruns:)0 frame:0.';
//function get_RX($str)
//{
//    if (strpos($str, ':)') !== false) {
//        return  draw_smile();
//    }
//    $ArrStr = explode(" ", $str);
//    $str = str_replace("packets:", "", $ArrStr[1]);
//    if ($str>1000) {
//        return "сеть есть";
//    } else {
//        return 'сети нет';
//    }
//}
//
//$FunResult = get_RX($str1);
//echo $FunResult, '<br>';
//
//function draw_smile(){
//$str = "
//████████████████████████████████████████<br />
//█████████████▀▀░░░░░░░░░░▀▀▀████████████<br />
//█████████▀▀░░░░░░░░░░░░░░░░░░░▀█████████<br />
//███████▀░░░░░░░░░░░░░░░░░░░░░░░░▀███████<br />
//█████▀░▄▄▄░░░░░░░░░░░░░░▄▄▄▄░░░░░░▀█████<br />
//████▀▄▀░░░██▄░░░░░░░░░▄▀░░░▄██▄░░░░░████<br />
//███▀█░░░░█████░░░░░░░█░░░░░█████░░░░░███<br />
//██▀░█░░░░░░░░█░░░░░░▄░░░░░░░░░░█░░░░░▀██<br />
//██░░█░░░░░░░░█░░░░░░▀▄░░░░░░░░░█░░░░░░██<br />
//██░░▀▀▀▀▀▀▀▀▀▀░░░░░░░▀▀▀▀▀▀▀▀▀▀▀░░░░░░██<br />
//██░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░██<br />
//██░░░▀█████████████████████████▄░░░░░░██<br />
//██▄░░░▀█████████████████████████░░░░░▄██<br />
//███▄░░░█████████████████████████░░░░░███<br />
//████▄░░░███████████▀▀▀▀▀▀██████░░░░░████<br />
//█████▄░░░▀███████▀░░░░░░░░░▀██░░░░▄█████<br />
//███████▄░░░▀████░░░░░░░░░░▄█▀░░░▄███████<br />
//█████████▄░░░▀▀█▄▄▄▄▄▄▄▄▀▀░░░░▄█████████<br />
//████████████▄▄▄░░░░░░░░░░▄▄▄████████████<br />
//████████████████████████████████████████";
//    return $str;
//}

////------------------------------9-----------------------------------------
//$myfile = file_put_contents("test.txt", "Hello world");
//
//GetCont('test.txt');
//function GetCont($fileName)
//{
//    $contFile = file_get_contents($fileName, true);
//    echo $contFile;
//}
////------------------------------10-----------------------------------------
//$myfile = file_put_contents("anothertest.txt", "Hello again");


?>
</body>
</html>