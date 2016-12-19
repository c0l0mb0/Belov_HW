<?php
$path = str_replace('\\', '/', __DIR__);
require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

class View
{

    private $twig;

    function __construct()
    {
        $loader = new Twig_Loader_Filesystem('app/views/twig');
        $twig = new Twig_Environment($loader, array(
            'cache' => 'cache',
            'auto_reload' => true
        ));
        $this->twig = $twig;

    }


    function generate($content_view, $data = null)
    {
        echo $this->twig->render($content_view, $data);
    }

}