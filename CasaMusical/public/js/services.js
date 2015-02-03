(function(){
	angular.module('cm.services', [])
	.factory('casamusicalService',  ['$http', '$q', function ($http, $q) {

		function all(){
			var deferred = $q.defer();

			$http.get('products')
			.success(function(data){
				deferred.resolve(data);
			});

			return deferred.promise;
		}

		function newarticle(product){
			var deferred = $q.defer();

			$http.post('newProduct', product)
				.success(function(data){
					if(data.status == "success")
						deferred.resolve(data);
					if(data.status == "error")
						deferred.reject(data);
				});

			return deferred.promise;
		}

		function searcharticle(id){
			var deferred = $q.defer();
			$http.get('editProduct/'+id)
				.success(function(data){
					if(data.status == 'error')
						deferred.refect(data);
					else
						deferred.resolve(data);
				});
			return deferred.promise;
		}
		
		return {
			all: all,
			newarticle: newarticle,
			searcharticle: searcharticle
		};
	}])

})();