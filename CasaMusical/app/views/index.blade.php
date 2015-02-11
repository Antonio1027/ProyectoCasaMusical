<!DOCTYPE html>
<html lang="es" ng-app="CM">
<head>
	<meta charset="UTF-8">
	<title>Casa-Musical</title>

	<link rel="stylesheet" href="bower_components/lumx/dist/css/lumx2.css">
	<link rel="stylesheet" href="bower_components/lumx/dist/css/lumx.css">
</head>
<body>
	<div class="card bgc-blue-grey-900">
	    <div class="toolbar">

	        <a href="#/"><span class="toolbar__label tc-white-1 fs-title ml">Casa Musical</span></a>

	        <div class="toolbar__right">
	        		<a href="#/new"><span class="toolbar__label tc-white-1 ml">Agregar nuevo producto</span></a>
	        		<a href="#/newprovider"><span class="toolbar__label tc-white-1 ml">Agregar nuevo proveedor</span></a>
	        		<a href="#/providers"><span class="toolbar__label tc-white-1 ml">Ver los proveedores</span></a>
	        		<a href="#/sales"><span class="toolbar__label tc-white-1 ml">Ver ventas</span></a>
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
	<script src="lib/angular-locale_es-mx.js"></script>
	<script src="js/services.js"></script>
	<script src="js/controllers.js"></script>
	<script src="js/directives.js"></script>
	<script src="js/app.js"></script>
</body>
</html>