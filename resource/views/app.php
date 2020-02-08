{% extends "plantilla.php" %}

{% block title %}Home{% endblock %}
{% block head %}
    {{ parent() }}
{% endblock %}
{% block content %}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="navbar-brand">ZINOBE</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="app/Controller/cerrarsesion.php">Salir </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="home.php" method="post">
      <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
<div class="container center-block">
<div class="row " style="margin-top: 25px; margin-left: 25px">
<div class="card" style="width: 18rem;">
  <div class="card-header">
    SISBEN
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item" id="enviar">Puntaje <h6 id="puntaje"></h6></li>
    <li class="list-group-item">Departamento<h6 id="departamento"></li>
    <li class="list-group-item">Municipio<h6 id="municipio"></li>
    <li class="list-group-item">Codigo Municipio<h6 id="cm"></li>
  </ul>
</div>


<div class="card" style="width: 18rem; margin-left: 25px">
  <div class="card-header">
    MULTAS SIMIT
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Paz y Salvo<h6 id="estado"></h6></li>
    <li class="list-group-item">Numero PAz y Salvo<h6 id="np"></h6></li>
    <li class="list-group-item">Comparendos<h6 id="comparendos"></h6></li>
    <li class="list-group-item">Suspendido<h6 id="suspen"></h6></li>
  </ul>
</div>

{% if user is defined %}
<table class="table"  style="width: 29rem; margin-left: 25px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Identificacion</th>
      <th scope="col">E-mail</th>
      <th scope="col">Pais</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{user.nombre}}</td>
      <td>{{user.doc}}</td>
      <td>{{user.email}}</td>
      <td>{{user.pais}}</td>
    </tr>
  </tbody>
</table>
{% elseif erroru is defined %}
  <div class="alert alert-secondary " style="width: 29rem; margin-left: 25px" role="alert">
    Usuario no encontrado. Intentelo nuevamente
  </div>
{% else %}
{% endif %}


</div>

</div>



<script>
window.onload=function()  {

	$.ajax({
		url: "app/Controller/consultaExternaSisben.php",
    type: "GET",
    dataType: 'json'
	}).done(function(respuesta){

      console.log(respuesta);
      $("#puntaje").text(respuesta.puntaje);
      $("#departamento").text(respuesta.departamento);
      $("#municipio").text(respuesta.municipio);
      $("#cm").text(respuesta.codigomunicipio);
  });
  
  $.ajax({
		url: "app/Controller/consultaExternaSimit.php",
    type: "GET",
    dataType: 'json'
	}).done(function(respuesta){

      console.log(respuesta);
      $("#estado").text(respuesta.estado);
      $("#np").text(respuesta.numeropaz);
      $("#comparendos").text(respuesta.numerocomparendos);
      $("#suspen").text(respuesta.suspencion);
	});
};
</script>
{% endblock %}