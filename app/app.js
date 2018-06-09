var app = angular.module('AlumnosApp', [ 'ngRoute','ngFileUpload']);

app.run(['$rootScope', function($rootScope) {
  $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
    $rootScope.title = current.$$route.title || 'Página inexistente';
  });
}]);