(function(){
	angular.module('cm.controllers', [])
	.controller('HomeCtrl', ['$scope', '$http', '$routeParams', 'LxNotificationService', 'casamusicalService', function ($scope, $http, $routeParams, LxNotificationService, casamusicalService) {
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

		$scope.removeArticle = function(id){
	        LxNotificationService.confirm('¿Desea eliminar el articulo?', 'Seleccione aceptar si esta seguro de aliminar el articulo.', { cancel:'Aceptar', ok:'Rechazar' }, function(answer){
	            if(!answer){
	            	casamusicalService.removeArticle(id)
	            		.then(function(data){
	            			LxNotificationService.success(data.msg);
	            			$scope.products = $scope.products.filter(function(element){
	            				return element.id != id;
	            			});
	            		},
	            		function(data){
	            			LxNotificationService.error(data.msg);
	            		});
	            }
	        });
		};

		casamusicalService.all()
			.then(function (data){
				$scope.products = data;
				respProducts = data;
			},
			function(error){
				LxNotificationService.error(error.msg);
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
						LxNotificationService.success(data.msg);
					},
					function(error){
						$scope.error = error.errors;
					});
		}
	}])
	.controller('EditArticleCtrl', ['$scope', '$http', '$routeParams', 'LxNotificationService', 'casamusicalService', function ($scope, $http, $routeParams, LxNotificationService, casamusicalService) {
		$scope.product = {};
		$scope.error = [];
		$scope.regex_number = /^[0-9]*(\.[0-9]+)?$/;
		var id = $routeParams.id;

		casamusicalService.searcharticle(id)
			.then(function (data){
				$scope.product = data;
			},function(error){
				LxNotificationService.error(error.msg);
			});
	}]);

})();