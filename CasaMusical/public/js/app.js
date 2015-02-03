(function() {

	var app = angular.module('CM', [
		'ngRoute',
		'cm.controllers',
		'cm.services',
		'cm.directives',
		'lumx'
		]);

	app.config(['$routeProvider', function ($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: 'views/home.html',
				controller: 'HomeCtrl'
			})
			.when('/new', {
				templateUrl: 'views/newarticle.html',
				controller: 'NewArticleCtrl'
			})
			.when('/edit/:id', {
				templateUrl: 'views/editarticle.html',
				controller: 'EditArticleCtrl'
			})
			/*.when('/remove/:id', {
				templateUrl: 'views/edit.html',
				controller: 'HomeCtrl'
			})*/
			.otherwise({
				redirectTo: '/'
			})
	}]);
})()