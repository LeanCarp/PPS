app.controller('AlumnosCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'carrera';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  $scope.getAlumnos= function(id){
  service.getAlumnos().success(function (data){
    $scope.alumnos = data.datos;
    $scope.paginar();
  })
  }
  $scope.cargarAlumno= function(){
    if ($routeParams.id )
    {

      $scope.isAdding = true;

      $scope.idAlumno = $routeParams.id;

      service.obtenerAlumno($routeParams.id).success(function (data){
        service.obtenerEscuelas(data.datos.escuela.id).success(function(data2){  
          var alumno = {
            'id':data.datos.id,
            'nombre': data.datos.first_name,
            'apellido': data.datos.last_name,
            'dni': parseInt(data.datos.username),
            'email': data.datos.email,
            'telefono': parseInt(data.datos.phone),
            'anioIngreso': parseInt(data.datos.anioIngreso),
            'carrera': data.datos.carrera,
            'pais':data2.datos.ciudad.idPais,
            'ciudad':data2.datos.ciudad.id,
            'escuela': data.datos.escuela.id,
          }

        $scope.alumno = alumno;
        
        //Se cargan los selects
        $scope.cargarCiudades(data2.datos.ciudad.idPais);
        $scope.cargarColegios(data2.datos.ciudad.id);

        })
      })
    }
    else{
    $scope.getAlumnos();
    }
  }


 $scope.validarTelefono = function(value){
   
    if ((value > 9999999999999 || value < 11111111111) & value!='') 
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  $scope.agregarAlumno = function(alumno){
    if($scope.isAdding){
      alumno.id = $scope.idAlumno;
      service.actualizarAlumno(alumno).success(function(data){
        if(!data.exito){
          Materialize.toast("No se pudo modificar el almuno", 3500);
        }
        else{
          Materialize.toast("Alumno modificado con éxito", 3500);
        }
      }).error( () => Materialize.toast('Erro al obtener alumnos', 3500) );
    }
    else{
      service.agregarAlumno(alumno).success(function(data){
        if(!data.exito){
          Materialize.toast("No se pudo cargar el almuno", 3500);
        }
        else{
          Materialize.toast("Alumno cargado con éxito", 3500);
        }
      }).error( () => Materialize.toast('Erro al obtener alumnos', 3500) );
    }
    $scope.getAlumnos();
    $location.path('/alumnos-listar');
  }

  $scope.obtenerDatosAlumnoAgregar = function(){
    $scope.cargarAlumno();
    service.obtenerPaises().success(function(data){
      $scope.paises=data.datos;
       setTimeout(() => $('select').material_select() , 100);
       });

  }

 $scope.cargarCiudades = function(idPais){
      service.obtenerPaises(idPais).success(function(data){
      $scope.ciudades=data.datos.ciudad;
     setTimeout(() => $('select').material_select() , 100);
       });
  }

   $scope.cargarColegios = function(idCiudad){
    service.obtenerCiudades(idCiudad).success(function(data){
        $scope.colegios = data.datos.escuela;
        setTimeout(() => $('select').material_select() , 100);
    });
  }

  $scope.obtenerAlumnos = function(id){
    service.obtenerAlumno($routeParams.id).success(function (data){

      $scope.alumno = data.datos;
        service.obtenerCiudades($scope.alumno.escuela.idCiudad).success(function(data2){
          $scope.ciudad = data2.datos;
        })
    })
  }

  $scope.resetearContrasenia = function(id){
    service.resetearContrasenia(id).success(function (data){
      if (!data.exito){
        Materialize.toast("No se pudo resetear la contraseña", 3500);
      }
      else{
        Materialize.toast("Contraseña reseteada con éxito", 3500);
      }  
    })
  }

  // Atributos y métodos para la búsqueda sobre todos los resultados.
  $scope.busqueda = false;

  $scope.activarBusqueda = function(){
    if ($scope.buscar.length < 3){
      $scope.busqueda = false;
    }
    else{
      $scope.busqueda = true;
    }
  }
  // Fin Búsqueda ---

  // Paginación
  $scope.vm = {};

  $scope.paginar = function(){
    
    $scope.vm.dummyItems = $scope.alumnos; // dummy array of items to be paged
    $scope.vm.pager = {};
    $scope.vm.setPage = setPage;

    initController();

    function initController() {
      // initialize to page 1
      $scope.vm.setPage(1);
    }

    function setPage(page) {
      if (page < 1 || page > $scope.vm.pager.totalPages) {
          return;
      }

      // get pager object from service
      $scope.vm.pager = service.GetPager($scope.vm.dummyItems.length, page);

      // get current page of items
      $scope.vm.items = $scope.vm.dummyItems.slice($scope.vm.pager.startIndex, $scope.vm.pager.endIndex + 1);

    }
  }
  // Fin Paginación ---

}]);

app.controller('AdminCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {
    $scope.isAdding = false;

    $rootScope.idAdmin = USER_ID_LOG;
    $rootScope.idAlumno = $routeParams.id !=undefined ?  $routeParams.id : $rootScope.idAlumno;

    $scope.obtenerAdministrador = function (id){
      service.AdminObtenerAdministrador(id).success(function (data){
        var admin = {
          'id': data.datos.id,
          'first_name': data.datos.first_name,
          'last_name': data.datos.last_name,
          'username': data.datos.username,
          'email': data.datos.email,
          'phone': parseInt(data.datos.phone),
        }
        $scope.administrador = admin;
      })
    }

    $scope.obtenerTutor= function(){
    service.obtenerTutor($rootScope.idAdmin).success(function (data){
      $scope.tutor = data.datos;
    })
    }

    $scope.modificarAdministrador = function(param){
      console.log(param);
      service.AdminModificarAdministrador(param).success(function (data){
        if (!data.exito){
          Materialize.toast("No se pudieron modificar los datos", 3500);
        }
        else{
          Materialize.toast("Datos modificados con éxito", 3500);
        }
      })
      $location.path('admin-ver');
    }

    
    $scope.validarTelefono = function(value){
      
        if ((value > 9999999999999 || value < 11111111111) & value!='') 
        {
          return true;
        }
        else
        {
          return false;
        }
    }

}]);

app.controller('CursadasCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {
    $scope.isAdding = false;
    
    // HACER LA REDIRECCION POR SI EL ID ES VACIO
    $rootScope.idAlumno = $routeParams.id !=undefined ?  $routeParams.id : $rootScope.idAlumno;

    // Atributos y funciones para ordenamiento
    $scope.sortType = 'anio';
    $scope.sortReverse = false;

    $scope.revertirOrden = function(){
      $scope.sortReverse = ! $scope.sortReverse;
    }
    //

    $scope.selectedList = [];

    if ($routeParams.idCurs){
      $scope.isAdding = true;

      service.getCursada($routeParams.idCurs).success(function (data){
        var cursada = {
          'id': data.datos.id,
          'comision': data.datos.idComision,
          'estado': data.datos.estado,
          'nota': data.datos.nota,
        }
        $scope.cursada = cursada;
      })
    }

    $scope.eliminarCursada = function(idActividad){
    service.eliminarCursada(idActividad).success(function(data){
      if (!data.datos){
          Materialize.toast("No se pudo eliminar la cursada", 3500);
        }
        else{
          Materialize.toast("Cursada eliminada  con éxito", 3500);
        $scope.getCursadas($routeParams.id);
        }        
    }).error( () => Materialize.toast('Error al eliminar', 3500) );
    }

    $scope.agregarCursada = function(cursada){
      if ($scope.isAdding){
        service.actualizarCursada(cursada).success(function(data){
          if(!data.exito){
            Materialize.toast("No se pudo cargar la cursada", 3500);
          }
          else{
            Materialize.toast("Cursada cargada con éxito", 3500);
          }
        }).error( () => Materialize.toast('Error al obtener Cursadas', 3500) );
      }
      else{
        cursada.idAlumno = $routeParams.id;
        service.agregarCursada(cursada).success(function(data){
          if(!data.exito){
            Materialize.toast("No se pudo cargar la cursada", 3500);
          }
          else{
            Materialize.toast("Cursada cargada con éxito", 3500);
          }
        }).error( () => Materialize.toast('Error al obtener Cursadas', 3500) );
      }

      $location.path('/cursadas-listar/'+$rootScope.idAlumno);
    }

    $scope.getCursadas = function(idAlumno){
      service.getCursadas(idAlumno).success(function (data){
        if (!data.datos)
          $scope.cursadas=[];
          else
        $scope.cursadas = data.datos;
       $scope.obtenerAlumno(idAlumno);
       $scope.paginar();
      })
    }

    $scope.obtenerAlumno = function(id){
    service.AlumnoObtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;

    })
  }

    $scope.obtenerComisiones = function() {
      service.obtenerComisiones().success(function(data){
        $scope.comisiones = data.datos;
        setTimeout(() => $('select').material_select() , 100);
      }).error( () => Materialize.toast('Erro al obtener', 3500) );
    }

    $scope.obtenerDatosMultiples = function() {
      service.obtenerComisiones().success(function(data){
        $scope.comisiones = data.datos;
        setTimeout(() => $('select').material_select() , 100);
      }).error( () => Materialize.toast('Erro al obtener', 3500) );

      service.getAlumnos().success(function(data){
        $scope.alumnos = data.datos;
      }).error( () => Materialize.toast('Erro al obtener', 3500) );
    }

    $scope.agregarMultiplesCursadas= function(cursada){
      cargados = true;
      angular.forEach($scope.selectedList, function (selected,idAlumnoListado ) {
        if (selected)
        {
          cursada.idAlumno=idAlumnoListado;
          service.agregarCursada(cursada).success(function(data){
            if(!data.exito)
            {
              cargados = false;
              //Materialize.toast("No se pudo cargar la cursada", 3500);
            }
            else
            {
              //Materialize.toast("Cursada cargada con éxito", 3500);
            }
          });
        }
      });
      if (cargados)
      {
          Materialize.toast("Cursadas cargadas con éxito", 3500);
      }
      else{
        Materialize.toast("No se pudieron cargar algunas cursadas", 3500);
      }
      $location.path('/alumnos-listar');
    }

    // Paginación
    $scope.vm = {};

    $scope.paginar = function(){
      
      $scope.vm.dummyItems = $scope.cursadas; // dummy array of items to be paged
      $scope.vm.pager = {};
      $scope.vm.setPage = setPage;

      initController();

      function initController() {
        // initialize to page 1
        $scope.vm.setPage(1);
      }

      function setPage(page) {
        if (page < 1 || page > $scope.vm.pager.totalPages) {
            return;
        }

        // get pager object from service
        $scope.vm.pager = service.GetPager($scope.vm.dummyItems.length, page);

        // get current page of items
        $scope.vm.items = $scope.vm.dummyItems.slice($scope.vm.pager.startIndex, $scope.vm.pager.endIndex + 1);

      }
    }
    // Fin Paginación ---
}]);

app.controller('ExamenesCtr', ['$rootScope','$scope', '$routeParams', '$location', 'service', function ($rootScope,$scope, $routeParams, $location, service) {
   $rootScope.idCursada =$routeParams.idCursada !=undefined ?  $routeParams.idCursada : $rootScope.idCursada;


    // Atributos y funciones para ordenamiento
    $scope.sortType = 'anio';
    $scope.sortReverse = false;

    $scope.revertirOrden = function(){
      $scope.sortReverse = ! $scope.sortReverse;
    }
    //
  
   service.getExamenes($routeParams.idCursada).success(function (data){
    //$scope.examenes = data['datos'].examen;
    //$scope.idAlumno = data.datos.idUsuario;
    if (data.datos.examen == null){
      Materialize.toast('No hay resultados', 3500);
    }
    else{
      $scope.examenes = data['datos'].examen;
      $scope.idAlumno = data.datos.idUsuario;
      $scope.obtenerAlumno($scope.idAlumno);
    }
    }).error( () => Materialize.toast('Error al obtener los examenes', 3500) );

    $scope.isAdding = false;

  $scope.agregarExamen = function(examen){
      examen.idCursada=$rootScope.idCursada;
      service.agregarExamen(examen).success(function(data){
        if(!data.exito){
          Materialize.toast("No se pudo cargar el examen", 3500);
        }
        else{
          Materialize.toast("Examen cargado con éxito", 3500);
        }
      }).error( () => Materialize.toast('Error al agregar examen', 3500) );

      $location.path('/examenes-listar/'+$rootScope.idCursada);
      }
  $scope.validarNota = function(value){
    
    if ((value > 10 || value < 1)& value!='') {
      return true;
    }
    else{
      return false;
    }
  }

  $scope.obtenerAlumno = function(id){
    service.AlumnoObtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;

    })
  }
}]);

app.controller('ComisionesCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'anio';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  var horarios = [];

  if ($routeParams.id){
    $scope.isAdding = true;

    var idComision = $routeParams.id;
    $scope.idComision = idComision;

    service.obtenerComisiones(idComision).success(function(data){

      //Carga los horarios en un arreglo y luego en el scope.
      angular.forEach(data.datos.horario, function(value, key) {
        this.push(value);
      }, horarios);
      $scope.horarios = horarios;

      // Carga los profesores en un arreglo
      var profesores = [];
      angular.forEach(data.datos.dicta, function(value, key) {
        this.push(value.idProfesor+'-'+value.nombreProfesor);
      }, profesores);
      
      // Crea un objeto "manejable" para la vista y lo asigna
      var comision = {
        'id': data.datos.id,
        'anio': parseInt(data.datos.anio),
        'cuatrimestre': data.datos.cuatrimestre,
        'idMateria':data.datos.idMateria,
        'materia': data.datos.idMateria,
        'profesores': profesores
      }
      
      $scope.comision = comision;


      $scope.diaDeSemana=function(numero)
      {
        var weekday = new Array(7);
        weekday[1] =  "Lunes";
        weekday[2] = "Martes";
        weekday[3] = "Miércoles";
        weekday[4] = "Jueves";
        weekday[5] = "Viernes";
        weekday[6] = "Sábado";
        weekday[7] = "Domingo";
        
        return weekday[numero];
      }
    });
    
  }

  $scope.obtenerComision= function(){
    var horarios = [];

    if ($routeParams.id){
      $scope.isAdding = true;

      var idComision = $routeParams.id;
      $scope.idComision = idComision;

      service.obtenerComisiones(idComision).success(function(data){

        //Carga los horarios en un arreglo y luego en el scope.
        angular.forEach(data.datos.horario, function(value, key) {
          this.push(value);
        }, horarios);
        $scope.horarios = horarios;

        // Carga los profesores en un arreglo
        var profesores = [];
        angular.forEach(data.datos.dicta, function(value, key) {
          this.push(value.idProfesor+'-'+value.nombreProfesor);
        }, profesores);
       
        // Crea un objeto "manejable" para la vista y lo asigna
        var comision = {
          'id': data.datos.id,
          'anio': parseInt(data.datos.anio),
          'cuatrimestre': data.datos.cuatrimestre,
          'idMateria':data.datos.idMateria,
          'materia': data.datos.materia,
          'profesores': profesores
        }
        
        $scope.comision = comision;


        $scope.diaDeSemana=function(numero)
        {
          var weekday = new Array(7);
          weekday[1] =  "Lunes";
          weekday[2] = "Martes";
          weekday[3] = "Miércoles";
          weekday[4] = "Jueves";
          weekday[5] = "Viernes";
          weekday[6] = "Sábado";
          weekday[7] = "Domingo";
          
          return weekday[numero];
        }
      });
      
    }
  }

  $scope.obtenerDatosAgregarComision = function() {
    service.obtenerProfesores().success(function(data){
      $scope.profesores = data.datos;
      setTimeout(() => $('select').material_select() , 100);
      }).error( () => Materialize.toast('Erro al obtener', 3500) );

    service.obtenerMaterias().success(function(data){
      $scope.materias = data.datos;
      setTimeout(() => $('select').material_select() , 100);
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

  $scope.obtenerComisiones = function(id) {
    service.obtenerComisiones(id).success(function(data){
        $scope.comisiones = data.datos;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
    }

  $scope.agregarHorario = function(dias, horaDesde, horaHasta){
    if (dias == null || horaDesde == null || horaHasta == null){
      Materialize.toast("La configuración horaria tiene un error", 3500);
    }
    else{
      var d = new Date(horaDesde);
      var horaDesde = d.getHours()+':'+obtenerMinutos(d);
      var d = new Date(horaHasta);
      var horaHasta = d.getHours()+':'+obtenerMinutos(d);
      var horario = {'dia': dias, 'horaInicio': horaDesde, 'horaFin': horaHasta};
      horarios.push(horario);
      $scope.horarios = horarios;
    }
  }

  $scope.eliminarHorario = function(horario){
    var index = horarios.indexOf(horario);
    horarios.splice(index, 1);
  }

  $scope.agregarComision = function(comision){
    if(horarios.length == 0){
      Materialize.toast("Debe configurar por lo menos un horario", 3500);
    }
    else{
      comision.horarios = horarios;

      if ($scope.isAdding){
        console.log("Modificando la siguiente comisión: ");
        console.log(comision);
      }
      else{
        service.obtenerMaterias(comision.materia).success(function(data2){
          comision.nombreMateria = data2.datos.nombre;

      });

        service.agregarComision(comision).success(function(data){
          if(!data.exito){
            Materialize.toast("No se pudo cargar la comisión", 3500);
          }
          else{
            Materialize.toast("Comisión cargada con éxito", 3500);
          }
        }).error( () => Materialize.toast('Error al guardar', 3500) );
      }
    }
    $location.path('/comisiones-listar');
    $scope.obtenerComisiones();
  }

  // Da un formato "correcto" a la hora. (EJ: 10:1 => 10:01)
  obtenerMinutos = function(hora){
    var d = new Date(hora);
    var minutos = d.getMinutes();
    if (minutos < 10){
      return '0'+minutos;
    }
    else
    {
      return minutos;
    }
  }

}]);

app.controller('InformeListarCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {
  $scope.isAdding = false;

  $rootScope.idAlumno = $routeParams.id !=undefined ?  $routeParams.id : $rootScope.idAlumno;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'fecha';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  if($routeParams.idInforme){
    $scope.isAdding = true;

    service.obtenerInforme($routeParams.idInforme).success(function(data){
      // Suma un día porque la conversión a Date le resta uno.
      var fecha = new Date(data.datos.fecha);
      var date = new Date();
      date.setDate(fecha.getDate() + 1);
      //
      var informe = {
        'id': data.datos.id,
        'idAlumno': data.datos.idAlumno,
        'titulo': data.datos.titulo,
        'fecha': date,
        'descripcion': data.datos.descripcion,
        'autor': data.datos.autor
      }
      $scope.informe = informe;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

 
  $scope.agregarInforme = function(informe){
    informe.idAlumno = $rootScope.idAlumno;
    if($scope.isAdding){
      service.actualizarInforme(informe).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar el informe", 3500);
        }
        else{
          Materialize.toast("Informe modificado con éxito", 3500);
        }
      });
    }
    else{
      service.agregarInforme(informe).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar el informe", 3500);
        }
        else{
          Materialize.toast("Informe cargado con éxito", 3500);
        }
      });
    }
   
    $location.path('informes-listar/'+$rootScope.idAlumno);
     $scope.obtenerInformes($rootScope.idAlumno); 
  }

  $scope.obtenerInformes = function(){

    service.obtenerInformes($scope.idAlumno).success(function(data){
      if (!data.datos){
        Materialize.toast('No hay resultados', 1500);
        $scope.informes=[]
      }
      else
      $scope.informes = data.datos;
          
      $scope.obtenerAlumno($scope.idAlumno);
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }
    $scope.obtenerAlumno = function(id){
    service.AlumnoObtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;
    })
  }
  
    $scope.obtenerInformesTutor = function(){
    service.obtenerInformesTutor($scope.idAlumno).success(function(data){
      if (!data.datos)
        $scope.informes=[];
      else
      $scope.informes = data.datos;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
      $scope.obtenerAlumno($scope.idAlumno);

  }

    $scope.eliminarInforme = function(id){
    service.eliminarInforme(id).success(function(data){
      if (!data.datos){
          Materialize.toast("No se pudo eliminar el informe", 3500);
        }
        else{
          Materialize.toast("Informe eliminado  con éxito", 3500);
         $scope.obtenerInformes();
        }        
    }).error( () => Materialize.toast('Error al eliminar', 3500) );
    }

}]);

app.controller('ActividadCtr', ['$scope', '$rootScope','$routeParams','$location', 'service', function ($scope, $rootScope, $routeParams,$location, service) {
  $scope.isAdding = false;

  $rootScope.idAlumno=  $rootScope.idAlumno !=undefined ?   $rootScope.idAlumno :  $routeParams.id;

    // Atributos y funciones para ordenamiento
    $scope.sortType = 'descripcion';
    $scope.sortReverse = false;
  
    $scope.revertirOrden = function(){
      $scope.sortReverse = ! $scope.sortReverue;
    }
    //

  var horarios = [];
  
  
  $scope.agregarActividad = function(actividad){
    actividad.idAlumno = $rootScope.idAlumno;
    if($scope.isAdding){
      service.actualizarActividad(informe).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar la actividad", 3500);
        }
        else{
          Materialize.toast("Actividad modificada con éxito", 3500);
        }
      });
    }
    else{
          actividad.horarios=horarios;
      service.agregarActividad(actividad).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar la actividad", 3500);
        }
        else{
          Materialize.toast("Actividad cargada  con éxito", 3500);
        }
      });
    }
    $location.path('actividades-listar/'+$rootScope.idAlumno);
  
  }

   $scope.diaDeSemana=function(numero)
      {
        var weekday = new Array(7);
        weekday[1] =  "Lunes";
        weekday[2] = "Martes";
        weekday[3] = "Miércoles";
        weekday[4] = "Jueves";
        weekday[5] = "Viernes";
        weekday[6] = "Sábado";
        weekday[7] = "Domingo";
        
        return weekday[numero];
      };

  $scope.obtenerActividades = function(){   
    service.obtenerActividades($routeParams.id).success(function(data){
      if (!data.datos){
        Materialize.toast('No hay resultados', 1500)
        $scope.actividades=[];
      }
      else
        $scope.actividades = data.datos;
      $scope.obtenerAlumno($routeParams.id);
    }).error( () => Materialize.toast('Error al obtener actividades', 3500) );
  }

  $scope.obtenerActividad = function(){
    service.obtenerActividad($routeParams.id).success(function(data){
      $scope.actividad = data.datos;
    }).error( () => Materialize.toast('Error al obtener actividad', 3500) );
  }

    $scope.obtenerAlumno = function(id){
    service.AlumnoObtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;
    })
  }

    $scope.eliminarActividad = function(idActividad){
    service.eliminarActividad(idActividad).success(function(data){
      if (!data.datos){
          Materialize.toast("No se pudo eliminar la actividad", 3500);
        }
        else{
          Materialize.toast("Actividad eliminada  con éxito", 3500);
          console.log($rootScope.idAlumno);
         $scope.obtenerActividades();
        }        
    }).error( () => Materialize.toast('Error al eliminar', 3500) );
    }


  

  $scope.agregarHorario = function(dias, horaDesde, horaHasta){
    console.log(dias);
    if (dias == null || horaDesde == null || horaHasta == null){
      Materialize.toast("La configuración horaria tiene un error", 3500);
    }
    else{
      var d = new Date(horaDesde);
      var horaDesde = d.getHours()+':'+obtenerMinutos(d);
      var d = new Date(horaHasta);
      var horaHasta = d.getHours()+':'+obtenerMinutos(d);
      var horario = {'dia': dias, 'horaInicio': horaDesde, 'horaFin': horaHasta};
      horarios.push(horario);
      $scope.horarios = horarios;
    }
  }

  $scope.eliminarHorario = function(horario){
    var index = horarios.indexOf(horario);
    horarios.splice(index, 1);
  }

  // Da un formato "correcto" a la hora. (EJ: 10:1 => 10:01)
  obtenerMinutos = function(hora){
    var d = new Date(hora);
    var minutos = d.getMinutes();
    if (minutos < 10){
      return '0'+minutos;
    }
    else
    {
      return minutos;
    }
  }

}]);

app.controller('MateriaCtr', ['$rootScope','$scope', '$routeParams', '$location', 'service', function ($rootScope,$scope, $routeParams, $location, service) {
  $scope.isAdding = false;

  if($routeParams.id){
    $scope.isAdding = true;
  }

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'nombre';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //
  $scope.agregarMateria = function(materia){
    // Si está modificando actualiza
    if ($scope.isAdding){
      service.actualizarMateria(materia).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar la materia", 3500);
        }
        else{
          Materialize.toast("Materia modificada con éxito", 3500);
        }
      });
    }
    else{
      service.agregarMateria(materia).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar la materia", 3500);
        }
        else{
          Materialize.toast("Materia cargada con éxito", 3500);
        }
      });
    }
    $scope.obtenerMaterias();
    $location.path('/materias-listar');
  }
  
  $scope.obtenerDatosMateriaAgregar = function(){
     if ($scope.isAdding)
    {
      service.obtenerMaterias($routeParams.id).success(function(data){
          $scope.materia = data.datos;
      });
    }

  }


  $scope.obtenerMaterias = function(){
    service.obtenerMaterias().success(function(data){
        if (!data.datos)
        $scope.materias=[];
        else
        $scope.materias = data.datos;
        $scope.paginar();
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

  // Paginación
  $scope.vm = {};

  $scope.paginar = function(){
    
    $scope.vm.dummyItems = $scope.materias; // dummy array of items to be paged
    $scope.vm.pager = {};
    $scope.vm.setPage = setPage;

    initController();

    function initController() {
      // initialize to page 1
      $scope.vm.setPage(1);
    }

    function setPage(page) {
      if (page < 1 || page > $scope.vm.pager.totalPages) {
          return;
      }

      // get pager object from service
      $scope.vm.pager = service.GetPager($scope.vm.dummyItems.length, page);

      // get current page of items
      $scope.vm.items = $scope.vm.dummyItems.slice($scope.vm.pager.startIndex, $scope.vm.pager.endIndex + 1);

    }
  }
  // Fin Paginación ---

}]);


app.controller('ArchivoCtr', ['$rootScope','$scope', '$routeParams', '$location', 'service', function ($rootScope,$scope, $routeParams, $location, service) {
  
  
  // Atributos y funciones para ordenamiento
  $scope.sortType = 'titulo';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  $scope.initialize = function()
  {
    if( $location.url().includes('archivo-listar') )
    {
      
      $scope.archivos = [];
      // Seteamos el ID de la Materia de la cual se mostraran los archivos/links
      $rootScope.idMateria = $routeParams.id;
      $scope.obtenerArchivosMateria($rootScope.idMateria);
      
    }
    else
    {
  
      let materia = $rootScope.idMateria;

      if(materia==undefined)
      {
        $location.path('/');
        Materialize.toast("Debe seleccionar una materia.<br>No recargue la página por favor !", 3500);
      }

      $scope.archivo = {id: $routeParams.id, titulo:'', descripcion:'', link:'', idMateria:materia, fuenteArchivo:false, archivoAsubir:null};

      //Agregar o modificar un archivo
      if( $scope.archivo.id != undefined )
      {
        // Se obtiene el archivo correspondiente por el ID que viene en el URL
        $scope.obtenerDatosArchivo( archivoId );
        $scope.isAdding = false;
      }
      else
      {
        $scope.isAdding = true;
      }
      
    }
  };

  $scope.obtenerDatosArchivo = function(idArchivo)
  {
    //$scope.isAdding = true;
    service.obtenerArchivo(idArchivo).success( function(data){
        $scope.archivo = data.datos;

        if ($scope.archivo.idCategoriaArchivo==1)
          $scope.archivo.link = $scope.archivo.ruta;
        
        // Para el check Link<->Archivo
        $scope.archivo.fuenteArchivo = ($scope.archivo.idCategoriaArchivo==2);
    });
  };

  $scope.agregarArchivo = function(archivo)
  {
    // Seteamos la materia a la que pertenece
    archivo.idMateria=$rootScope.idMateria;

    //Si es link
    if ( ! $scope.archivo.fuenteArchivo )
    {
      archivo.ruta=archivo.link;
      archivo.tipo=1;
    }
    //si es un documento.
    else
    {
      archivo.tipo=2;
      //archivo.file=$scope.archivoAsubir;
    }

    if ($scope.isAdding)
    {

      service.agregarArchivo(archivo).success(function(data){
        if (!data.exito){
          $location.path('/archivo-listar/'+archivo.idMateria);
          Materialize.toast("No se pudo agregar el archivo."+"<br>"+data.mensaje_error, 3500);
        }
        else{
          $scope.obtenerArchivosMateria($rootScope.idMateria);
          $location.path('/archivo-listar/'+archivo.idMateria);
          Materialize.toast("Archivo cargado con éxito", 3500);
        }
      });

    }
    else
    {

      service.actualizarArchivo(archivo).success(function(data){
        if (!data.exito){
          $location.path('/archivo-listar/'+archivo.idMateria);
          Materialize.toast("No se pudo modificar el archivo", 3500);
        }
        else{
          $scope.obtenerArchivosMateria($rootScope.idMateria);
          $location.path('/archivo-listar/'+archivo.idMateria);
          Materialize.toast("Archivo modificado con éxito", 3500);
        }
      });
    }
    
  };

  $scope.archivoParaSubir_O_LinkNoVacio = function(){
    if($scope.isAdding)
    {
      return (
        ($scope.archivo.fuenteArchivo == false && $scope.archivo.link != "" )//Link
        ||
        ($scope.archivo.fuenteArchivo == true && $scope.archivo.archivoAsubir != undefined )//Archivo
      );
    }
    else
    {
      //Porque no se permite cambiar link o archivo al modificar
      return true;      
    }
  };

  $scope.obtenerArchivosMateria = function( idMateria)
  {
    service.obtenerArchivosMateria( idMateria)
      .success( function(data){
        if (!data.datos)
        $scope.archivos=[];
        else
          $scope.archivos =data.datos.archivo;
      })
      .error( () => Materialize.toast('Error al obtener Archivos', 3500) );
  };

}]);

app.controller('ProfesorCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'nombre';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  if ($routeParams.id){
    $scope.isAdding = true;
    var idProfesor = $routeParams.id;

    service.obtenerProfesores(idProfesor).success(function(data){
      $scope.profesor = data.datos;
    });
  }

  $scope.agregarProfesor = function(profesor){
    if ($scope.isAdding){
      service.actualizarProfesor(profesor).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar el profesor", 3500);
        }
        else{
          Materialize.toast("Profesor modificado con éxito", 3500);
        }
      });
    }
    else{
      service.agregarProfesor(profesor).success(function(data){
        if(!data.exito){
          Materialize.toast("No se pudo cargar el profesor", 3500);
        }
        else{
          Materialize.toast("Profesor cargado con éxito", 3500);
        }
      }).error( () => Materialize.toast('Erro al obtener', 3500) );
    }

      $location.path('/profesores-listar');
      $scope.obtenerProfesores();
  }

  $scope.obtenerProfesores = function(){
      service.obtenerProfesores().success(function(data){
        //WACHIN
        //data.datos = (Array)(data.datos);
        //data.datos = data.datos.concat(angular.copy(data.datos),angular.copy(data.datos),angular.copy(data.datos),angular.copy(data.datos),angular.copy(data.datos),angular.copy(data.datos),angular.copy(data.datos),angular.copy(data.datos),angular.copy(data.datos));
        $scope.profesores = data.datos;
      }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }
}]);

app.controller('PaisesCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'nombre';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  if ($routeParams.id){
    $scope.isAdding = true;
    var idPais = $routeParams.id;

    service.obtenerPaises(idPais).success(function(data){
      $scope.pais = data.datos;
    });
  }

  $scope.agregarPais = function(pais){
    // Si está modificando actualiza
    if ($scope.isAdding){
      service.actualizarPais(pais).success(function(data){
        if (!data.exito){
          $location.path('/paises-listar');
          Materialize.toast("No se pudo modificar el país", 3500);
        }
        else{
          $scope.obtenerPaises();
          $location.path('/paises-listar');
          Materialize.toast("País modificado con éxito", 3500);
        }
      });
    }
    else{
        //Se valida antes si no existe ya otro pais guardado.
      service.validarPais(pais).success(function(validacion){
        if (!validacion.exito)
         Materialize.toast("No se puede agregar un pais que ya existe", 3500);
        else{
            service.agregarPais(pais).success(function(data){
              if (!data.exito){
                $location.path('/paises-listar');
                Materialize.toast("No se pudo agregar el país", 3500);
              }
              else{
                $scope.obtenerPaises();
                $location.path('/paises-listar');
                Materialize.toast("País cargado con éxito", 3500);
              }
            });
        }  
      }).error( () => Materialize.toast('Error al validar el pais', 3500) );
    }
  }

  $scope.obtenerPaises = function(){
    service.obtenerPaises(null).success(function(data){
        $scope.paises = data.datos;
    }).error( () => Materialize.toast('Error al obtener paises', 3500) );
  }
 
  $scope.eliminarPais = function(id){
    service.eliminarPais(id).success(function(data){
      if (!data.datos){
          Materialize.toast("No se pudo eliminar el pais", 3500);
        }
        else{
          Materialize.toast("Pais eliminado  con éxito", 3500);
         $scope.obtenerPaises();
        }        
    }).error( () => Materialize.toast('Error al eliminar', 3500) );
  }

}]);

app.controller('CiudadesCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  $scope.isAdding = false;

  if ($routeParams.id){
    $scope.isAdding = true;
    var idCiudad = $routeParams.id;
    
    service.obtenerCiudades(idCiudad).success(function(data){
      const ciudad = {
        'nombre': data.datos.nombre,
        'pais': data.datos.idPais
      }
      $scope.ciudad = ciudad;
    });
  }

  $scope.obtenerDatosAgregarCiudad = function() {
    service.obtenerPaises().success(function(data){
      $scope.paises = data.datos;
      setTimeout(() => $('select').material_select() , 100);
      }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

  $scope.agregarCiudad = function(ciudad){
    // Si está modificando actualiza
    if ($scope.isAdding){
      service.actualizarCiudad(ciudad).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar la ciudad", 3500);
        }
        else{
          Materialize.toast("Ciudad modificada con éxito", 3500);
        }
      });
    }
    else{
      service.agregarCiudad(ciudad).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar la ciudad", 3500);
        }
        else{
          Materialize.toast("Ciudad cargada con éxito", 3500);
        }
      });
    }
    $scope.obtenerCiudades();
    $location.path('/ciudades-listar');
  }

  $scope.obtenerCiudades = function(){
    service.obtenerCiudades(null).success(function(data){
/*         var materias = [];

        angular.forEach(data.datos, function(value, key) {
          this.push(value);
        }, materias);
        console.log(materias);
        $scope.materias = materias; */
        $scope.ciudades = data.datos;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

}]);

app.controller('EscuelasCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'nombre';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  $scope.cargarCiudades = function(idPais){
    service.obtenerPaises(idPais).success(function(data){
    $scope.ciudades=data.datos.ciudad;
   setTimeout(() => $('select').material_select() , 100);
    });
  }

  $scope.obtenerDatosAgregarEscuela = function() {
    service.obtenerPaises().success(function(data){
      $scope.paises=data.datos;
      setTimeout(() => $('select').material_select() , 100);
    });
  }

  if ($routeParams.id){
    $scope.isAdding = true;
    var idEscuela = $routeParams.id;
    
    service.obtenerEscuelas(idEscuela).success(function(data){
      $scope.cargarCiudades(data.datos.ciudad.idPais);
      const escuela = {
        'nombre': data.datos.nombre,
        'orientacion': data.datos.orientacion,
        'pais': data.datos.ciudad.idPais,
        'ciudad': data.datos.idCiudad
      }
      $scope.escuela = escuela;
    });
  }

  $scope.agregarEscuela = function(escuela){
    // Si está modificando actualiza
    if ($scope.isAdding){
      service.actualizarEscuela(escuela).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar la escuela", 3500);
        }
        else{
          Materialize.toast("Escuela modificada con éxito", 3500);
        }
      });
    }
    else{
      service.agregarEscuela(escuela).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar la escuela", 3500);
        }
        else{
          Materialize.toast("Escuela cargada con éxito", 3500);
        }
      });
    }
    $scope.obtenerEscuelas();
    $location.path('/escuelas-listar');
  }

  $scope.obtenerEscuelas = function(){
    service.obtenerEscuelas(null).success(function(data){
        if (!data.datos)
        $scope.escuelas=[];
        else
        $scope.escuelas = data.datos;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

}]);

// Controlador para el usuario logeado ALUMNO.
app.controller('UserAlumnoCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {

  $rootScope.alumnoLog = USER_ID_LOG;
  $scope.alumnoLog = $rootScope.alumnoLog;

  // Atributos y funciones para ordenamiento
  $scope.sortType = '';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //

  if ($routeParams.idCurs){
    service.AlumnoObtenerExamenes($routeParams.idCurs).success(function (data){
      if (data.datos.examen == null){
        Materialize.toast('No hay resultados', 3500);
      }
      else{
        $scope.examenes = data.datos.examen;
      }
    }).error( () => Materialize.toast('Error al obtener los examenes', 3500) );
  }

  $scope.obtenerCursadasAlumno = function(id){
    service.AlumnoObtenerCursadas(id).success(function (data){
      $scope.cursadas = data.datos;
    })
  }

  $scope.obtenerInformesAlumno = function(id){
    service.AlumnoObtenerInformes(id).success(function (data){
      $scope.informes = data.datos;
    })
  }

  $scope.obtenerActividadesAlumno = function(id){
    service.AlumnoObtenerActividades(id).success(function (data){
      $scope.actividades = data.datos;
    })
  }

  $scope.obtenerAlumno = function(id){
    service.AlumnoObtenerAlumno(id).success(function (data){
      var alumno = {
        'id': data.datos.id,
        'first_name': data.datos.first_name,
        'last_name': data.datos.last_name,
        'username': parseInt(data.datos.username),
        'email': data.datos.email,
        'phone': parseInt(data.datos.phone),
        'anioIngreso': data.datos.anioIngreso,
        'escuela': data.datos.escuela
      }
      //$scope.alumno = data.datos;
      $scope.alumno = alumno;
    })
  }

  $scope.modificarAlumno = function(alumno){
    service.AlumnoModificar(alumno).success(function (data){
      if (!data.exito){
        Materialize.toast("No se pudieron modificar los datos", 3500);
      }
      else{
        Materialize.toast("Datos modificados con éxito", 3500);
      }
    })
    $location.path('/alumno-perfil');
  }

  $scope.obtenerArchivosMateria = function()
  {
    service.alumnoObtenerArchivosMateria( $routeParams.id)
      .success( function(data){
          $scope.nombreMateria=data.datos.nombre;
          $scope.archivos =data.datos.archivo;
      })
      .error( () => Materialize.toast('Error al obtener Archivos', 3500) );
  };

  $scope.validarTelefono = function(value){
    if ((value > 9999999999999 || value < 11111111111) & value!='') 
    {
      return true;
    }
    else
    {
      return false;
    }
  }

}]);

// Controlador para el usuario logeado TUTOR.
app.controller('UserTutorCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {
  $scope.isAdding = false;

  $rootScope.alumnoLog = USER_ID_LOG;
  $scope.alumnoLog = $rootScope.alumnoLog;

  $rootScope.idAlumno = $routeParams.id != undefined ? $routeParams.id : $rootScope.idAlumno;

  // Atributos y funciones para ordenamiento
  $scope.sortType = '';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverse;
  }
  //


  if($routeParams.idModif){
    $scope.isAdding = true;

    service.TutorObtenerInforme($routeParams.idModif).success(function (data){
      var fecha = new Date(data.datos.fecha);
      var date = new Date();
      date.setDate(fecha.getDate() + 1);
      //
      var informe = {
        'id': data.datos.id,
        'idAlumno': data.datos.idAlumno,
        'titulo': data.datos.titulo,
        'fecha': date,
        'descripcion': data.datos.descripcion,
        'autor': data.datos.autor
      }
      $scope.informe = informe;
    })
  }

  if($routeParams.idInforme){
    $scope.isAdding = true;

    service.TutorObtenerInforme($routeParams.idInforme).success(function (data){
      var fecha = new Date(data.datos.fecha);
      var date = new Date();
      date.setDate(fecha.getDate() + 1);
      //
      var informe = {
        'id': data.datos.id,
        'idAlumno': data.datos.idAlumno,
        'titulo': data.datos.titulo,
        'fecha': date,
        'descripcion': data.datos.descripcion,
        'autor': data.datos.autor
      }
      $scope.informe = informe;
    })
  }

  $scope.obtenerAlumnos = function(){
    service.TutorObtenerAlumnos().success(function (data){
      $scope.alumnos = data.datos;
    })
  }
  

  $scope.obtenerExamenes=function(id) {
    service.TutorObtenerExamenes($routeParams.idCurs).success(function (data){
    $scope.examenes = data.datos.examen;
    })
    service.TutorObtenerCursada($routeParams.idCurs).success(function (data){
      $scope.nombreMateria = data.datos.comision.nombreMateria;
      $rootScope.idAlumno=data.datos.idUsuario;
      service.TutorObtenerAlumno(data.datos.idUsuario).success(function (alum){
        $scope.alumno = alum.datos;
      })
    })

  }
  $scope.obtenerAlumno = function(id){
      service.TutorObtenerAlumno(id).success(function (alum){
        $scope.alumno = alum.datos;
      })
  }

  
    $scope.obtenerActividades = function(){
    service.TutorObtenerActividades($routeParams.id).success(function(data){
      if (!data.datos)
        $scope.actividades=[];
        else
      $scope.actividades = data.datos;  
    }).error( () => Materialize.toast('Error al obtener actividades', 3500) );
     $scope.obtenerAlumno($routeParams.id);
  }


    $scope.eliminarInforme = function(id){
    service.eliminarInforme(id).success(function(data){
      if (!data.datos){
          Materialize.toast("No se pudo eliminar el informe", 3500);
        }
        else{
          Materialize.toast("Informe eliminado  con éxito", 3500);
         $scope.obtenerInformes($rootScope.idAlumno);
        }        
    }).error( () => Materialize.toast('Error al eliminar', 3500) );
    }


  $scope.obtenerCursadas = function(id){
    service.TutorObtenerCursadas(id).success(function (data){
      $scope.cursadas = data.datos;
    })
      service.TutorObtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;
    })
  }

  $scope.obtenerInformes = function(id){
    service.TutorObtenerInformes(id).success(function (data){
      console.log(data);
      $scope.informes = data.datos;
    })
     service.TutorObtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;
    })
  }

  $scope.agregarInforme = function(informe){
    informe.idAutor = $rootScope.alumnoLog;
    informe.idAlumno = $rootScope.idAlumno;
    if($scope.isAdding){
      service.TutorActualizarInforme(informe).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar el informe", 3500);
        }
        else{
          Materialize.toast("Informe modificado con éxito", 3500);
        }
      });
    }
    else{
      service.TutorAgregarInforme(informe).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar el informe", 3500);
        }
        else{
          Materialize.toast("Informe cargado con éxito", 3500);
        }
      });
    }
    $location.path('tutor-informes/'+$rootScope.idAlumno);
  }

  $scope.obtenerTutor = function(){
    service.obtenerPerfilTutor($rootScope.alumnoLog).success(function (data){
      var tutor = {
        'id': data.datos.id,
        'nombre': data.datos.first_name,
        'apellido': data.datos.last_name,
        'dni': parseInt(data.datos.username),
        'email': data.datos.email,
        'telefono': parseInt(data.datos.phone),
      }
      $scope.tutor = tutor;
    })
  }

  $scope.validarTelefono = function(value){
    if ((value > 9999999999999 || value < 11111111111) & value!='') 
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  $scope.modificarTutor = function(tutor){
    service.TutorModificar(tutor).success(function (data){
      if (!data.exito){
        Materialize.toast("No se pudieron modificar los datos", 3500);
      }
      else{
        Materialize.toast("Datos modificados con éxito", 3500);
      }
    })
    $location.path('tutor-perfil');
  }
}]);

app.controller('ForoCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {
  $scope.isAdding = false;
  $rootScope.idCategoria = $routeParams.idCat != undefined ? $routeParams.idCat : $rootScope.idCategoria;
  $rootScope.idTema = $routeParams.idTema != undefined ? $routeParams.idTema : $rootScope.idTema;

  if ($routeParams.idCat){
    $rootScope.idCategoria = $routeParams.idCat;
  }

  if ($routeParams.idCatMod){
    $scope.isAdding = true;

    service.foroObtenerCategorias($routeParams.idCatMod).success(function(data){
      $scope.categoria = data.datos;
    });
  }

  if ($routeParams.idTema){
    $rootScope.idTema = $routeParams.idTema;
  }

  if ($routeParams.idTemaMod){
    $scope.isAdding = true;

    service.foroObtenerTema($routeParams.idTemaMod).success(function(data){
      $scope.tema = data.datos;
    });
  }



  $scope.agregarCategoria = function(categoria) {
    if ($scope.isAdding){
      service.foroActualizarCategoria(categoria).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar la categoría", 3500);
        }
        else{
          Materialize.toast("Categoría modificada con éxito", 3500);
        }
      });
    }
    else{
      service.foroAgregarCategoria(categoria).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar la categoría", 3500);
        }
        else{
          Materialize.toast("Categoría cargada con éxito", 3500);
        }
      });
    }
    $location.path('foro-admin');
  }

  $scope.obtenerCategorias = function(id) {
    service.foroObtenerCategorias(id).success(function(data){
      $scope.categorias = data.datos;
    });
  }
   $scope.obtenerCategoria = function(id) {
    service.foroObtenerCategorias(id).success(function(data){
      $scope.categoria = data.datos;
    });
  }

  $scope.agregarTema = function(tema) {
    if ($scope.isAdding){
      service.foroActualizarTema(tema).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo actualizar el tema", 3500);
        }
        else{
          Materialize.toast("Tema actualizado con éxito", 3500);
        }
      });
    }
    else{
      temaAgregar = {
        'idCategoria': $rootScope.idCategoria,
        'titulo': tema.titulo,
        'estado': 'abierto',
        'visitas': 0
      }
      service.foroAgregarTema(temaAgregar).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar el tema", 3500);
        }
        else{
          Materialize.toast("Tema cargado con éxito", 3500);
        }
      });
    }
    $location.path('foro-temas/'+$rootScope.idCategoria);
    $scope.obtenerTemas($rootScope.idCategoria);
  }

  $scope.obtenerTemas = function(id) {
    $scope.obtenerCategoria(id);
    
    service.foroObtenerTemasCategoria(id).success(function(data){
      if (data.datos == false){
        Materialize.toast("No hay resultados", 1500);
        $scope.temas = [];
      }
      else{
        $scope.temas = data.datos;
      }
    });
  }

  $scope.agregarMensajeNuevo = function (idTema){
    $location.path('foro-agregarMensaje/'+idTema);
  }

  $scope.agregarMensaje = function(mensaje) {
    mensajeAgregar = {
      'contenido': mensaje.contenido,
      'fecha': new Date(),
      'idUsuario': USER_ID_LOG,
      'posicion': 1,
      'idTema': $rootScope.idTema
    }
    service.foroAgregarMensaje(mensajeAgregar).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo agregar el mensaje", 3500);
      }
      else{
        Materialize.toast("Mensaje cargado con éxito", 3500);
      }
    });
    $location.path('foro-mensajes/'+$rootScope.idTema);
  }

  $scope.obtenerMensajes = function(id) {
    service.foroObtenerTema(id).success(function(data){
      $scope.tema = data.datos;
      if ($scope.tema.estado=='cerrado')
        $scope.cerrado=true;
    });

    service.foroObtenerMensajes(id).success(function(data){
      if (data.datos == false){
        Materialize.toast("No hay resultados", 1500);
      }
      else{
        var nuevo = [];
        angular.forEach(data.datos, function(value, key) {
          // Suma un día porque la conversión a Date le resta uno.
          var fecha = new Date(value.fecha);
          var date = new Date();
          date.setDate(fecha.getDate() + 1);
          //
          this.push(value);
        }, nuevo);
        $scope.mensajes = nuevo;
    }
      
    });
   
  }

  $scope.eliminarTema = function(id) {
    service.foroEliminarTema(id).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo eliminar el tema", 3500);
      }
      else{
        Materialize.toast("Tema eliminado con éxito", 3500);
      }
    });
    $location.path('foro-temas/'+$rootScope.idCategoria);
    $scope.obtenerTemas($rootScope.idCategoria);
  }

  $scope.eliminarCategoria = function(id) {
    service.foroEliminarCategoria(id).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo eliminar la categoria", 3500);
      }
      else{
        Materialize.toast("Categoría eliminada con éxito", 3500);
      }
    });
    $location.path('foro-admin/');
  }

  $scope.eliminarMensaje = function(id) {
    service.foroEliminarMensaje(id).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo eliminar el mensaje", 3500);
      }
      else{
        Materialize.toast("Mensaje eliminado con éxito", 3500);
      }
    });
    $location.path('foro-mensajes/'+$rootScope.idTema);
    $scope.obtenerMensajes($rootScope.idTema);
  }



  $scope.cerrarTema=   function(id) {
    service.foroCerrarTema(id).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo cerrar el tema", 3500);
      }
      else{
        Materialize.toast("Tema cerrado con éxito", 3500);
      }
    });
    $location.path('foro-temas/'+$rootScope.idCategoria);
    $scope.obtenerTemas($rootScope.idCategoria);
  }
    $scope.abrirTema=   function(id) {
    service.foroAbrirTema(id).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo abrir el tema", 3500);
      }
      else{
        Materialize.toast("Tema abierto con éxito", 3500);
      }
    });
    $location.path('foro-temas/'+$rootScope.idCategoria);
    $scope.obtenerTemas($rootScope.idCategoria);
  }

}]);

app.controller('ForoAlumnoCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {

  $rootScope.idCategoria = $routeParams.idCat != undefined ? $routeParams.idCat : $rootScope.idCategoria;
  $rootScope.idTema = $routeParams.idTema != undefined ? $routeParams.idTema : $rootScope.idTema;

  $scope.isAbierto = true;

  if ($routeParams.idCat){
    $rootScope.idCategoria = $routeParams.idCat;
  }

  if ($routeParams.idTema){
    $rootScope.idTema = $routeParams.idTema;
  }

  $scope.obtenerCategorias = function(id) {
    service.foroAlumnoObtenerCategorias(id).success(function(data){
      $scope.categorias = data.datos;
    });
  }

  $scope.obtenerTemas = function(id) {
    service.foroAlumnoObtenerTemasCategoria(id).success(function(data){
      $scope.temas = data.datos;
    });
  }

  $scope.agregarMensajeNuevo = function (idTema){
    $location.path('foro-alumno-agregarMensaje/'+idTema);
  }

  $scope.agregarMensaje = function(mensaje) {
    mensajeAgregar = {
      'contenido': mensaje.contenido,
      'fecha': new Date(),
      'idUsuario': USER_ID_LOG,
      'posicion': 1,
      'idTema': $rootScope.idTema
    }
    service.foroAlumnoAgregarMensaje(mensajeAgregar).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo agregar el mensaje", 3500);
      }
      else{
        Materialize.toast("Mensaje cargado con éxito", 3500);
      }
    });
    $location.path('foro-alumno-mensajes/'+$rootScope.idTema);
  }

  $scope.obtenerMensajes = function(id) {
    service.foroAlumnoObtenerMensajes(id).success(function(data){
      var nuevo = [];
      angular.forEach(data.datos, function(value, key) {
        // Suma un día porque la conversión a Date le resta uno.
        var fecha = new Date(value.fecha);
        var date = new Date();
        date.setDate(fecha.getDate() + 1);
        //
        this.push(value);
      }, nuevo);
      $scope.mensajes = nuevo;

      if (nuevo[0].tema.estado == "cerrado"){
        $scope.cerrado = true;
      }
    });
  }


    $scope.agregarTema = function(tema) {
      temaAgregar = {
        'idCategoria': $rootScope.idCategoria,
        'titulo': tema.titulo,
        'estado': 'abierto',
        'visitas': 0
      }
      service.foroAgregarTemaAlumno(temaAgregar).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar el tema", 3500);
        }
        else{
          Materialize.toast("Tema cargado con éxito", 3500);
        }
      });
      $scope.obtenerTemas();
    $location.path('foro-alumno-temas/'+$rootScope.idCategoria);
  }

}]);

app.controller('ForoTutorCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {

  $rootScope.idCategoria = $routeParams.idCat != undefined ? $routeParams.idCat : $rootScope.idCategoria;
  $rootScope.idTema = $routeParams.idTema != undefined ? $routeParams.idTema : $rootScope.idTema;

  $scope.isAbierto = true;

  if ($routeParams.idCat){
    $rootScope.idCategoria = $routeParams.idCat;
  }

  if ($routeParams.idTema){
    $rootScope.idTema = $routeParams.idTema;
  }

  $scope.obtenerCategorias = function(id) {
    service.foroTutorObtenerCategorias(id).success(function(data){
      $scope.categorias = data.datos;
    });
  }
  

  $scope.obtenerTemas = function(id) {
    service.foroTutorObtenerTemasCategoria(id).success(function(data){
      $scope.temas = data.datos;
    });
  }

  $scope.agregarMensajeNuevo = function (idTema){
    $location.path('foro-tutor-agregarMensaje/'+idTema);
  }

  $scope.agregarMensaje = function(mensaje) {
    mensajeAgregar = {
      'contenido': mensaje.contenido,
      'fecha': new Date(),
      'idUsuario': USER_ID_LOG,
      'posicion': 1,
      'idTema': $rootScope.idTema
    }
    service.foroTutorAgregarMensaje(mensajeAgregar).success(function(data){
      if (!data.exito){
        Materialize.toast("No se pudo agregar el mensaje", 3500);
      }
      else{
        Materialize.toast("Mensaje cargado con éxito", 3500);
      }
    });
    $location.path('foro-tutor-mensajes/'+$rootScope.idTema);
    $scope.obtenerTemas($rootScope.idCategoria);
  }

  $scope.agregarTema = function(tema) {
    if ($scope.isAdding){
      service.foroActualizarTema(tema).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo actualizar el tema", 3500);
        }
        else{
          Materialize.toast("Tema actualizado con éxito", 3500);
        }
      });
    }
    else{
      temaAgregar = {
        'idCategoria': $rootScope.idCategoria,
        'titulo': tema.titulo,
        'estado': 'abierto',
        'visitas': 0
      }
      service.foroAgregarTema(temaAgregar).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar el tema", 3500);
        }
        else{
          Materialize.toast("Tema cargado con éxito", 3500);
        }
      });
    }
    $location.path('foro-tutor-temas/'+$rootScope.idCategoria);
  }

  $scope.obtenerMensajes = function(id) {
    service.foroTutorObtenerMensajes(id).success(function(data){
      var nuevo = [];
      angular.forEach(data.datos, function(value, key) {
        // Suma un día porque la conversión a Date le resta uno.
        var fecha = new Date(value.fecha);
        var date = new Date();
        date.setDate(fecha.getDate() + 1);
        //
        this.push(value);
      }, nuevo);
      $scope.mensajes = nuevo;

      if (nuevo[0].tema.estado == "cerrado"){
        $scope.cerrado = true;
      }
    });
  }

}]);














app.controller('PedidosCtr', ['$scope','service', function ($scope, service) {
  service.getNotificaciones().success(function(data){
    if(data.code===200){
      $scope.notificaciones=data.notificaciones;
    }
  });

  $scope.aCocina=function(idNotificacion){
    var notificacion = $scope.notificaciones.find(notificacion => notificacion.id==idNotificacion);
    notificacion.tipoNotificacion='2';
  };

  $scope.enCamino=function(idNotificacion){
    var notificacion = $scope.notificaciones.find(notificacion => notificacion.id==idNotificacion);
    notificacion.tipoNotificacion='3';
  };

  $scope.atender=function(idNotificacion){
    service.atendNotifications(idNotificacion).success(function(data){
      if(data.code===200){
        console.log(idNotificacion);
        let notificacion  = $scope.notificaciones.find(notificacion => notificacion.id==idNotificacion);
        notificacion.atendido=true;
      }
    });

  };
}]);

app.controller('TutoresCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'username';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = ! $scope.sortReverue;
  }
  //
  
  // HACER LA REDIRECCION POR SI EL ID ES VACIO
  $rootScope.idTutor = $routeParams.idTutor != undefined ?  $routeParams.idTutor: $rootScope.idTutor;

  if ($routeParams.idTutor){
    $scope.isAdding = true;

    service.obtenerTutor($routeParams.idTutor).success(function (data){
      var tutor = {
        'id': data.datos.id,
        'nombre': data.datos.first_name,
        'apellido': data.datos.last_name,
        'dni': parseInt(data.datos.username),
        'email': data.datos.email,
        'telefono': parseInt(data.datos.phone),
      }
      $scope.tutor = tutor;
    })
  }

    $scope.obtenerTutor = function(){
    service.obtenerTutor($routeParams.id).success(function (data){
      $scope.tutor = data.datos;
    })
  }
  $scope.agregarTutor = function(tutor){
    if ($scope.isAdding){
      service.actualizarTutor(tutor).success(function(data){
        if(!data.exito){
          Materialize.toast("No se pudo cargar el tutor", 3500);
        }
        else{
          Materialize.toast("Tutor cargado con éxito", 3500);
        }
      }).error( () => Materialize.toast('Error al obtener los tutores', 3500) );
    }
    else{
      service.agregarTutor(tutor).success(function(data){
        if(!data.exito){
          Materialize.toast("No se pudo cargar el tutor", 3500);
        }
        else{
          Materialize.toast("Tutor cargado con éxito", 3500);
        }
      }).error( () => Materialize.toast('Error al obtener Tutores', 3500) );
    }
    
    $location.path('/tutores-listar');
    $scope.obtenerTutores();
  }

  $scope.obtenerTutores = function(idTutor){
    service.obtenerTutores().success(function (data){
      $scope.tutores = data.datos;
    })
  }

  $scope.obtenerInformesTutor = function(){
      service.obtenerInformesTutor($rootScope.idTutor).success(function (data){
        
      if (!data.datos){
        Materialize.toast('No hay resultados', 1500)
        $scope.informes=[];
      }
      else
        $scope.informes = data.datos;
      })
  }

   $scope.eliminarInforme = function(id){
    service.eliminarInforme(id).success(function(data){
      if (!data.datos){
          Materialize.toast("No se pudo eliminar el informe", 3500);
        }
        else{
          Materialize.toast("Informe eliminado  con éxito", 3500);
         $scope.obtenerInformesTutor();
        }        
    }).error( () => Materialize.toast('Error al eliminar', 3500) );
    }

    $scope.resetearContrasenia = function(id){
      service.resetearContrasenia(id).success(function (data){
        if (!data.exito){
          Materialize.toast("No se pudo resetear la contraseña", 3500);
        }
        else{
          Materialize.toast("Contraseña reseteada con éxito", 3500);
        }  
      })
    }

    $scope.validarTelefono = function(value){
    if ((value > 9999999999999 || value < 11111111111) & value!='') 
    {
      return true;
    }
    else
    {
      return false;
    }
  }

}]);





app.controller('DefaultCtr', ['$scope','$location', '$routeParams', function ($scope, $location, $routeParams) {
  $scope.openModal = selector => {
    $(selector).modal('open');
  }
}]);


