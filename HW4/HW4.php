<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title> домашка 4 </title>
</head>
<body>
<H1> домашка 4</H1>

<?php
//------------------------------ 1 ---------------------------------------

$fileContents = file_get_contents('something.xml');
file_put_contents('data.xml',$fileContents);
$fileContents = file_get_contents('something.xml');
echo $fileContents, '</br>';

//------------------------------ 2 ---------------------------------------
$ArrSport = array (
    "Football"=> array (
        "Players" => 22,
        "Ball" => 1,
        "BestPlayer" => "Ronaldo"),
    "Basketball" => array(
        "Players" => 10,
        "Ball" => 1,
        "BestPlayer" => "Jordan"),
    "Hokey" => 12,
    "Ball" => 1,
    "BestPlayer" => "Ovechkin"
);
$JsonContent = json_encode($ArrSport);
file_put_contents('output.json',$JsonContent);

///////////////
$fileContents = file_get_contents('output.json');
$value = rand(0,1) == 1; //get random bit
if ($value) {
    echo " меняем ", '</br>';
    $fileContents = $fileContents . ' new ' . strrev($fileContents);// existing content plus reversing
}
file_put_contents('output2.json', $fileContents);
///////////////
$fileContentsOld = file_get_contents('output.json');
echo "Старый ".$fileContentsOld, '</br>';
$fileContentsNew = file_get_contents('output2.json');
echo "Новый ".$fileContentsNew, '</br>';


DifferStr($fileContentsOld,$fileContentsNew);
function DifferStr ($str1, $str2){

    $ArrStr1 = str_split ($str1);
    $ArrStr2 = str_split ($str2);

    if (count($ArrStr1)>=count($ArrStr2)){
        for ($i = 0; $i < count($ArrStr2); $i++){
            if (strcmp($ArrStr1[$i],$ArrStr2[$i]) <> 0){
                echo  " JSON1 ".$ArrStr1[$i]." JSON2 ".$ArrStr2[$i]." Номер символа ".($i+1), '</br>';
            }
        }
        for ($i = count($ArrStr2); $i < count($ArrStr1); $i++){
            echo  " JSON1 ".$ArrStr1[$i]." JSON2 - отсутствует Номер символа ".($i+1), '</br>';
        }
    }
    if (count($ArrStr1)<count($ArrStr2)){
        for ($i = 0; $i < count($ArrStr1); $i++){
            if (strcmp($ArrStr1[$i],$ArrStr2[$i]) <> 0){
                echo  " JSON1 ".$ArrStr1[$i]." JSON2 ".$ArrStr2[$i]." Номер символа ".($i+1), '</br>';
            }
        }
        for ($i = count($ArrStr1); $i < count($ArrStr2); $i++){
            echo  " JSON1 - отсутствует JSON2 ".$ArrStr2[$i]."  Номер символа ".($i+1), '</br>';
        }
    }
}
//------------------------------ 3 ---------------------------------------
$RandArrDimens = rand(50,rand());
$RandArrDimens = rand(10,20);
echo $RandArrDimens, '</br>';
for ($i = 0; $i < $RandArrDimens; $i++){
    $ArrRand[$i] = rand(1,100);
}

print_r($ArrRand);
/////////////////////////////
$handle = fopen('some.csv',"w");
fputcsv($handle,$ArrRand);
fclose($handle);
///////////////////////////////
if (($handle = fopen("some.csv", "r")) !== FALSE){
    $ArrCSV = fgetcsv($handle);
}
$sum = 0;

foreach ($ArrCSV as $value){
    if ($value%2 == 0){
        $sum = $sum + $value;
    }
}
fclose($handle);
echo $sum , '</br>';
//------------------------------ 4 ---------------------------------------
// инициализация сеанса
$ch = curl_init();

// установка URL и других необходимых параметров
curl_setopt($ch, CURLOPT_URL, "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //string instead of bool

    $data = curl_exec($ch);

    curl_close($ch);

//echo  html_entity_decode($data), '</br>';
//echo  strlen ($data), '</br>';
////////////////////
$result = GetParamsValue($data,'title','pageid');
print_r($result);
function GetParamsValue($data,$param1,$param2){
    $ArrParam = (func_get_args());//create array
    array_shift($ArrParam);//delete first element
    if (empty($ArrParam)  ) { // is an array empty
        return 'array error';
    }
    foreach ($ArrParam as $value) {//are elements correct
           if (strcasecmp(gettype ($value), 'string') <> 0 ){
               return 'array element error';
           }
    }
    $data = func_get_arg(0);//get first element (data)

    for ($i = 0; $i < count($ArrParam); $i++) {
        preg_match_all("/".$ArrParam[$i].".*?,/", $data, $matches);
        if (preg_match('/"/', substr($matches[0][0],-2,1))) {// if are quotes
            $Result[$i] = preg_replace("/(^"."$ArrParam[$i]".".{3})|(..$)/", "",  $matches[0][0]);

        }else{//number
            $Result[$i] = preg_replace("/(^"."$ArrParam[$i]".".{2})|(.$)/", "",  $matches[0][0]);
        }
    }
    return $Result;
}

?>
</body>
</html>