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

/* product/index.html.twig */
class __TwigTemplate_13d39da3461b2fbbd080b039c89616b3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "product/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Product";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "         ";
        $this->loadTemplate("_partials/_nav.html.twig", "product/index.html.twig", 6)->display($context);
        // line 7
        echo "
    <div class=\"container mt-4\">
        <h1>Mes produits</h1>
       <a href=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_new");
        echo "\" class=\"btn
        btn-primary\">Créer un produit</a>
        ";
        // line 13
        echo "<div class=\"count mt-4\">
      <h4>
        Il y a ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 15, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 15), "html", null, true);
        echo " produits au total
      </h>   
</div>
      <table class=\"table table-hover mt-4\">
  <thead>
    <tr>
      <th scope=\"col\">Type</th>
      <th scope=\"col\">Nom</th>
      <th scope=\"col\">Prix</th>
      <th scope=\"col\">Stock</th>
      <th scope=\"col\">Picture</th> <!-- Nouvelle colonne pour l'image -->
      <th scope=\"col\">Edition</th>
      <th scope=\"col\">Suppresion</th>
    </tr>
  </thead>
  <tbody>
  ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 31, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 32
            echo "            
       
    <tr class=\"table-primary\">
      <th scope=\"row\">";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 35), "html", null, true);
            echo "</th>
      <td>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36), "html", null, true);
            echo "</td>
      <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
      <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "inStock", [], "any", false, false, false, 38), "html", null, true);
            echo "</td>
      <td><img src=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, $context["product"], "imgPath", [], "any", false, false, false, 39)), "html", null, true);
            echo "\" width=\"50\" height=\"50\"></td> <!-- Affichage de l'image -->
  
      <td>
        <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 42)]), "html", null, true);
            echo "\" class=\"btn
        btn-info\">Modifier</a>
      </td>
      <td>
        <a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 46)]), "html", null, true);
            echo "\" class=\"btn
        btn-info\">Supprimer</a>
      </td>
    </tr>
     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "  </tbody>
</table>
</div>
";
        // line 55
        echo "<div class=\"navigation d-flex justify-content-center mt-4\">
    ";
        // line 56
        echo $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 56, $this->source); })()));
        echo "
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "product/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 56,  178 => 55,  173 => 51,  162 => 46,  155 => 42,  149 => 39,  145 => 38,  141 => 37,  137 => 36,  133 => 35,  128 => 32,  124 => 31,  105 => 15,  101 => 13,  96 => 10,  91 => 7,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Product{% endblock %}

{% block body %}
         {%include \"_partials/_nav.html.twig\" %}

    <div class=\"container mt-4\">
        <h1>Mes produits</h1>
       <a href=\"{{path('product_new') }}\" class=\"btn
        btn-primary\">Créer un produit</a>
        {# total items count #}
<div class=\"count mt-4\">
      <h4>
        Il y a {{ products.getTotalItemCount }} produits au total
      </h>   
</div>
      <table class=\"table table-hover mt-4\">
  <thead>
    <tr>
      <th scope=\"col\">Type</th>
      <th scope=\"col\">Nom</th>
      <th scope=\"col\">Prix</th>
      <th scope=\"col\">Stock</th>
      <th scope=\"col\">Picture</th> <!-- Nouvelle colonne pour l'image -->
      <th scope=\"col\">Edition</th>
      <th scope=\"col\">Suppresion</th>
    </tr>
  </thead>
  <tbody>
  {% for product in products %}
            
       
    <tr class=\"table-primary\">
      <th scope=\"row\">{{product.id}}</th>
      <td>{{product.name}}</td>
      <td>{{product.price}}</td>
      <td>{{product.inStock}}</td>
      <td><img src=\"{{asset(product.imgPath)}}\" width=\"50\" height=\"50\"></td> <!-- Affichage de l'image -->
  
      <td>
        <a href=\"{{path('product_edit', {id : product.id }) }}\" class=\"btn
        btn-info\">Modifier</a>
      </td>
      <td>
        <a href=\"{{path('product_delete', {id : product.id }) }}\" class=\"btn
        btn-info\">Supprimer</a>
      </td>
    </tr>
     {% endfor %}
  </tbody>
</table>
</div>
{# display navigation #}
<div class=\"navigation d-flex justify-content-center mt-4\">
    {{ knp_pagination_render(products) }}
</div>
{% endblock %}
", "product/index.html.twig", "C:\\xampp\\htdocs\\EcommerceTP\\templates\\product\\index.html.twig");
    }
}
