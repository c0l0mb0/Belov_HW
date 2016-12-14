<?php

/* about_user_view.twig */
class __TwigTemplate_207b1f1d70804ebd9c04acc477e344b59ebda36f77f875e4887e5e5644d2da51 extends Twig_Template
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
        if (isset($context["title"])) { $_title_ = $context["title"]; } else { $_title_ = null; }
        echo twig_escape_filter($this->env, $_title_, "html", null, true);
        echo "</h1>


    <form action=\"http://mymvclacal/about_user/save_user_inf\" method=\"post\"  enctype=\"multipart/form-data\">
        <p>
            <label>Ваше имя<br></label>
        </p>
        <input name=\"Name\" id=\"Name\" type=\"text\" size=\"38\" maxlength=\"20\" value=\"";
        // line 11
        if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
        echo twig_escape_filter($this->env, $_name_, "html", null, true);
        echo "\">
        <p>
        <p>
            <label>О себе<br></label>
        </p>
        <textarea name=\"About_user\" id=\"About_user\" type=\"text\" cols=\"40\" rows=\"5\"
                  maxlength=\"255\">";
        // line 17
        if (isset($context["About_user"])) { $_About_user_ = $context["About_user"]; } else { $_About_user_ = null; }
        echo twig_escape_filter($this->env, $_About_user_, "html", null, true);
        echo "</textarea>
        <p>

            <div>
        <p>
            <label>Год рождения (4 цифры)<br></label>
        </p>
        <input type=\"number\" name=\"age\" id=\"age\" min=\"1\" max=\"2100\" step=\"1\" size=\"4\" maxlength=\"4\"
               value=\"";
        // line 25
        if (isset($context["Birth_Year"])) { $_Birth_Year_ = $context["Birth_Year"]; } else { $_Birth_Year_ = null; }
        echo twig_escape_filter($this->env, $_Birth_Year_, "html", null, true);
        echo "\">

        </div>
        <br>
        <input type=\"submit\" name=\"SaveUserInfo\" value=\"Сохранить данные\">

        <div>
            <p><label>Загрузка изображения<br></label></p>
            <input type=\"file\" name=\"picture\" >


            <br>
            <input type=\"submit\" name=\"PhotoLoad\" value=\"Загрузить фото\">
            <div>  <li style=\"color:red;\">";
        // line 38
        if (isset($context["status"])) { $_status_ = $context["status"]; } else { $_status_ = null; }
        echo twig_escape_filter($this->env, $_status_, "html", null, true);
        echo "</li>   </div>

        </div>
    </form>
    <br>
    <div><p><label>Список ваших фотографий<br></p></label> </div>
    ";
        // line 44
        if (isset($context["FileList"])) { $_FileList_ = $context["FileList"]; } else { $_FileList_ = null; }
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($_FileList_);
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 45
            echo "        <div class=\"col-md-15\">
            ";
            // line 46
            if (isset($context["row"])) { $_row_ = $context["row"]; } else { $_row_ = null; }
            echo twig_escape_filter($this->env, $_row_, "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
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
        return array (  110 => 49,  100 => 46,  97 => 45,  92 => 44,  82 => 38,  65 => 25,  53 => 17,  43 => 11,  31 => 4,  28 => 3,  11 => 1,);
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
