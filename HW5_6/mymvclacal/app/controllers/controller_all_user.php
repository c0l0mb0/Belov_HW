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
            $ArrUsersSortByAge = $this->model->get_UsersSortByAge();
            //flatted array
            $ArrNames = array();
            foreach ($ArrUsersSortByAge as $i) {
                $ArrNames[] = $i[0] . " " . $i[1]. " " . $i[2];
            }

            $this->view->generate('all_user_view.twig', array('title' => 'Список всех пользователей', 'users' => $ArrNames));
        } else {
            $this->view->generate('about_user_error_view.twig', array('title' => 'У вас нет прав на просмотр данной страницы'));

        }


    }
}