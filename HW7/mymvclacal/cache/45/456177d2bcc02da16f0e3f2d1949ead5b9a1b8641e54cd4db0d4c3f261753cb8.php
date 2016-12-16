<?php

/* authorif_view.twig */
class __TwigTemplate_1e106a1cd4a7595c7cbba8cf743f65cdd892606f4b444419742637946a327648 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "authorif_view.twig", 1);
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
    <p>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
        echo "</p>
    <form action=\"http://mymvclacal/authorif/check_pass\" method=\"post\">
        <p>
            <label>Ваш логин:<br></label>
            <input name=\"login\" id=\"login\" type=\"text\" size=\"15\" maxlength=\"15\">
                </p>
        <p>
            <label>Ваш пароль:<br></label>
            <input name=\"password\" type=\"password\" size=\"15\" maxlength=\"15\">
        </p>
        <p>
            <label>Адрес почты:<br></label>
            <input name=\"mail\" id=\"mail\" type=\"text\" size=\"15\" maxlength=\"20\">
        </p>
        <p>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        </p>
        <div class=\"g-recaptcha\" data-sitekey=\"6LdHxw4UAAAAAK8UK0hu_Qc_PCEr7WGmHDxOjQhR\"></div>
        <p>
            <input type=\"submit\" name=\"Enter\" value=\"Войти\">
            <input type=\"submit\" name=\"Registration\" value=\"Регистрация\">
            <input type=\"submit\" name=\"SendMeLetter\" value=\"Отправить мне письмо через SMTP\">
        </p></form>
    <div class=\"row\">

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
        <p>";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["result"]) ? $context["result"] : null), "html", null, true);
        echo "</p>
    </div>
    ";
    }

    public function getTemplateName()
    {
        return "authorif_view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 36,  80 => 35,  71 => 32,  68 => 31,  64 => 30,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "authorif_view.twig", "E:\\OServer\\OpenServer\\domains\\mymvclacal\\app\\views\\twig\\authorif_view.twig");
    }
}
