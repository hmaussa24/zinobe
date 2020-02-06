{% extends "plantilla.php" %}

{% block title %}Login{% endblock %}
{% block head %}
    {{ parent() }}
{% endblock %}
{% block content %}
<div class="container" style="margin-top: 25px;">
    
        <div class="row justify-content-center">
            <div class="col-md-8">
            {% if error is defined %}
            <div class="alert alert-danger" role="alert">
              Usuario o contraseña incorrectos
            </div>
            {% endif %}
            
                <div class="card">
                    <div class="card-header">Login <a href="registrar.php" class="btn btn-secondary float-right" role="button" aria-disabled="true">Registrarme</a></div>
    
                    <div class="card-body">
                        <form method="POST" action="app/controller/login.php">
                            
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
    
                                        <label class="form-check-label" for="remember">
                                            Recordarme
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}