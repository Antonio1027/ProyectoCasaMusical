(function(){
	angular.module('cm.controllers', [])
	.controller('HomeCtrl', ['$scope', '$http', 'casamusicalService', function ($scope, $http, casamusicalService) {
		$scope.products = [];
		casamusicalService.all()
			.then(function (data){
				$scope.products = data;
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
	}]);

})();