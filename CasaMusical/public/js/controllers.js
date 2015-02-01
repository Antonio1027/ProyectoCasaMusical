(function(){
	angular.module('controllers', [])
	.controller('HomeCtrl', ['$scope', '$http', function ($scope, $http) {
		$scope.products;
		$http.get('products')
			.success(function(data){
				$scope.products = data;
			});
	}]);

})();
