angular.module('parutoApp.services', []).
factory('parutoService', ['$http', function($http){
  var apiEndPoint = function(endPoint, params, query) {
	  var baseURL = "localhost:8000/api";
    var httpQuery = {};
    if(params) {
      for(i in params) {
        endPoint += "/" + params[i];
      }
    }
    if(query) {
      endPoint += "?";
      for(i in query) {
        endPoint += i + "=" + query[i] + "&";
      }
      endPoint.substr(0, endPoint.length - 1);
    }
    return baseURL + endPoint;
  }
	return {
	  all: function() {
	    return $http.get(apiEndPoint('/articles'));
	  },
    one: function(id) {
      return $http.get(apiEndPoint('/articles', [id]));
    }
	};
}]);