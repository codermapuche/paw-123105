<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* view.html */
class __TwigTemplate_c8a28ebab62231b03c9bb691e268db4852768ce980550dad2c0591bf53501580 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html", "view.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t";
        echo twig_include($this->env, $context, "partials/header.html");
        echo "
";
    }

    // line 7
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "<h1>Turno #";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "</h1>

<ul>
\t<li>Nombre<br>";
        // line 11
        echo twig_escape_filter($this->env, ($context["nombre"] ?? null), "html", null, true);
        echo "</li>
\t<li>Email<br>";
        // line 12
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "</li>
\t<li>Telefono<br>";
        // line 13
        echo twig_escape_filter($this->env, ($context["telefono"] ?? null), "html", null, true);
        echo "</li>
\t<li>Fecha de nacimiento<br>";
        // line 14
        echo twig_escape_filter($this->env, ($context["nacimiento"] ?? null), "html", null, true);
        echo "</li>
\t<li>Calzado<br>";
        // line 15
        echo twig_escape_filter($this->env, ($context["calzado"] ?? null), "html", null, true);
        echo "</li>
\t<li>Altura<br>";
        // line 16
        echo twig_escape_filter($this->env, ($context["altura"] ?? null), "html", null, true);
        echo "</li>
\t<li>Pelo<br>";
        // line 17
        echo twig_escape_filter($this->env, ($context["_pelo"] ?? null), "html", null, true);
        echo "</li>
\t<li>Fecha de turno<br>";
        // line 18
        echo twig_escape_filter($this->env, ($context["turno"] ?? null), "html", null, true);
        echo "</li>
\t<li>Hora de turno<br>";
        // line 19
        echo twig_escape_filter($this->env, ($context["horario"] ?? null), "html", null, true);
        echo "</li>
\t<li>Diagnostico<br>
\t<img src=\"";
        // line 21
        echo twig_escape_filter($this->env, ($context["diagnostico"] ?? null), "html", null, true);
        echo "\"></li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "view.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 21,  101 => 19,  97 => 18,  93 => 17,  89 => 16,  85 => 15,  81 => 14,  77 => 13,  73 => 12,  69 => 11,  62 => 8,  58 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html\" %}

{% block header %}
\t{{ include('partials/header.html') }}
{% endblock %}

{% block main %}
<h1>Turno #{{ id }}</h1>

<ul>
\t<li>Nombre<br>{{ nombre }}</li>
\t<li>Email<br>{{ email }}</li>
\t<li>Telefono<br>{{ telefono }}</li>
\t<li>Fecha de nacimiento<br>{{ nacimiento }}</li>
\t<li>Calzado<br>{{ calzado }}</li>
\t<li>Altura<br>{{ altura }}</li>
\t<li>Pelo<br>{{ _pelo }}</li>
\t<li>Fecha de turno<br>{{ turno }}</li>
\t<li>Hora de turno<br>{{ horario }}</li>
\t<li>Diagnostico<br>
\t<img src=\"{{ diagnostico }}\"></li>
</ul>
{% endblock %}", "view.html", "C:\\Users\\Nehuen\\Desktop\\UNLu\\paw-123105\\TP3\\www\\app\\views\\view.html");
    }
}
