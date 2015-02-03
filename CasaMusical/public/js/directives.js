(function(){
	angular.module('cm.directives', [])
	.directive('formArticle', [function () {
		return {
			restrict: 'E',
			templateUrl: 'partials/form-article.html'
		};
	}])
})();