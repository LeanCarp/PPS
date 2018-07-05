app.controller('AlumnosCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'carrera';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
    $scope.sortReverse = $scope.sortReverse == true ? false : true;
  }
  //

    $scope.getAlumnos= function(id){
    service.getAlumnos().success(function (data){
      $scope.alumnos = data.datos;
    })
  }

  if ($routeParams.id)
  {
    $scope.isAdding = true;

    $scope.idAlumno = $routeParams.id;

    service.obtenerAlumno($routeParams.id).success(function (data){
      var alumno = {
        'nombre': data.datos.first_name,
        'apellido': data.datos.last_name,
        'dni': parseInt(data.datos.username),
        'email': data.datos.email,
        'telefono': parseInt(data.datos.phone),
        'anioIngreso': parseInt(data.datos.anioIngreso),
        'carrera': data.datos.carrera,
        'escuela': data.datos.idEscuela,
      }
      $scope.alumno = alumno;
    })
  }
  else{
   $scope.getAlumnos();
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
    service.obtenerEscuelas().success(function(data){
        $scope.colegios = data.datos;
        setTimeout(() => $('select').material_select() , 100);
    });
  }

  $scope.obtenerAlumnos = function(id){
    service.obtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;
    })
  }
}]);

app.controller('AdminCtr', ['$scope', '$rootScope', '$routeParams', '$location', 'service', function ($scope, $rootScope, $routeParams, $location, service) {
    $scope.isAdding = false;

    $rootScope.idAdmin = USER_ID_LOG;

    $scope.obtenerAdministrador = function (id){
      service.AdminObtenerAdministrador(id).success(function (data){
        $scope.administrador = data.datos;
      })
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
    $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
        $scope.cursadas = data.datos;
       $scope.obtenerAlumno(idAlumno);
      })
    }

    $scope.obtenerAlumno = function(id){
    service.AlumnoObtenerAlumno(id).success(function (data){
      $scope.alumno = data.datos;
      console.log($scope.alumno);
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
      angular.forEach($scope.selectedList, function (selected,idAlumnoListado ) {
        if (selected)
        {
          cursada.idAlumno=idAlumnoListado;
          service.agregarCursada(cursada).success(function(data){
            if(!data.exito)
            {
              Materialize.toast("No se pudo cargar la cursada", 3500);
            }
            else
            {
              Materialize.toast("Cursada cargada con éxito", 3500);
            }
          });
        }
      });
    }

}]);

app.controller('ExamenesCtr', ['$rootScope','$scope', '$routeParams', '$location', 'service', function ($rootScope,$scope, $routeParams, $location, service) {
   $rootScope.idCursada =$routeParams.idCursada !=undefined ?  $routeParams.idCursada : $rootScope.idCursada;
   console.log($rootScope.idCursada);

    // Atributos y funciones para ordenamiento
    $scope.sortType = 'anio';
    $scope.sortReverse = false;

    $scope.revertirOrden = function(){
    $scope.sortReverse = $scope.sortReverse == true ? false : true;
    }
    //
  
   service.getExamenes($routeParams.idCursada).success(function (data){
    $scope.examenes = data['datos'].examen;
    $scope.idAlumno = data.datos.idUsuario;
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

      $location.path('/examenes-listar/'+$routeParams.id);
      }
}]);

app.controller('ComisionesCtr', ['$scope', '$routeParams', '$location', 'service', function ($scope, $routeParams, $location, service) {
  
  $scope.isAdding = false;

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'anio';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
        'materia': data.datos.idMateria+'-'+data.datos.nombreMateria,
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
        service.agregarComision(comision).success(function(data){
          if(!data.exito){
            Materialize.toast("No se pudo cargar la comisión", 3500);
          }
          else{
            Materialize.toast("Comisión cargada con éxito", 3500);
          }
        }).error( () => Materialize.toast('Erro al guardar', 3500) );
      }
    }

    $location.path('/comisiones-listar');
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
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
        'descripcion': data.datos.descripcion
      }
      $scope.informe = informe;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

    $scope.eliminarInforme = function(idActividad){
    service.eliminarInforme(idActividad).success(function(data){
      if (!data.datos){
          Materialize.toast("No se pudo eliminar el informe", 3500);
        }
        else{
          Materialize.toast("Informe eliminada  con éxito", 3500);
         $scope.obtenerInformes();
        }        
    }).error( () => Materialize.toast('Error al eliminar', 3500) );
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
      $scope.informes = data.datos;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

}]);

app.controller('ActividadCtr', ['$scope', '$rootScope','$routeParams','$location', 'service', function ($scope, $rootScope, $routeParams,$location, service) {
  $scope.isAdding = false;

  $rootScope.idAlumno=  $rootScope.idAlumno !=undefined ?   $rootScope.idAlumno :  $routeParams.id;
  
    // Atributos y funciones para ordenamiento
    $scope.sortType = 'descripcion';
    $scope.sortReverse = false;
  
    $scope.revertirOrden = function(){
      $scope.sortReverse = $scope.sortReverse == true ? false : true;
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

  // Atributos y funciones para ordenamiento
  $scope.sortType = 'nombre';
  $scope.sortReverse = false;

  $scope.revertirOrden = function(){
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
     $scope.isAdding = true;
    service.obtenerMaterias($routeParams.id).success(function(data){
        $scope.materia = data.datos;
    });
  }


  $scope.obtenerMaterias = function(){
    service.obtenerMaterias(null).success(function(data){
/*         var materias = [];

        angular.forEach(data.datos, function(value, key) {
          this.push(value);
        }, materias);
        console.log(materias);
        $scope.materias = materias; */
        $scope.materias = data.datos;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
  }

}]);


app.controller('ArchivoCtr', ['$rootScope','$scope', '$routeParams', '$location', 'service', function ($rootScope,$scope, $routeParams, $location, service) {
  
  $scope.initialize = function()
  {
    if( $location.url().includes('archivo-listar') )
    {
      $scope.archivos = [];
      // Seteamos el ID de la Materia de la cual se mostraran los archivos/links
      $rootScope.idMateria = $routeParams.id;
      $scope.obtenerArchivosMateria();
    }
    else
    {
      $scope.archivo = {titulo:'', descripcion:'', link:''};
      $scope.fuenteArchivo = false;

      //Agregar o modificar un archivo
      if( $routeParams.id != undefined )
      {
        // Se obtiene el archivo correspondiente por el ID que viene en el URL
        $scope.obtenerDatosArchivo( $routeParams.id );
        $scope.isAdding = false;
      }
      else
      {
        $scope.isAdding = true;
      }
    }
  };

  $scope.obtenerDatosArchivo = function()
  {
    $scope.isAdding = true;
    service.obtenerArchivo($routeParams.id).success( function(data){
        $scope.archivo = data.datos;
        if ($scope.archivo.idCategoriaArchivo==1)
          $scope.archivo.link=$scope.archivo.ruta;
    });
  };

  $scope.agregarArchivo = function(archivo)
  {
    // Seteamos la materia a la que pertenece
    archivo.idMateria=$rootScope.idMateria;
    //Si es link
    if (archivo.link!= undefined)
    {
      archivo.ruta=archivo.link;
      archivo.tipo=1;
    }
    //si es un documento.
    else
    {
      //wachin
      archivo.tipo=2;
    }

    if ($scope.isAdding)
    {
      service.actualizarArchivo(archivo).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo modificar el archivo", 3500);
        }
        else{
          Materialize.toast("Archivo modificado con éxito", 3500);
        }
      });
    }
    else
    {      
      
      service.agregarArchivo(archivo).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar el archivo", 3500);
        }
        else{
          Materialize.toast("Archivo cargado con éxito", 3500);
        }
      });
    }
    $location.path('/archivo-listar/'+archivo.idMateria);
  };

  $scope.archivoParaSubir_O_LinkNoVacio = function(){
    return (
      ($scope.fuenteArchivo == false && $scope.archivo.link != "" )//Link
      ||
      ($scope.fuenteArchivo == true && $scope.archivoAsubir != undefined )//Archivo
    )
  };

  $scope.obtenerArchivosMateria = function()
  {
    service.obtenerArchivosMateria( $rootScope.idMateria)
      .success( function(data){
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
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
          Materialize.toast("No se pudo modificar el país", 3500);
        }
        else{
          Materialize.toast("País modificado con éxito", 3500);
        }
      });
    }
    else{
      service.agregarPais(pais).success(function(data){
        if (!data.exito){
          Materialize.toast("No se pudo agregar el país", 3500);
        }
        else{
          Materialize.toast("País cargado con éxito", 3500);
        }
      });
    }
    $scope.obtenerPaises();
    $location.path('/paises-listar');
  }

  $scope.obtenerPaises = function(){
    service.obtenerPaises(null).success(function(data){
/*         var materias = [];

        angular.forEach(data.datos, function(value, key) {
          this.push(value);
        }, materias);
        console.log(materias);
        $scope.materias = materias; */
        $scope.paises = data.datos;
    }).error( () => Materialize.toast('Erro al obtener', 3500) );
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
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
  }
  //

  if ($routeParams.id){
    $scope.isAdding = true;
    var idEscuela = $routeParams.id;
    
    service.obtenerEscuelas(idEscuela).success(function(data){
      const escuela = {
        'nombre': data.datos.nombre,
        'orientacion': data.datos.orientacion,
        'ciudad': data.datos.idCiudad
      }
      $scope.escuela = escuela;
    });
  }

  $scope.obtenerDatosAgregarEscuela = function() {
    service.obtenerCiudades().success(function(data){
      $scope.ciudades = data.datos;
      setTimeout(() => $('select').material_select() , 100);
      }).error( () => Materialize.toast('Erro al obtener', 3500) );
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
/*         var materias = [];

        angular.forEach(data.datos, function(value, key) {
          this.push(value);
        }, materias);
        console.log(materias);
        $scope.materias = materias; */
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
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
      $scope.alumno = data.datos;
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
  $scope.sortReverse = $scope.sortReverse == true ? false : true;
  }
  //

  if($routeParams.idCurs){
    service.TutorObtenerExamenes($routeParams.idCurs).success(function (data){
      $scope.examenes = data.datos.examen;
    })
  }

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
        'descripcion': data.datos.descripcion
      }
      $scope.informe = informe;
    })
  }

  $scope.obtenerAlumnos = function(){
    service.TutorObtenerAlumnos().success(function (data){
      $scope.alumnos = data.datos;
    })
  }

    

  $scope.obtenerCursadas = function(id){
    service.TutorObtenerCursadas(id).success(function (data){
      $scope.cursadas = data.datos;
    })
  }

  $scope.obtenerInformes = function(id){
    service.TutorObtenerInformes(id).success(function (data){
      $scope.informes = data.datos;
    })
  }

  $scope.agregarInforme = function(informe){
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
  }

  $scope.obtenerTemas = function(id) {
    service.foroObtenerTemasCategoria(id).success(function(data){
      $scope.temas = data.datos;
      $scope.obtenerCategoria(id);
    });
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
    service.foroObtenerMensajes(id).success(function(data){
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
      service.foroObtenerTema(id).success(function(data){
        $scope.tema = data.datos;
      });
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
        $scope.isAbierto = false;
      }
    });
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
    $location.path('foro-alumno-mensajes/'+$rootScope.idTema);
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
/*       if (nuevo[0].tema.estado == "cerrado"){
        $scope.isAbierto = false;
      } */
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
    $scope.sortReverse = $scope.sortReverse == true ? false : true;
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
        $scope.informes = data.datos;
      })
  }

}]);

app.controller('EstadoMesasController', ["$scope", "$http", "service", "$location", "$route", "$interval", function ($scope, $http, service, $location, $route, $interval) {
  // https://github.com/Paco-Cervantes/Materialize-Messages
  // https://www.jqueryscript.net/other/Tiny-jQuery-Modal-Extension-For-Materialize-Framework-materializeMessages-js.html
 
  // Llamadas al CutosmService Inicio
    $scope.loadMesasData = ( firstTimeLoad = true ) => {
      service.getMesasPorEstado()
      .success(function(data){
        switch(data.code) {
            case 200:
                if( firstTimeLoad )
                  $scope.mesas = data.mesas;
                else
                {
                  data.mesas.forEach( (m)=>{
                    let mesaIndexInScope = $scope.mesas.findIndex( (ms)=>ms.id==m.id );
                    if(mesaIndexInScope != -1)
                    {
                      //Si la mesa Paso de DISPONIBLE -> OCUPADA, o bien, de OCUPADA -> DISPONIBLE
                      if(
                        ( $scope.mesaLibre($scope.mesas[ mesaIndexInScope ]) && ! $scope.mesaLibre(m) )
                        ||
                        ( ! $scope.mesaLibre($scope.mesas[ mesaIndexInScope ]) && $scope.mesaLibre(m) )
                      )
                      { 
                        $scope.mesas[ mesaIndexInScope ] = m;
                      }
                      //Si la mesa esta y sigue ocupada, OCUPADA -> OCUPADA
                      else
                      {
                        $scope.mesas[ mesaIndexInScope ].ticket = m.ticket;
                        $scope.mesas[ mesaIndexInScope ].notificaciones = m.notificaciones;
                      }
                    }
                    else
                    {
                      $scope.mesas.push(m);
                    }
                  });
                }
                break;
            case 0:
                $scope.mesas = [];
                break;
            default:
                $scope.mesas = [];
        }
        console.log($scope.mesas);
      })
      .error( () => Materialize.toast("Ah ocurrido un problema al traer las mesas, reintentelo mas tarde") );
    }

    $scope.loadElementosMenu = () => {
      //Obtenemos las categorias con sus elementos para mostrar en el detalle PERO
      //Depuramos y dejamos solo un Array con todos los productos sin distingir por Categoria
      service.getElementoMenu().success(
        (d) => { 
          $scope.elementosDelMenu = d.categorias
            .map(e => e.comidas)
            .reduce((ac, val)=> ac.concat(val), []);
          console.log( $scope.elementosDelMenu );
        } 
      );
    }
  // Llamadas al CutosmService Inicio

  $scope.mesaLibre = function( mesa){
    return (mesa.idSesion == '' || mesa.ticket == false);
  };

  $scope.classTableFreeOrTaken = function( mesa){
    return ( $scope.mesaLibre(mesa) ? 'table__time-taken_free': '');
  };

  // Manejo de notificaciones Inicio
    $scope.getNotificacionesPorTipo = function( notificaciones, tipoNotificacion, estaAtendida = false){
      if( notificaciones == false || notificaciones.length == 0)
      {
        return [];
      }
      else
      {
        return notificaciones.filter(noti => (noti.atendido == estaAtendida && noti.tipoNotificacion==tipoNotificacion) );
      }
    };

    $scope.getNotificacionesMozo = function( mesa){
      return $scope.getNotificacionesPorTipo( mesa.notificaciones, 1);
    };

    $scope.getNotificacionesPorPago = function( mesa, tarjetaOefectivo = null){
      //tarjetaOefectivo = 'tarjeta'
      //tarjetaOefectivo = 'efectivo'
      //tarjetaOefectivo = null  -> ambas
      let notificacionesPago = $scope.getNotificacionesPorTipo( mesa.notificaciones, 2);
      return notificacionesPago.filter( 
        noti => (
          noti.data != null &&
          (
            tarjetaOefectivo == null ||
            noti.data.formaDePago == tarjetaOefectivo
          )
        )
      );
    };

    $scope.countNotificacionesMozo = function( mesa){
      return (
        (mesa.idSesion == '' || mesa.ticket == false) ?
        0:
        $scope.getNotificacionesMozo(mesa).length
      );
    };

    $scope.hasWaiterNotifications = function( mesa){
      return (
        $scope.countNotificacionesMozo( mesa) == 0 ?
        '':
        'active active-waiter'
      );
    };

    $scope.countNotificacionesPagoTarjeta = function( mesa){
      return (
        $scope.mesaLibre(mesa) ?
        0:
        $scope.getNotificacionesPorPago( mesa, 'tarjeta').length
      );
    };

    $scope.hasPayByCardNotifications = function( mesa){
      return (
        $scope.countNotificacionesPagoTarjeta( mesa) == 0 ?
        '':
        'active active-card'
      );
    };

    $scope.countNotificacionesPagoEfectivo = function( mesa){
      return (
        $scope.mesaLibre(mesa) ?
        0:
        $scope.getNotificacionesPorPago( mesa, 'efectivo').length
      );
    };

    $scope.hasPayByCashNotifications = function( mesa){
      return (
        $scope.countNotificacionesPagoEfectivo( mesa) == 0 ?
        '':
        'active active-cash'
      );
    };
  // Manejo de notificaciones Fin
  
  //Manejo de pedidos Inicio
    $scope.getFechaHoraMesaTomada = function( mesa){
        return (
          $scope.mesaLibre(mesa) ?
          '00:00:00' :
          mesa.ticket.fechaHoraInicio
        );
    };

    $scope.getPedidosPorEstado = function(  ticket, estadoLineas){
      return ticket.lineas.filter(line => line.estado == estadoLineas);
    };

    $scope.countPedidosConEstado = function( ticket, estadoLineas){
      return (
        ( ticket == false ) ?
        0:
        $scope.getPedidosPorEstado(ticket, estadoLineas).length
      );
    };

    $scope.countPedidosSinTomar = function( mesa){ return $scope.countPedidosConEstado(mesa.ticket, 1); };

    $scope.countPedidosEnCocina = function( mesa){ return $scope.countPedidosConEstado(mesa.ticket, 2); };

    $scope.countPedidosEntregados = function( mesa){ return $scope.countPedidosConEstado(mesa.ticket, 3); };
  //Manejo de pedidos Fin

  $scope.getTotalDelTicketDeLaMesa = function( mesa){
    if( $scope.mesaLibre(mesa) )
    {
      return 0;
    }
    else
    {
      let lineasValidas = mesa.ticket.lineas.filter(line => (line.estado == 1 || line.estado == 2 || line.estado == 3) );
      return lineasValidas.reduce((acumulador, line) => (acumulador + line.precioFinalActual), 0);
    }
  };

  $scope.cobrar = function(mesa){
    //Solo se cobra si el ticket de la mesa tiene un TOTAL > 0 y
    //que todas sus Ordenes esten Entregadas
    let pedidosSinTomar = $scope.countPedidosSinTomar(mesa),
        pedidosEnCocina = $scope.countPedidosEnCocina(mesa);
    if( mesa.ticket.total == 0 || pedidosSinTomar>0 || pedidosEnCocina>0 )
    {
      return false;
    }

    service.closeMesaAndTicket( mesa.id, mesa.ticket.id)
    .success(function(data){
      if(data.code==200){
        Materialize.toast('Mesa '+mesa.numero+' cerrada exitosamente !', 3500);
        $route.reload();
      }
      else
        Materialize.toast('Ocurrio un error, reintentelo luego.', 3500);
    })
    .error( () => Materialize.toast('Error de conección a <b>internet</b>.', 3500) );
  };

  $scope.openModalPedidos = function(mesa){
    //Solo se abre el Modal, si la mesa tiene un ticker asignado y tiene al menos 1 orden realizada
    if( mesa.ticket && mesa.ticket.lineas.length>0 )
    {
      $scope.detalleMesa = mesa;
      $('#modal-detalles').modal('open');
    }
  };

  $scope.textoEstadoPedido = function( numeroEstado) {
    let texto;
    switch(numeroEstado) {
      case 0:
          texto = 'Cancelado';
          break;
      case 1:
          texto = 'Pedido';
          break;
      case 2:
          texto = 'En Cocina';
          break;
      case 3:
          texto = 'Enviado';
          break;
      default:
          texto = '( ¿? )';
    }
    return texto;
  }

  $scope.comidaNombre = function( idComida){
    return $scope.elementosDelMenu.find( (e) => e.id==idComida ).nombre;
  };

  //Initialize MODAL component
  $('.modal').modal();

  //Intervalo para actualizar datos de las mesas Inicio
    let refreshInterval;
    $scope.startRefreshTableData = function() {
      //La primera vez se carga manual, el resto lo refresca el TimerInterval
      $scope.loadMesasData();
      // Tambien por ser la primera (y unica tambien) que se carga los elemetos del Menu
      $scope.loadElementosMenu();

      // Don't start twice the refresh process
      if ( angular.isDefined(refreshInterval) ) return;

      refreshInterval = $interval( ()=>$scope.loadMesasData(false), 5000);
    };

    $scope.stopRefreshTableData = function() {
      if (angular.isDefined(refreshInterval)) {
        $interval.cancel(refreshInterval);
        refreshInterval = undefined;
      }
    };

    $scope.$on('$destroy', function() {
      // Make sure that the interval is destroyed too
      $scope.stopRefreshTableData();
    });

    //Inicio del evento de refresh de informacion
    $scope.startRefreshTableData();
  //Intervalo para actualizar datos de las mesas Fin

}]);

app.controller('CategoriasAderezosCtr', ["$scope", "$http", "service", "$location", "$route", "$interval", function ($scope, $http, service, $location, $route, $interval) {
  service.getConceptos()
    .success( data => {
      if(data.code==200)
        $scope.categorias = data.tipos;
      else
        Materialize.toast('Categorias de aderezos no encontradas.', 3500);
    })
    .error(() => Materialize.toast('Error al obtener las categorias de aderezos.', 3500));



}]);

app.controller('DefaultCtr', ['$scope','$location', '$routeParams', function ($scope, $location, $routeParams) {
  $scope.openModal = selector => {
    $(selector).modal('open');
  }
}]);

app.controller('MesasCtr', ['$scope', '$location', '$routeParams', 'service', function ($scope, $location, $routeParams, service) {

  // Indica si se está agregando o modificando. Útil para reutilizar la vista de agregar/modificar mesa.
  $scope.isAdding = $location.path().split('/')[2] === 'agregar';
  
  // Obtiene todas las mesas.
  service.getMesasPorEstado()
    .success(data => $scope.mesas = data.mesas)
    .error(() => Materialize.toast('Error al obtener las mesas.', 3500));
        
  // Si hay un parámetro "id" en la ruta, se está modificando, así que busca la mesa correspondinte.
  // Si no, define una mesa sin número pero habilitada (valor por defecto) para agregar una nueva.
  if ($routeParams.id)
    service.getMesa($routeParams.id)
      .success(data => {
        $scope.mesa = data.mesa;
        $scope.mesa.numero = parseInt($scope.mesa.numero);
        $scope.mesa.habilitada = $scope.mesa.habilitada === '1';
      })
      .error(() => Materialize.toast(`Error al obtener la mesa con ID ${$routeParams.id}.`, 3500));
  else
    $scope.mesa = { habilitada: true };

  // Cambia el estado de una mesa (habilitada/deshabilitada).
  $scope.toggleEstadoMesa = mesa => {
    mesa.habilitada = !mesa.habilitada;

    service.updateMesa(mesa)
      .success(() => Materialize.toast(`Mesa ${mesa.numero} ${mesa.habilitada ? '' : 'des'}habilitada`, 3500))
      .error(() => {
        mesa.habilitada = !mesa.habilitada;
        Materialize.toast(`Error al habilitar o deshabilitar la mesa ${mesa.numero}.`, 3500)
      });
  }

  // Agrega una nueva mesa.
  $scope.addMesa = mesa => {
    service.addMesa(mesa)
      .success(() => Materialize.toast(`Mesa ${mesa.numero} agregada correctamente.`, 3500))
      .error(() => Materialize.toast(`Error. No se pudo agregar la mesa ${mesa.numero}.`, 3500));

    $location.path('/mesas');
  }

  // Actualiza una mesa existente.
  $scope.updateMesa = mesa => {
    service.updateMesa(mesa)
      .success(() => Materialize.toast(`Mesa ${mesa.numero} modificada correctamente.`, 3500))
      .error(() => Materialize.toast(`Error. No se pudo modificar la mesa ${mesa.numero}.`, 3500));

    $location.path('/mesas');
  } 

  // Si el usuario está en la lista de mesas, inicializa los objetos.
  // De esta manera evita errores resultantes de utilizar elementos del DOM que no existen en otras vistas.
  if ($location.path() === '/mesas') {
    // Inicializa las modals.
    $('.modal').modal({
      complete: () => $scope.QRCode.clear() // Al cerrarse, limpia el código QR.
    });

    // Inicializa el número de mesa a mostrar en la modal y el código QR.
    $scope.numeroMesa = 0;
    $scope.QRCode = new QRCode(document.getElementById("qrcode"), $scope.numeroMesa);
  }

  // Abre una modal con el código QR de la mesa correspondiente.
  $scope.openQRCode = mesa => {
    $scope.numeroMesa = mesa.numero;
    $scope.QRCode.makeCode(mesa.dataQR);
    $('#modalQRCode').modal('open');
  }

  // Cierra la modal con el código QR.
  $scope.closeQRCode = () => $('#modalQRCode').modal('close');

  // Abre el diálogo de impresión del navegador para imprimir el código QR de la mesa.
  // TO DO: Imprimir de otra manera, sin utilizar estilos que afecten a toda la página.
  //        Ver media query en main.css.
  $scope.printQRCode = () => {
    console.log('Imprimiendo...');
    print();
  }
}]);
