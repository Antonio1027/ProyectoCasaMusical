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
			.when('/newprovider', {
				templateUrl: 'views/newprovider.html',
				controller: 'NewProviderCtrl'
			})
			.when('/edit/:id', {
				templateUrl: 'views/editarticle.html',
				controller: 'EditArticleCtrl'
			})
			.when('/sales', {
				templateUrl: 'views/sales.html',
				controller: 'SalesCtrl'
			})
			.otherwise({
				redirectTo: '/'
			})
	}]);
})()