<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>Get Blog List</title>
        <link rel="stylesheet" href="../public/bootstrap/dist/css/bootstrap.min.css"/>
        <script src="../public/angular/angular.min.js"></script>
        <script src="../public/jquery/dist/jquery.min.js"></script>
        <script src="../public/angular-sanitize/angular-sanitize.min.js"></script>
        <script src="../public/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>
    <body ng-app="wpApp" ng-controller="wpCtrl">
        <div class="col-md-8 col-md-offset-2 container">
        <h1>Blog</h1>
        <div ng-repeat="x in blogs" compileHtml="x" class="panel panel-default">
            <div class="panel-body">
            <h2>{{ x.post_title }}</h2>
            <div ng-bind-html="x.post_content | trustHtml"></div>
            </div>
        </div>
        </div>
    </body>
    <script>
        angular.module("wpApp", ['ngSanitize'])
        .controller('wpCtrl', function($scope, $http, $sce) {
            $http.get("./getBlog")
            .then(function(response) {
                $scope.blogs = response.data.data;
                /*
                for (i = 0; i < $scope.blogs.length; i++) {
                    content = sanitize($scope.blogs[i].post_content);
                    $scope.blogs[i].post_content = content;
                }*/
                console.log($scope.blogs);
            });
        })
        .filter('trustHtml', function ($sce) {
        return function (input) {
            return $sce.trustAsHtml(input);
        }
    });
    </script>
</html>