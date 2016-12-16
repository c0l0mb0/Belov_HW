<?php
class Controller_404 extends Controller {
    public function action_index() {
       // $this->view->generate('404_view.php','template_view.php');
        $this->view->generate('main_view.twig',
            array(
                'title'=>'Ошибка 404',
                'content'=> "Данной страницы не сущетвует!"
            ));
    }
}