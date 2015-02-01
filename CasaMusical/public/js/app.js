(function() {

	var app = angular.module('CM', [
		'ngRoute',
		'controllers',
		'lumx'
		]);

	app.config(['$routeProvider', function ($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: 'views/home.html',
				controller: 'HomeCtrl'
			})
			.when('/new', {
				templateUrl: 'views/new.html',
				controller: 'HomeCtrl'
			})
			.when('/edit/:id', {
				templateUrl: 'views/edit.html',
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