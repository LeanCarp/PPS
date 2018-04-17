var app = angular.module('AlumnosApp', []);
 
app.controller('AlumnoController',  ['$scope', 'servicios', function($scope, servicios){
        
        $scope.agregarAlumno = alumno => {
                servicios.agregarAlumno(alumno)
                .success(() => Materialize.toast(`Alumno agregado correctamente.`, 3500))
                .error(() => Materialize.toast(`Error.`, 3500));

        }

        /* $scope.obtenerAlumnos = function(){
                console.log("a");
                servicios.obtenerTodos()
                .success(function(data) {
                        console.log(data);
                })
                .error(function(data, status) {
                        console.error('Repos error', status, data);
                })
        }; */

}]);