<!DOCTYPE html>
<html lang="es" ng-app="CM">
<head>
	<meta charset="UTF-8">
	<title>Casa-Musical</title>

	<link rel="stylesheet" href="bower_components/lumx/dist/css/lumx2.css">
	<link rel="stylesheet" href="bower_components/lumx/dist/css/lumx.css">
</head>
<body ng-controller="HomeCtrl">
	<div class="card bgc-teal-500">
	    <div class="toolbar">
	        <div class="toolbar__left mr++">
	            <button class="btn btn--l btn--white btn--icon" lx-ripple>
	                <i class="mdi mdi--menu"></i>
	            </button>
	        </div>

	        <a href="#/"><span class="toolbar__label tc-white-1 fs-title ml">Casa Musical</span></a>

	        <div class="toolbar__right">
	            <lx-dropdown position="right" from-top>
	                <button class="btn btn--l btn--white btn--icon" lx-ripple lx-dropdown-toggle>
	                    <i class="mdi mdi--more-vert"></i>
	                </button>
	                <lx-dropdown-menu>
	                    <ul>
	                        <li><a href="#/new" class="dropdown-link">Agregar nuevo producto</a></li>
	                        <li><a href="#/remove" class="dropdown-link">Eliminar producto</a></li>
	                        <li class="dropdown-divider"></li>
	                        <li><a href="#/statistics" class="dropdown-link">Estadisticas</a></li>
	                    </ul>
	                </lx-dropdown-menu>
	            </lx-dropdown>
	    		<lx-search-filter closed theme="dark"></lx-search-filter>
	        </div>
	    </div>
	</div>

	<div class="example__content">
		<div ng-view></div>
	</div>

	<!-- Scripts Lumx-->
	<script src="bower_components/jquery/dist/jquery.js"></script>
	<script src="bower_components/velocity/velocity.js"></script>
	<script src="bower_components/moment/min/moment-with-locales.min.js"></script>
	<script src="bower_components/angular/angular.js"></script>
	<script src="bower_components/lumx/dist/js/lumx.js"></script>

	<!-- Scripts Angular-->
	<script src="lib/angular-route.min.js"></script>
	<script src="js/services.js"></script>
	<script src="js/controllers.js"></script>
	<script src="js/directives.js"></script>
	<script src="js/app.js"></script>
</body>
</html>