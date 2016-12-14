<?php

/* layout.twig */
class __TwigTemplate_b768a94f31a47c4dd1a69bc6d34729fe27e5676f24f5c1073ea36380e6bd8582 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Мой сайт</title>
    <link rel=\"stylesheet\" href=\"/assets/template/css/bootstrap.css\"/>
    <link rel=\"stylesheet\" href=\"/assets/template/css/bootstrap-theme.css\"/>
</head>
<body>

<nav class=\"navbar navbar-inverse navbar-fixed-top\">
    <div class=\"container\">
        ";
        // line 14
        echo "            ";
        // line 15
        echo "                ";
        // line 16
        echo "                ";
        // line 17
        echo "            ";
        // line 18
        echo "            ";
        // line 19
        echo "        ";
        // line 20
        echo "        <div id=\"navbar\" class=\"navbar-collapse collapse\">
            <ul class=\"nav navbar-nav\">
                <li><a href=\"/\">Главная</a></li>
                <li><a href=\"/authorif/\">Вход/регистрация</a></li>
                <li><a href=\"/about_user/\">Загруженные файлы и список пользователей</a></li>
                <li><a href=\"/all_user/\">Все пользователи</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class=\"jumbotron\">
    <div class=\"container\">
        ";
        // line 33
        $this->displayBlock('content', $context, $blocks);
        // line 35
        echo "    </div>
</div>

<div class=\"container\">
    <hr/>
    <footer>
        <p>&copy; Ivan</p>
    </footer>
</div>


<script src=\"https://code.jquery.com/jquery-1.12.4.min.js\"></script>
<script src=\"/assets/template/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    // line 33
    public function block_content($context, array $blocks = array())
    {
        // line 34
        echo "        ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  84 => 34,  81 => 33,  63 => 35,  61 => 33,  46 => 20,  44 => 19,  42 => 18,  40 => 17,  38 => 16,  36 => 15,  34 => 14,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.twig", "E:\\OServer\\OpenServer\\domains\\mymvclacal\\app\\views\\twig\\layout.twig");
    }
}
