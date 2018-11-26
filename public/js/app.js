var app = angular.module('LaravelCatalog', []
    , ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
        $httpProvider.defaults.headers.common['Authorization'] = 'Bearer ' + angular.element('#api_token').val();
    }]);
 
app.controller('mainController', ['$scope', '$http', function ($scope, $http) {
 
    $scope.products = [];
 
    // List products
    $scope.loadProducts = function () {
        $http.get('/api/product')
            .then(function success(e) {
            	$scope.products = e.data;
            });
    };

    $scope.errors = [];
 
    $scope.product = {
        title: '',
        description: '',
        category:'',
        price:'',
        image:''
    };
    $scope.loadProducts();
    $scope.initProduct = function () {
        $scope.resetForm();
        $("#add_new_product").modal('show');
    };
 
    // Add new Product
    $scope.addProduct = function () {
        $http.post('/api/product', {
            title: $scope.product.title,
            category: $scope.product.category,
            price: $scope.product.price,
            image: $scope.product.image,
            description: $scope.product.description
        }).then(function success(e) {
            $scope.resetForm();
            $scope.products.push(e.data.product);
            $("#add_new_product").modal('hide');
 
        }, function error(error) {
            $scope.recordErrors(error);
        });
    };
    
    // initialize update action
    $scope.initEdit = function (index) {
        $scope.errors = [];
        $scope.edit_product = $scope.products[index];
        console.log($scope.product[index]);
        $("#edit_product").modal('show');
    };
 
    // update the given product
    $scope.updateProduct = function () {
        $http.put('api/product/' + $scope.edit_product.id, {
            title: $scope.edit_product.title,
            category: $scope.edit_product.category,
            price: $scope.edit_product.price,
            image: $scope.edit_product.image,
            description: $scope.edit_product.description
        }).then(function success(e) {
            $scope.errors = [];
            $("#edit_product").modal('hide');
        }, function error(error) {
            $scope.recordErrors(error);
        });
    }; 

    // delete the given product
    $scope.deleteProduct = function (index) {
 
        var conf = confirm("Do you really want to delete this product?");
 
        if (conf === true) {
            $http.delete('api/product/' + $scope.products[index].id)
                .then(function success(e) {
                    $scope.products.splice(index, 1);
                });
        }
    };   
    $scope.recordErrors = function (error) {
        $scope.errors = [];
        if(error)
        {    
            if (error.data.errors.title) {
                $scope.errors.push(error.data.errors.title[0]);
            }
     
            if (error.data.errors.description) {
                $scope.errors.push(error.data.errors.description[0]);
            }

            if (error.data.errors.category) {
                $scope.errors.push(error.data.errors.category[0]);
            }
     
            if (error.data.errors.price) {
                $scope.errors.push(error.data.errors.price[0]);
            }
        }    
    };
 
    $scope.resetForm = function () {
        $scope.product.title = '';
        $scope.product.description = '';
        $scope.product.category = '';
        $scope.product.price = '';
        $scope.product.image = '';
        $scope.errors = [];
    };    
}]);