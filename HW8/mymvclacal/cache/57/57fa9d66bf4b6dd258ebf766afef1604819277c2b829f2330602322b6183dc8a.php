<?php

/* about_user_view.twig */
class __TwigTemplate_13fb6fc502ff1f2ee67a57e997271c04c02c8252c8cbb2aee119749009125d79 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "about_user_view.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h1>


    <form action=\"http://mymvclacal/about_user/save_user_inf\" method=\"post\"  enctype=\"multipart/form-data\">
        <p>
            <label>Ваше имя<br></label>
        </p>
        <input name=\"Name\" id=\"Name\" type=\"text\" size=\"38\" maxlength=\"20\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\">
        <p>
        <p>
            <label>О себе<br></label>
        </p>
        <textarea name=\"About_user\" id=\"About_user\" type=\"text\" cols=\"40\" rows=\"5\"
                  maxlength=\"255\">";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["About_user"]) ? $context["About_user"] : null), "html", null, true);
        echo "</textarea>
        <p>

            <div>
        <p>
            <label>Год рождения (4 цифры)<br></label>
        </p>
        <input type=\"number\" name=\"age\" id=\"age\" min=\"1\" max=\"2100\" step=\"1\" size=\"4\" maxlength=\"4\"
               value=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["Birth_Year"]) ? $context["Birth_Year"] : null), "html", null, true);
        echo "\">

        </div>
        <br>
        <input type=\"submit\" name=\"SaveUserInfo\" value=\"Сохранить данные\">
        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 31
            echo "            <div class=\"col-md-15\">
                <li style=\"color:red;\">";
            // line 32
            echo twig_escape_filter($this->env, $context["row"], "html", null, true);
            echo "</li>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "
        <div>
            <p><label>Загрузка изображения<br></label></p>
            <input type=\"file\" name=\"picture\" >


            <br>
            <input type=\"submit\" name=\"PhotoLoad\" value=\"Загрузить фото\">
            <div>  <li style=\"color:red;\">";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["status"]) ? $context["status"] : null), "html", null, true);
        echo "</li>   </div>

        </div>
    </form>
    <br>
    <div><p><label>Список ваших фотографий<br></p></label> </div>
    ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["FileList"]) ? $context["FileList"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 50
            echo "        <div class=\"col-md-15\">
            ";
            // line 51
            echo twig_escape_filter($this->env, $context["row"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "
";
    }

    public function getTemplateName()
    {
        return "about_user_view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 54,  112 => 51,  109 => 50,  105 => 49,  96 => 43,  86 => 35,  77 => 32,  74 => 31,  70 => 30,  62 => 25,  51 => 17,  42 => 11,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "about_user_view.twig", "E:\\OServer\\OpenServer\\domains\\mymvclacal\\app\\views\\twig\\about_user_view.twig");
    }
}
