/**
*  Module
*
* Description
*/
angular.module('parutoApp.controllers', []).
controller('HomePageController', ['$scope', function($scope){
	$scope.variable = "Hello";
	$( 'textarea#contentEditor' ).ckeditor();
}]);