(function() {

	var app = angular.module('CM', [
		'ngRoute',
		'cm.controllers',
		'cm.services',
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
				controller: 'HomeCtrl'
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