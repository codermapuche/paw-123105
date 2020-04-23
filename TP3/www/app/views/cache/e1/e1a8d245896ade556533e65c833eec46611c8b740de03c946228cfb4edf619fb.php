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

/* error.html */
class __TwigTemplate_0547701ef25c716dd641dbe6bc8645b42db844998e433d64d345ed80119846c5 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html", "error.html", 1);
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
        echo "<blockquote>
\t<code>";
        // line 9
        echo twig_escape_filter($this->env, ($context["code"] ?? null), "html", null, true);
        echo "</code>
\t";
        // line 10
        echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
        echo "
</blockquote>
";
    }

    public function getTemplateName()
    {
        return "error.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 10,  65 => 9,  62 => 8,  58 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html\" %}

{% block header %}
\t{{ include('partials/header.html') }}
{% endblock %}

{% block main %}
<blockquote>
\t<code>{{ code }}</code>
\t{{ error }}
</blockquote>
{% endblock %}", "error.html", "C:\\Users\\Nehuen\\Desktop\\UNLu\\paw-123105\\TP3\\www\\app\\views\\error.html");
    }
}
