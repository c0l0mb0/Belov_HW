<?php

class Controller_main extends Controller
{
    function __construct()
    {
        $this->model = new Model_main();
        parent::__construct();
        //$this->view = new View();
    }

    public function action_index()
    {
        $data = array('Lorem ipsum dolor sit amet. Placeat, facere possimus, omnis voluptas assumenda est, omnis voluptas assumenda. Voluptas nulla vero eos et iusto. Optio, cumque nihil impedit, quo voluptas sit, amet, consectetur adipisci. Nulla vero eos et harum quidem. Eos et voluptates repudiandae sint et dolore magnam. Sit voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui blanditiis praesentium voluptatum deleniti atque corrupti quos. Ratione voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae.

Asperiores repellat. repudiandae sint. Quibusdam et dolorum fuga maxime placeat, facere possimus, omnis dolor repellendus exercitationem. Laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore. Deserunt mollitia animi, id est eligendi optio cumque. Eius modi tempora incidunt, ut perspiciatis. Officiis debitis aut rerum hic tenetur a sapiente delectus, ut aliquid. Totam rem aperiam eaque ipsa, quae ab illo inventore.

Voluptatum deleniti atque corrupti, quos dolores et quasi architecto beatae vitae dicta. Dolor repellendus eos, qui dolorem. Sed ut et voluptates repudiandae sint. Cum soluta nobis est et quas molestias excepturi sint obcaecati. Odio dignissimos ducimus, qui voluptatum deleniti atque corrupti. Quidem rerum necessitatibus saepe eveniet. Illum, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores eos. Eligendi optio, cumque nihil impedit.');
        // $this->view->generate('404_view.php','template_view.php');
        $this->view->generate('main_view.twig', array('title' => 'Домашнее задание 7', 'data' => $data));
    }
}