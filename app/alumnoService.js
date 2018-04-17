app.factory('servicios', ['$http', function($http) {
return {
        agregarAlumno: alumno => {
             const alum  = {
              'nombre': nombre.value,
              'apellido': apellido.value,
              'dni': dni.value,
              'email': email.value,
              //'telefono': telefono.value,
              'anioIngreso': anioIngreso.value,
              //'carrera': carrera.value,
              //'escuela': escuela.value
            }
            return $http.post('Alumnos/agregar', alum); 
          }

          /* obtenerTodos: function() {
            return $http.post('Alumnos/obtenerTodos');
          }  */
        
        };
}]);