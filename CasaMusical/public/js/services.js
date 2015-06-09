(function(){
	angular.module('cm.services', [])
	.factory('casamusicalService',  ['$http', '$q', function ($http, $q) {

		// Products
		function getArticles(){
			var deferred = $q.defer();

			$http.get('products')
			.success(function(data){
				deferred.resolve(data);
			})
			.error(function(error){
				deferred.reject(error);
			});

			return deferred.promise;
		}

		function getArticlesByProvider(id){
			var deferred = $q.defer();

			$http.get('productsByProvider/' + id)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});

			return deferred.promise;	
		}

		function postArticle(product){
			var deferred = $q.defer();

			$http.post('newProduct', product)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});

			return deferred.promise;
		}

		function putArticle(product){
			var deferred = $q.defer();

			$http.put('updateProduct', product)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});

			return deferred.promise;
		}

		function getArticle(id){
			var deferred = $q.defer();
			$http.get('editProduct/'+id)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
			return deferred.promise;
		}
		
		function deleteArticle(id){
			var deferred = $q.defer();

			$http.delete('deleteProduct/'+id)
				.success(function(data, status){
					deferred.resolve(data);
				})
				.error(function(error, status){
					deferred.reject(error);
				});

			return deferred.promise;
		}

		/* Sales */
		function getSales(){
			var deferred = $q.defer();

			$http.get('sales')
			.success(function(data){
				deferred.resolve(data);
			})
			.error(function(error){
				deferred.reject(error);
			});

			return deferred.promise;
		}

		function postSale(product){
			var deferred = $q.defer();

			$http.post('newSale', product)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});

			return deferred.promise;
		}
		
		//Providers
		function postProvider(provider){
			var deferred = $q.defer();

			$http.post('newProvider', provider)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});

			return deferred.promise;
		}

		function getProvider(id){
			var deferred = $q.defer();

			$http.get('editProvider/'+id)
			.success(function(data){
				deferred.resolve(data);
			})
			.error(function(error){
				deferred.reject(error);
			});

			return deferred.promise;
		}

		function getProviders(){
			var deferred = $q.defer();

			$http.get('providers')
			.success(function(data){
				deferred.resolve(data);
			})
			.error(function(error){
				deferred.reject(error);
			});

			return deferred.promise;
		}

		function putProvider(provider){
			var deferred = $q.defer();

			$http.put('updateProvider', provider)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});

			return deferred.promise;
		}

		function deleteProvider(id){
			var deferred = $q.defer();

			$http.delete('deleteProvider/'+id)
				.success(function(data, status){
					deferred.resolve(data);
				})
				.error(function(error, status){
					deferred.reject(error);
				});

			return deferred.promise;
		}

		function restoreSale(id){
			var deferred = $q.defer();

			$http.delete('restoreSale/'+id)
				.success(function(data, status){
					deferred.resolve(data);
				})
				.error(function(error, status){
					deferred.reject(error);
				});

			return deferred.promise;
		}

		return {
			getArticles: getArticles,
			getArticlesByProvider: getArticlesByProvider,
			postArticle: postArticle,
			putArticle: putArticle,
			getArticle: getArticle,
			deleteArticle: deleteArticle,
			getSales: getSales,
			postSale: postSale,
			postProvider: postProvider,
			getProvider: getProvider,
			getProviders: getProviders,
			putProvider: putProvider,
			deleteProvider: deleteProvider,
			restoreSale: restoreSale
		};
	}])

})();