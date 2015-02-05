(function(){
	angular.module('cm.controllers', [])
	.controller('HomeCtrl', ['$scope', '$http', '$routeParams', 'LxNotificationService', 'LxDialogService', 'casamusicalService', function ($scope, $http, $routeParams, LxNotificationService, LxDialogService, casamusicalService) {
		$scope.products = [];
		var respProducts = [];
		$scope.productSale = {};
		$scope.number = 0;
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

		$scope.sales = function(){
		    LxDialogService.close('test');
		    $scope.productSale.date = Date.now();
			casamusicalService.newsale($scope.productSale)
				.then(function(data){
						LxNotificationService.success(data.msg);
						$scope.products = $scope.products.filter(function(element){
							if(element.id == $scope.productSale.id)
								element.reserve = element.reserve - $scope.productSale.quantity;							
							return element;
						});						
					},
					function(error){
						LxNotificationService.error(error.msg);
					});
		};

		$scope.opendDialog = function(dialogId, id){
			$scope.productSale.id = id;
			$scope.productSale.quantity = '';
		    LxDialogService.open(dialogId);
		};

		$scope.closingDialog = function(){
			$scope.number = 0;			

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
	.controller('SalesCtrl', ['$scope', 'casamusicalService', function ($scope, casamusicalService) {
		$scope.products = [];
		$date = [];

		casamusicalService.salesall()
			.then(function (data){
				$scope.products = data;
			},
			function(error){
				LxNotificationService.error(error.msg);
			});
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

		$scope.updatearticle = function(){
			casamusicalService.updatearticle($scope.product)
				.then(function(data){
						$scope.error = [];
						LxNotificationService.success(data.msg);
					},
					function(error){
						$scope.error = error.errors;
					});
		}
	}]);
})();