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

/* index.html */
class __TwigTemplate_051ed4b391c25232ae6a05dc7c8ebea030c29a8809ff692db920b769590e5086 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html", "index.html", 1);
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
        echo "<h1>Turnos</h1>

<table border=\"1\">
\t<tr>
\t\t<th>Fecha</th>
\t\t<th>Hora</th>
\t\t<th>Paciente</th>
\t\t<th>Telefono</th>
\t\t<th>Email</th>
\t\t<th>Acciones</th>
\t</tr>
\t
\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["turnos"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["turno"]) {
            echo "\t
\t<tr>
\t\t<td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "turno", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "horario", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "nombre", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "telefono", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "email", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
\t\t<td>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"/turnos/editar?id=";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "id", [], "any", false, false, false, 30), "html", null, true);
            echo "\">Editar</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"/turnos/ver?id=";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "id", [], "any", false, false, false, 33), "html", null, true);
            echo "\">Ver</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"/turnos/borrar?id=";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "id", [], "any", false, false, false, 36), "html", null, true);
            echo "\">Borrar</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</td>
\t</tr>
\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 42
            echo "\t<tr>
\t\t<td colspan=\"6\">No hay turnos registrados</td>
\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['turno'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 46,  130 => 42,  119 => 36,  113 => 33,  107 => 30,  100 => 26,  96 => 25,  92 => 24,  88 => 23,  84 => 22,  76 => 20,  62 => 8,  58 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html\" %}

{% block header %}
\t{{ include('partials/header.html') }}
{% endblock %}

{% block main %}
<h1>Turnos</h1>

<table border=\"1\">
\t<tr>
\t\t<th>Fecha</th>
\t\t<th>Hora</th>
\t\t<th>Paciente</th>
\t\t<th>Telefono</th>
\t\t<th>Email</th>
\t\t<th>Acciones</th>
\t</tr>
\t
\t{% for turno in turnos %}\t
\t<tr>
\t\t<td>{{ turno.turno }}</td>
\t\t<td>{{ turno.horario }}</td>
\t\t<td>{{ turno.nombre }}</td>
\t\t<td>{{ turno.telefono }}</td>
\t\t<td>{{ turno.email }}</td>
\t\t<td>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"/turnos/editar?id={{ turno.id }}\">Editar</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"/turnos/ver?id={{ turno.id }}\">Ver</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"/turnos/borrar?id={{ turno.id }}\">Borrar</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</td>
\t</tr>
\t{% else %}
\t<tr>
\t\t<td colspan=\"6\">No hay turnos registrados</td>
\t</tr>
\t{% endfor %}
</table>
{% endblock %}", "index.html", "C:\\Users\\Nehuen\\Desktop\\UNLu\\paw-123105\\TP3\\www\\app\\views\\index.html");
    }
}
