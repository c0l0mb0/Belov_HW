<?php
//авторизайия->
$client_id = '5784142'; // ID приложения
$TargetWallId = '6196568';
$client_secret = 'nEWXP2KNglIvLV837Z4t'; // Защищённый ключ
$redirect_uri = 'http://test-application.local'; // Адрес сайта
$picture_name = "fire1.jpg";
$picture_path = __DIR__ . DIRECTORY_SEPARATOR . $picture_name;
$text = 'привет_от_php';
$token = '6089ced22e8f90dc07c08e1de60b1b11c60b8231596e2894a7def50e81866118815f7df4a10682a57e497';


//    $url = 'http://oauth.vk.com/authorize';

//    $params = array(
//        'client_id' => $client_id,
//        'redirect_uri' => $redirect_uri,
//        'response_type' => 'code',
//        'scope' => 'wall,photos,status'
//
//    );
//
//    echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Отправить картинку на стену</a></p>';
//
//if (isset($_GET['code'])) {
//    echo 'code ' . $_GET['code'], '<br>';
//    //$result = false;
//    $params = array(
//        'client_id' => $client_id,
//        'client_secret' => $client_secret,
//        'code' => $_GET['code'],
//        'redirect_uri' => $redirect_uri
//
//    );
//
//    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
//    //if we have token
//    if (isset($token['access_token'])) {
//        echo 'TOKEN  ' . $token['access_token'], '<br>';

//        $params = array(
//            'uids'         => $token['user_id'],
//            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
//            'access_token' => $token['access_token']
//        );
//
//
//        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
//        if (isset($userInfo['response'][0]['uid'])) {
//            $userInfo = $userInfo['response'][0];
//            $result = true;
//        }
$upload_url = vkAPI('photos.getWallUploadServer', ['owner_id' => $TargetWallId, 'access_token' => $token])->response->upload_url;

try {
    $ch = curl_init($upload_url);
    $cfile = curl_file_create($picture_path, mime_content_type($picture_path), $picture_name);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['photo' => $cfile]);
    $responseUpload = json_decode(curl_exec($ch));
    curl_close($ch);
    echo 'Картинка успешно загружена<br>';
} catch (Exception $e) {
    exit('Неизвестная ошибка при попытке загрузки картинки');
}

$responseSave = vkAPI('photos.saveWallPhoto', [
    'user_id' => $TargetWallId,
    'photo' => stripslashes($responseUpload->photo),
    'server' => $responseUpload->server,
    'hash' => $responseUpload->hash,
    'access_token' => $token
]);
if ($responseSave->error) {

    exit('Неизвестная ошибка при попытке сохранения картинки');

} else {
    echo 'Картинка успешно сохранена<br>';
}
$responsePost = vkAPI('wall.post', [
    'owner_id' => $TargetWallId,

    'message' => $text,
    'attachments' => $responseSave->response[0]->id,
    'hash' => $responseSave->response[0]->hash,
    'access_token' => $token
]);
if ($responsePost->error) {
    if ($responsePost->error->error_code == 214) {
        exit('Стена закрыта для постинга');
    } else {
        exit('Неизвестная ошибка при попытке постинга');
    }
} else {
    echo 'Пост успешно добавлен';
}

function vkAPI($method, array $data = [])
{
    $params = [];
    foreach ($data as $name => $val) {
        $params[$name] = $val;
    }
    $json = file_get_contents('https://api.vk.com/method/' . $method . '?' . http_build_query($params));
    echo "<pre>";
    print_r($json);
    return json_decode($json);

}

?>