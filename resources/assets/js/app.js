import './bootstrap';
import 'angular';

var app = angular.module('LaravelCatalog', []
    , ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);
 
app.controller('mainController', ['$scope', '$http', function ($scope, $http) {
 
    $scope.tasks = [];
 
    // List products
    $scope.loadProducts = function () {
        $http.get('/api/product')
            .then(function success(e) {
            	console.log(e);
                $scope.products = e.data.products;
            });
    };
    $scope.loadProducts();
}]);