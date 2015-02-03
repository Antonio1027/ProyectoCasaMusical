(function(){
	angular.module('cm.controllers', [])
	.controller('HomeCtrl', ['$scope', '$http', 'casamusicalService', function ($scope, $http, casamusicalService) {
		$scope.products = [];
		var respProducts = [];
		$scope.prcb = false;
		$scope.togglePR = function(){
			if($scope.prcb)
				$scope.products = respProducts.filter(function(element){
					return element.status == 'pr';
				});
			else
				$scope.products = respProducts;
		};

		casamusicalService.all()
			.then(function (data){
				$scope.products = data;
				respProducts = data;
			});
	}])
	.controller('NewArticleCtrl', ['$scope', '$http', 'LxNotificationService', 'casamusicalService', function ($scope, $http, LxNotificationService, casamusicalService) {
		$scope.product = {};
		$scope.error = [];
		$scope.regex_number = /^[0-9]*(\.[0-9]+)?$/;

		$scope.newarticle = function(){
			casamusicalService.newarticle($scope.product)
				.then(function(data){
						$scope.product = {};
						$scope.error = [];
						LxNotificationService.success('Articulo agregado con exito');
					},
					function(error){
						$scope.error = error.Errors;
					});
		}
	}])
	.controller('EditArticleCtrl', ['$scope', '$http', 'LxNotificationService', 'casamusicalService', function ($scope, $http, LxNotificationService, casamusicalService) {
		$scope.product = {};
		$scope.error = [];
		$scope.regex_number = /^[0-9]*(\.[0-9]+)?$/;

		casamusicalService.searcharticle({"id":1})
			.then(function (data){
				$scope.product = data;
			},function(error){
				$scope.error = error;
			});
	}]);

})();