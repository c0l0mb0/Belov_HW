<?php

class Controller_all_user extends Controller
{
    function __construct()
    {
        $this->model = new Model_all_user();
        $this->view = new View();

    }


    public
    function action_index()
    {

        if (isset($_SESSION['user_id'])) {
            $ID = $_SESSION['user_id'];

            $UsersInfo = $this->model->get_UsersSortByAge();

            //flatted array
            $UsersInfoMerge = array();
            foreach ($UsersInfo as $i) {
                if (($ArrNames[] = $i['Birth_Year']) > (date("Y")-18)) {
                    $adult = 'не совершеннолетний';
                } else {
                    $adult = 'совершеннолетний';
                }
                $UsersInfoMerge[] = $i['Name']." ". $ArrNames[] = $i['Birth_Year']." ".$adult ;
            }

            $this->view->generate('all_user_view.twig', array('title' => 'Список пользователей', 'users' => $UsersInfoMerge));
        } else {
            $this->view->generate('about_user_error_view.twig', array('title' => 'У вас нет прав на просмотр данной страницы'));

        }


    }
}