(function(){
	angular.module('cm.controllers', [])
	.controller('HomeCtrl', ['$scope', '$http', '$routeParams', 'LxNotificationService', 'LxDialogService', 'casamusicalService', function ($scope, $http, $routeParams, LxNotificationService, LxDialogService, casamusicalService) {
		$scope.products = [];
		var respProducts = [];
		$scope.productSale = {};
		$scope.regex_number = /^[0-9]*$/;
		$scope.number = 0;
		$scope.prcb = false;
		$scope.providers = [];
		$scope.globalFunction = casamusicalService;

		$scope.togglePR = function(){
			if($scope.prcb)
				$scope.products = respProducts.filter(function(element){
					return element.status == 'pr';
				});
			else
				$scope.products = respProducts;
		};

		$scope.removeArticle = function(id){
	        LxNotificationService.confirm('¿Desea eliminar el articulo?', 'Seleccione aceptar si esta seguro de eliminar el articulo.', { cancel:'Aceptar', ok:'Rechazar' }, function(answer){
	            if(!answer){
	            	casamusicalService.deleteArticle(id)
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
		    if( angular.isNumber($scope.productSale.quantity)
		    	&& angular.isNumber($scope.productSale.discount)
		    	&& $scope.productSale.quantity % 1 == 0 
		    	&& $scope.productSale.quantity > 0
		    	&& $scope.productSale.date != null 
		    	&& $scope.statussale == 1
		    	){
		    	$scope.statussale = 0;
		    	$scope.productSale.date = Date.parse($scope.productSale.date);
		    	casamusicalService.postSale($scope.productSale)
					.then(function(data){
						$scope.products = $scope.products.filter(function(element){
							if(element.id == $scope.productSale.id){
								element.reserve = element.reserve - $scope.productSale.quantity;
								if (element.reserve <= element.reorderpoint)
									element.status = "pr";
							}
							return element;
						});						
						LxNotificationService.success(data.msg);
		    			LxDialogService.close('test');
					},
					function(error){
						LxNotificationService.error(error.msg);
					});
			}
			else
				LxNotificationService.warning('La cantidad de articulos debe ser un entero y debe contener una fecha de venta');
		};

		$scope.opendDialog = function(dialogId, id){
			$scope.statussale = 1;
			$scope.productSale.id = id;
			$scope.productSale.date = new Date( Date.now() );
		    LxDialogService.open(dialogId);
		};

		$scope.closingDialog = function(){
			$scope.productSale.quantity = 0;
			$scope.productSale.discount = 0;
		};		

		$scope.providerProducts = function(){			
			casamusicalService.getArticlesByProvider($scope.providers.provider.id)
			.then(function(data){
				$scope.products = data;
				respProducts = data;				
			},
			function(error){
				LxNotificationService.warning(error.msg);
			});
		}

		$scope.clear = function(){
			$scope.providers.provider = {};			
			casamusicalService.getArticles()
			.then(function (data){
				$scope.products = data[0];				
				$scope.providers = data[1];
				respProducts = data[0];
			},
			function(error){
				LxNotificationService.error(error.msg);
			});			
		}

		casamusicalService.getArticles()
			.then(function (data){
				$scope.products = data[0];				
				$scope.providers = data[1];
				respProducts = data[0];
			},
			function(error){
				LxNotificationService.error(error.msg);
			});
	}])
	.controller('NewArticleCtrl', ['$scope', '$http', 'LxNotificationService', 'casamusicalService', function ($scope, $http, LxNotificationService, casamusicalService) {
		$scope.product = {};
		$scope.error = [];
		$scope.regex_number = /^[0-9]*(\.[0-9]+)?$/;
		$scope.providers = [];

		casamusicalService.getProviders()
		.then(function(data){
			$scope.providers = data;
		},
		function(error){
			LxNotificationService.warning(error.error);
		});

		$scope.newarticle = function(){
			casamusicalService.postArticle($scope.product)
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
	.controller('NewProviderCtrl', ['$scope', '$http', 'LxNotificationService', 'casamusicalService', function ($scope, $http, LxNotificationService, casamusicalService) {
		$scope.provider = {};
		$scope.error = [];
		$scope.regex_number = /^[0-9]*(\.[0-9]+)?$/;

		$scope.newprovider = function(){
			casamusicalService.postProvider($scope.provider)
				.then(function(data){
						$scope.provider = {};
						$scope.error = [];
						LxNotificationService.success(data.msg);
					},
					function(error){
						$scope.error = error.errors;
					});
		}
	}])
	.controller('SalesCtrl', ['$scope', 'LxNotificationService', 'casamusicalService', function ($scope, LxNotificationService, casamusicalService) {

		$scope.products = [];
		$scope.productsresp = [];
		$scope.date = [];
		$scope.totalsales = 0;
		initProduct();

		$scope.replaySale = function(id){
			LxNotificationService.confirm('¿Desea deshacer la venta?', '', { cancel:'No', ok:'Si' }, function(answer){
				if(answer){
					casamusicalService.restoreSale(id)
					.then(function (data){
						initProduct();
						LxNotificationService.success(data.msg);
					},
					function(error){
						LxNotificationService.error(error.msg);
					});
				}
			});
		}

		$scope.datechange = function(){
			var date = [];
			if($scope.date.start){
				date.start = Date.parse($scope.date.start);
				if($scope.date.end)
					date.end = Date.parse($scope.date.end) + 86400000;
				else
					date.end = Date.parse($scope.date.start) + 86400000;
				
				$scope.products = $scope.productsresp.filter(function(element){
					if( element.date >= date.start && element.date < date.end )
						return element;
				});
				counttotal($scope.products);
			}
			else
				LxNotificationService.warning('Debe seleccionar por lo menos la fecha de inicio');
		};

		function counttotal(data){
			$scope.totalsales = 0;
			data.forEach(function(element){
				$scope.totalsales += parseInt(element.total_discount);
			});
		}

		function initProduct(){
			casamusicalService.getSales()
				.then(function (data){
					$scope.products = data;
					$scope.productsresp = data;
					counttotal(data);
				},
				function(error){
					LxNotificationService.error(error.msg);
				});
		}
	}])
	.controller('ProvidersCtrl', ['$scope', 'LxNotificationService', 'casamusicalService', function ($scope, LxNotificationService, casamusicalService) {

		$scope.providers = [];
		
		casamusicalService.getProviders()
			.then(function (data){
				$scope.providers = data;
				// $scope.productsresp = data;
			},
			function(error){
				LxNotificationService.error(error.msg);
			});

		$scope.removeProvider = function(id){
			LxNotificationService.confirm('¿Desea eliminar el proveedor?', 'Seleccione aceptar si esta seguro de eliminar el proveedor.', { cancel:'Aceptar', ok:'Rechazar' }, function(answer){
			    if(!answer){
			    	casamusicalService.deleteProvider(id)
			    		.then(function(data){
			    			LxNotificationService.success(data.msg);
			    			$scope.providers = $scope.providers.filter(function(element){
			    				return element.id != id;
			    			});
			    		},
			    		function(data){
			    			LxNotificationService.error(data.msg);
			    		});
			    }
			});
		};

	}])
	.controller('EditArticleCtrl', ['$scope', '$http', '$routeParams', 'LxNotificationService', 'casamusicalService', function ($scope, $http, $routeParams, LxNotificationService, casamusicalService) {
		$scope.product = {};
		$scope.error = [];
		$scope.regex_number = /^[0-9]*(\.[0-9]+)?$/;
		var id = $routeParams.id;
		$scope.providers = [];
		$scope.selectProvider = {};

		casamusicalService.getArticle(id)
			.then(function (data){
				$scope.product = data;
				casamusicalService.getProviders()
					.then(function(data){
						$scope.providers = data;
						$scope.selectProvider = $scope.providers.filter(function (element) {
							return element.id == $scope.product.provider_id;
						});
						$scope.product.provider_id = $scope.selectProvider[0];
					},
					function(error){
						LxNotificationService.warning(error.error);
					});
			},function(error){
				LxNotificationService.error(error.msg);
			});

		$scope.updatearticle = function(){			
			casamusicalService.putArticle($scope.product)
				.then(function(data){
						$scope.error = [];
						LxNotificationService.success(data.msg);
					},
					function(error){
						$scope.error = error.errors;
					});
		}
	}])
	.controller('EditProviderCtrl', ['$scope', '$http', '$routeParams', 'LxNotificationService', 'casamusicalService', function ($scope, $http, $routeParams, LxNotificationService, casamusicalService) {
		$scope.provider = {};
		$scope.error = [];
		var id = $routeParams.id;

		casamusicalService.getProvider(id)
			.then(function (data){
				$scope.provider = data;				
			},function(error){
				LxNotificationService.error(error.msg);
			});

		$scope.updateprovider = function(){
			casamusicalService.putProvider($scope.provider)
				.then(function(data){
						$scope.error = [];
						LxNotificationService.success(data.msg);
					},
					function(error){
						$scope.error = error.errors;
					});
		};

	}]);
})();