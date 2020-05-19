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

/* form.html */
class __TwigTemplate_a06ce887f48c2f95b5e39a458a96f75c6e92546654ba6720edb2c83d179235b4 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html", "form.html", 1);
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
        echo "<h1>Nuevo</h1>
\t\t
";
        // line 10
        if (($context["error"] ?? null)) {
            // line 11
            echo "<blockquote>
\t";
            // line 12
            echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
            echo "
</blockquote>
";
        }
        // line 15
        echo "
<form action=\"/turnos/guardar\" method=\"POST\" enctype=\"multipart/form-data\">
\t<input type=\"hidden\" name=\"id\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\">
\t
\t<div>
\t\t<label for=\"nombre\">Nombre</label>
\t\t<input type=\"text\" id=\"nombre\" name=\"nombre\" placeholder=\"Nombre\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, ($context["nombre"] ?? null), "html", null, true);
        echo "\" required>
\t</div>
\t<div>
\t\t<label for=\"email\">Email</label>
\t\t<input type=\"email\" name=\"email\" placeholder=\"Email\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "\" required>
\t</div>
\t<div>
\t\t<label for=\"telefono\">Telefono</label>
\t\t<input type=\"tel\" id=\"telefono\" name=\"telefono\" pattern=\"\\d{4} \\- \\d{2} \\d{4}\" placeholder=\"Telefono (9999 - 99 9999)\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, ($context["telefono"] ?? null), "html", null, true);
        echo "\" required>
\t</div>
\t<div>
\t\t<label for=\"nacimiento\">Fecha de nacimiento</label>
\t\t<input type=\"date\" id=\"nacimiento\" name=\"nacimiento\" placeholder=\"Nacimiento\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["nacimiento"] ?? null), "html", null, true);
        echo "\" required>
\t</div>
\t<div>
\t\t<label for=\"calzado\">Calzado</label>
\t\t<input type=\"number\" id=\"calzado\" name=\"calzado\" step=\"1\" min=\"20\" max=\"45\" placeholder=\"Calzado\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, ($context["calzado"] ?? null), "html", null, true);
        echo "\">
\t</div>
\t<div>
\t\t<label for=\"altura\">Altura</label>
\t\t<input type=\"range\" id=\"altura\" name=\"altura\" step=\"1\" min=\"12\" max=\"240\" placeholder=\"Altura (CM)\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["altura"] ?? null), "html", null, true);
        echo "\">
\t</div>
\t<div>
\t\t<label for=\"pelo\">Color de pelo</label>
\t\t<select id=\"pelo\" name=\"pelo\">
\t\t";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["_pelos"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["_pelo"]) {
            // line 47
            echo "\t\t<option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["_pelo"], "id", [], "any", false, false, false, 47), "html", null, true);
            echo "\" ";
            echo (((twig_get_attribute($this->env, $this->source, $context["_pelo"], "id", [], "any", false, false, false, 47) == ($context["pelo"] ?? null))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["_pelo"], "nombre", [], "any", false, false, false, 47), "html", null, true);
            echo "</option>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['_pelo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "\t\t</select>
\t</div>
\t<div>
\t\t<label for=\"turno\">Fecha de turno</label>
\t\t<input type=\"date\" id=\"turno\" name=\"turno\" placeholder=\"Turno\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, ($context["turno"] ?? null), "html", null, true);
        echo "\" required>
\t</div>
\t<div>
\t\t<label for=\"horario\">Hora de turno</label>
\t\t<input id=\"horario\" name=\"horario\" type=\"time\" min=\"08:00\" max=\"17:00\" step=\"900\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, ($context["horario"] ?? null), "html", null, true);
        echo "\" required>
\t</div>
\t<div>
\t\t<label for=\"diagnostico\">Diagnostico</label>
\t\t<input type=\"file\" id=\"diagnostico\" name=\"diagnostico\" accept=\"image/x-png,image/jpeg\" />
\t</div>
\t<div>
\t\t<input type=\"submit\" value=\"Guardar\">
\t\t<input type=\"reset\" value=\"Vaciar\">
\t</div>
</form>
";
    }

    public function getTemplateName()
    {
        return "form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 57,  154 => 53,  148 => 49,  135 => 47,  131 => 46,  123 => 41,  116 => 37,  109 => 33,  102 => 29,  95 => 25,  88 => 21,  81 => 17,  77 => 15,  71 => 12,  68 => 11,  66 => 10,  62 => 8,  58 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html\" %}

{% block header %}
\t{{ include('partials/header.html') }}
{% endblock %}
\t\t
{% block main %}
<h1>Nuevo</h1>
\t\t
{% if error %}
<blockquote>
\t{{ error }}
</blockquote>
{% endif %}

<form action=\"/turnos/guardar\" method=\"POST\" enctype=\"multipart/form-data\">
\t<input type=\"hidden\" name=\"id\" value=\"{{ id }}\">
\t
\t<div>
\t\t<label for=\"nombre\">Nombre</label>
\t\t<input type=\"text\" id=\"nombre\" name=\"nombre\" placeholder=\"Nombre\" value=\"{{ nombre }}\" required>
\t</div>
\t<div>
\t\t<label for=\"email\">Email</label>
\t\t<input type=\"email\" name=\"email\" placeholder=\"Email\" value=\"{{ email }}\" required>
\t</div>
\t<div>
\t\t<label for=\"telefono\">Telefono</label>
\t\t<input type=\"tel\" id=\"telefono\" name=\"telefono\" pattern=\"\\d{4} \\- \\d{2} \\d{4}\" placeholder=\"Telefono (9999 - 99 9999)\" value=\"{{ telefono }}\" required>
\t</div>
\t<div>
\t\t<label for=\"nacimiento\">Fecha de nacimiento</label>
\t\t<input type=\"date\" id=\"nacimiento\" name=\"nacimiento\" placeholder=\"Nacimiento\" value=\"{{ nacimiento }}\" required>
\t</div>
\t<div>
\t\t<label for=\"calzado\">Calzado</label>
\t\t<input type=\"number\" id=\"calzado\" name=\"calzado\" step=\"1\" min=\"20\" max=\"45\" placeholder=\"Calzado\" value=\"{{ calzado }}\">
\t</div>
\t<div>
\t\t<label for=\"altura\">Altura</label>
\t\t<input type=\"range\" id=\"altura\" name=\"altura\" step=\"1\" min=\"12\" max=\"240\" placeholder=\"Altura (CM)\" value=\"{{ altura }}\">
\t</div>
\t<div>
\t\t<label for=\"pelo\">Color de pelo</label>
\t\t<select id=\"pelo\" name=\"pelo\">
\t\t{% for _pelo in _pelos %}
\t\t<option value=\"{{ _pelo.id }}\" {{ _pelo.id == pelo ? \"selected\" : \"\" }}>{{ _pelo.nombre }}</option>
\t\t{% endfor %}
\t\t</select>
\t</div>
\t<div>
\t\t<label for=\"turno\">Fecha de turno</label>
\t\t<input type=\"date\" id=\"turno\" name=\"turno\" placeholder=\"Turno\" value=\"{{ turno }}\" required>
\t</div>
\t<div>
\t\t<label for=\"horario\">Hora de turno</label>
\t\t<input id=\"horario\" name=\"horario\" type=\"time\" min=\"08:00\" max=\"17:00\" step=\"900\" value=\"{{ horario }}\" required>
\t</div>
\t<div>
\t\t<label for=\"diagnostico\">Diagnostico</label>
\t\t<input type=\"file\" id=\"diagnostico\" name=\"diagnostico\" accept=\"image/x-png,image/jpeg\" />
\t</div>
\t<div>
\t\t<input type=\"submit\" value=\"Guardar\">
\t\t<input type=\"reset\" value=\"Vaciar\">
\t</div>
</form>
{% endblock %}", "form.html", "C:\\Users\\Nehuen\\Desktop\\UNLu\\paw-123105\\TP3\\www\\app\\views\\form.html");
    }
}
