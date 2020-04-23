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

/* partials/header.html */
class __TwigTemplate_f06475ce839bea8cebeb8da8f7f3e1770f7776667594e836b0a4dbb57621d91f extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<header>
\t<nav>
\t\t<ul>
\t\t\t<li><a href=\"/turnos/index\">Inicio</a>
\t\t\t<li><a href=\"/turnos/nuevo\">Nuevo</a>
\t\t</ul>
\t</nav>
</header>";
    }

    public function getTemplateName()
    {
        return "partials/header.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header>
\t<nav>
\t\t<ul>
\t\t\t<li><a href=\"/turnos/index\">Inicio</a>
\t\t\t<li><a href=\"/turnos/nuevo\">Nuevo</a>
\t\t</ul>
\t</nav>
</header>", "partials/header.html", "C:\\Users\\Nehuen\\Desktop\\UNLu\\paw-123105\\TP3\\www\\app\\views\\partials\\header.html");
    }
}
