@extends('layouts.app')
 
@section('content')
    <div class="container" ng-controller="mainController">
         @auth
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Products
                    </div>
 
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
 
                       
                        <table class="table table-bordered table-striped" ng-if="products.length > 0">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                               <!-- <th>Image</th> -->
                                <th>Price</th>
                            </tr>
                           <label>Category Filter: <input ng-model="search.category"></label>  
                            <tr ng-repeat="product in products|filter:search">
                                <td>@{{ product.title }}</td>
                                <td>@{{ product.description }}</td>
                                <td>@{{ product.category }}</td>
                                <!-- <td><img ng-src="/storage/@{{ product.image }}" ></td>  -->       
                                 <td>@{{ product.price }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endauth
        @guest
        Please login to view product catalog
        @endguest
    </div>
@endsection