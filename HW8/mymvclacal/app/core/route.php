<?php

class Route
{

    static function start()
    {
        $controller_name = 'Main';
        $action_name = 'index';
        //http:/mymvclocal/controller/action
        //http:/mymvclocal/api(routes[1])/v1(routes[2])/get(routes[3])/users(routes[4])/1(routes[5])

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            if (strcasecmp($routes[1], "api") == 0) {

                $rest_api_name = 'Rest_api_' . $routes[2];
                $rest_api_file = strtolower($rest_api_name) . '.php';
                $rest_api_path = 'app/core/' . $rest_api_file;

                if (file_exists($rest_api_path)) {
                    include $rest_api_path;

                    $REST_api = new $rest_api_name;
                    $method = $_SERVER['REQUEST_METHOD'];
                    $table = $routes[4];
                    if (!empty($routes[5])) {
                        $param = $routes[5];
                        $ArrParam = explode(',', $param);
                    }

                    switch (true) {
                            //show all
                        case ($method == 'GET' and empty($param) and $table = 'goods'):
                            $data = $REST_api->index();
                            break;
                            //show id
                        case ($method == 'GET' and !empty($param) and $table = 'goods'):
                            $data = $REST_api->show($ArrParam[0]);
                            break;
                            //edit name where id
                        case ($method == 'PUT' and !empty($param) and $table = 'goods'):
                            $REST_api->edit($ArrParam[0],$ArrParam[1]);
                            $data = $REST_api->show($ArrParam[0]);
                            break;
                            //new name,category,amount
                        case ($method == 'POST' and !empty($param)and $table = 'goods')://add
                            $REST_api->store($ArrParam[0],$ArrParam[1],$ArrParam[2]);
                            $data = $REST_api->index();
                            break;
                        case ($method == 'DELETE' and !empty($param) and $table = 'goods'):
                            $REST_api->destroy($ArrParam[0]);
                            $data = $REST_api->index();
                            break;
                        default:
                            $data="unknown operation";
                            break;
                    }
                    //display russian characters
                    $data = json_decode($data);
                    $data = json_encode($data,JSON_UNESCAPED_UNICODE);
                    if (!empty($data)) {
                        http_response_code(200);
                        echo($data);
                    }
                }
                die();
            } else {
                $controller_name = $routes[1];
            }
        }
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }


        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        $model_file = strtolower($model_name) . '.php';
        $model_path = "app/models/" . $model_file;
        if (file_exists($model_path)) {
            include $model_path;
        }

        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = 'app/controllers/' . $controller_file;
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            Route::ErrorPage404();
        }
        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }

    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:' . $host . '404');
    }
}