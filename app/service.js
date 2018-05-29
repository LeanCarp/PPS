app.factory('service', ['$http','$rootScope','$location', function($http,$rootScope,$location) { 
    //Guardo en el $rootScope el id de la casa de comida
    //$rootScope.casaDeComidas = angular.copy(CASADECOMIDAID);
  
    //Elimino la etiqueta script visible facilmente al usuario
    $('#relevantData').remove();
  
    return {

    agregarProfesor: (profesor) => {
      const prof = {
        'nombre': profesor.nombre,
        'apellido': profesor.apellido
      }

      let urlProfesorAgregar = 'administrador/Profesor/AgregarProfesor';
      return  $http.post(urlProfesorAgregar, prof, { responseType: 'json' });
    },

    obtenerProfesores: (idProfesor) => {
      let urlProfesorObtener = 'administrador/Profesor/Leer';
      const id = {
        'id':idProfesor
      }
      return  $http.post(urlProfesorObtener, id, { responseType: 'json' });
    },

    actualizarProfesor: (profesor) => {
      let urlProfesorActualizar = 'administrador/Profesor/ActualizarProfesor';
      const profe = {
        'id': profesor.id,
        'nombre': profesor.nombre,
        'apellido': profesor.apellido
      }
      return $http.post(urlProfesorActualizar, profe, { responseType: 'json' });
    },

    agregarMateria: (materia) => {
      let urlMateriaAgregar = 'administrador/Materia/AgregarMateria';
      return $http.post(urlMateriaAgregar, materia, { responseType: 'json' });
    },

    obtenerMaterias: (idMateria) => {
      let urlMateriaObtener = 'administrador/Materia/Leer';
      const id = {
        'id':idMateria
      }
      return $http.post(urlMateriaObtener, id, { responseType: 'json' });
    },

    actualizarMateria: (materia) => {
      let urlMateriaActualizar = 'administrador/Materia/ActualizarMateria';
      const mater = {
        'id': materia.id,
        'nombre': materia.nombre
      }
      return $http.post(urlMateriaActualizar, mater, { responseType: 'json' });
    },

    agregarArchivo: (archivo) => {
      let urlArchivoAgregar = 'administrador/Archivo/AgregarArchivo';
     const archi = {
        'titulo': archivo.titulo,
        'descripcion': archivo.descripcion,
        'ruta': archivo.ruta,
        'idMateria': archivo.idMateria,
        'tipo':archivo.tipo
      }
      console.log(archi);
      return $http.post(urlArchivoAgregar, archi, { responseType: 'json' });
    },

    obtenerArchivo: (idArchivo) => {
      let urlArchivoObtener = 'administrador/Archivo/Leer';
      const id = {
        'id':idArchivo
      }
      return $http.post(urlArchivoObtener, id, { responseType: 'json' });
    },
     obtenerArchivosMateria: (idMateria) => {
      let urlArchivoObtener = 'administrador/Archivo/ObtenerArchivosMateria';
      const id = {
        'id':idMateria
      }
      return $http.post(urlArchivoObtener, id, { responseType: 'json' });
    },

    actualizarArchivo: (archivo) => {
      let urlArchivoctualizar = 'administrador/Archivo/ActualizarArchivo';
      const archi = {
        'id': archivo.id,
        'titulo': archivo.titulo,
        'descripcion': archivo.descripcion,
        'fuente': archivo.fuente,
        'idMateria': archivo.idMateria,
        'tipo':archivo.tipo
      }
      return $http.post(urlArchivoctualizar, archi, { responseType: 'json' });
    },

    agregarComision: (comision) => {
      var materia = comision.materia.split('-');
      var profesores = [];
      angular.forEach(comision.profesores, function(value, key) {
        var profe = value.split('-');
        this.push([profe[0], profe[1]]);
      }, profesores);
      const comis = {
        'anio': comision.anio,
        'cuatrimestre': comision.cuatrimestre,
        'idMateria': materia[0],
        'nombreMateria': materia[1],
        'horarios': comision.horarios,
        'profesores': profesores
      }
      let urlComisionAgregar='administrador/Comision/Agregar';
      return  $http.post(urlComisionAgregar, comis, { responseType: 'json' });
    },

    obtenerComisiones: (idComision) => {
      let urlComisionObtener = 'administrador/Comision/Leer';
      const id = {
        'id': idComision
      }
      return  $http.post(urlComisionObtener, id, { responseType: 'json' });
    },

    agregarCursada: (cursada) => {
      let urlComisionAgregar = 'administrador/Cursada/AgregarCursada';
      const cursa = {
        'comision': cursada.comision,
        'estado': cursada.estado,
        'idAlumno': cursada.idAlumno
      }
      return  $http.post(urlComisionAgregar, cursa, { responseType: 'json' });
    },

    // Obtiene cursadas para un Usuario.
    getCursadas: (idAlumno) => {
      let urlComisionObtener = 'administrador/Cursada/ObtenerCursadasUsuario';
      const idUsuario = {
        'idUsuario': idAlumno
      }
      return $http.post(urlComisionObtener, idUsuario, { responseType: 'json' });
    },

    // Obtiene una cursada puntual.
    getCursada: (idCursada) => {
      let urlComisionObtener = 'administrador/Cursada/ObtenerCursada';
      const idCurs = {
        'idCursada': idCursada
      }
      return $http.post(urlComisionObtener, idCurs, { responseType: 'json' });
    },

    actualizarCursada: (cursada) => {
      let urlCursadaActualizar='administrador/Cursada/ActualizarCursada';
      console.log("Cursada: ");
      console.log(cursada);
      return $http.post(urlCursadaActualizar, cursada, { responseType: 'json' });
    },

    getExamenes: (idCursada) => {
      const id=
      {
        'idCursada':idCursada,
      }
        let urlExamenesObtener = 'administrador/Examen/ObtenerExamenesCursada';
        return $http.post(urlExamenesObtener, id,{ responseType: 'json' });
      },

    agregarExamen: (examen) => {
    const exam = {
      'fecha': examen.fecha,
      'nota': examen.nota,
      'tipo': examen.tipo,
      'idCursada': examen.idCursada,
      'comentario': examen.comentario,
      'descripcion': examen.descripcion
    }
    let urlExamenAgregar='administrador/Examen/AgregarExamen';
    return  $http.post(urlExamenAgregar, exam, { responseType: 'json' });
    },

    agregarInforme: (informe) => {
      let urlInformeAgregar='administrador/Informe/AgregarInforme';
      const infor = {
        'titulo': informe.titulo,
        'fecha': informe.fecha,
        'descripcion': informe.descripcion,
        'idAlumno': informe.idAlumno
      }
      return $http.post(urlInformeAgregar, infor, { responseType: 'json' });
    },

    // Obtiene un informe por su ID.
    obtenerInforme: (idInforme) => {
      let urlInformeObtener='administrador/Informe/Leer';
      const id = {
        'idInforme': idInforme
      }
      return  $http.post(urlInformeObtener, id, { responseType: 'json' });
    },

    // Obtiene los informes de un usuario
    obtenerInformes: (idUsuario) => {
      let urlInformeObtener='administrador/Informe/ObtenerInformesUsuario';
      const id = {
        'idUsuario': idUsuario
      }
      return  $http.post(urlInformeObtener, id, { responseType: 'json' });
    },
        // Obtiene los informes realizados por un tutor
    obtenerInformesTutor: (idUsuario) => {
      let urlInformeObtener='administrador/Tutores/ObtenerInformes';
      const id = {
        'idUsuario': idUsuario
      }
      return  $http.post(urlInformeObtener, id, { responseType: 'json' });
    },

    actualizarInforme: (informe) => {
      let urlInformeActualizar='administrador/Informe/ActualizarInforme';
      const infor = {
        'titulo': informe.titulo,
        'fecha': informe.fecha,
        'descripcion': informe.descripcion,
        'idAlumno': informe.idAlumno,
        'idInforme': informe.id
      }
      return $http.post(urlInformeActualizar, infor, { responseType: 'json' });
    },
    agregarPais: (pais) => {
      let urlPaisAgregar = 'administrador/Pais/Agregar';
      return $http.post(urlPaisAgregar, pais, { responseType: 'json' });
    },

       agregarActividad: (actividad) => {
      let urActividadAgregar='administrador/Actividad/AgregarActividad';
      const acti = {
        'horarios':actividad.horarios,
        'descripcion': actividad.descripcion,
        'idAlumno': actividad.idAlumno
      }
      return $http.post(urActividadAgregar, acti, { responseType: 'json' });
    },

    obtenerActividades: (idAlumno) => {
      let urActividadAgregar='administrador/Actividad/ObtenerActividadesUsuario';
      const id = {
        'idUsuario': idAlumno
      }
      return  $http.post(urActividadAgregar, id, { responseType: 'json' });
    },

    obtenerPaises: (idPais) => {
      let urlPaisObtener = 'administrador/Pais/Leer';
      const id = {
        'id': idPais
      }
      return $http.post(urlPaisObtener, id, { responseType: 'json' });
    },

    actualizarPais: (datos) => {
      let urlPaisActualizar = 'administrador/Pais/ActualizarPais';
      const pais = {
        'id': datos.id,
        'nombre': datos.nombre
      }
      return $http.post(urlPaisActualizar, pais, { responseType: 'json' });
    },
    agregarCiudad: (ciudad) => {
      let urlCiudadAgregar = 'administrador/Ciudad/Agregar';
      const ciud = {
        'idPais': ciudad.pais,
        'nombre': ciudad.nombre
      }
      return $http.post(urlCiudadAgregar, ciud, { responseType: 'json' });
    },

    obtenerCiudades: (idCiudad) => {
      let urlCiudadObtener = 'administrador/Ciudad/Leer';
      const id = {
        'id': idCiudad
      }
      return $http.post(urlCiudadObtener, id, { responseType: 'json' });
    },

    actualizarCiudad: (datos) => {
      let urlCiudadActualizar = 'administrador/Ciudad/ActualizarCiudad';
      const ciudad = {
        'id': datos.id,
        'nombre': datos.nombre,
        'idPais': datos.idPais
      }
      return $http.post(urlCiudadActualizar, ciudad, { responseType: 'json' });
    },
    agregarEscuela: (escuela) => {
      let urlEscuelaAgregar = 'administrador/Escuela/Agregar';
      const colegio = {
        'nombre': escuela.nombre,
        'orientacion': escuela.orientacion,
        'idCiudad': escuela.ciudad
      }
      return $http.post(urlEscuelaAgregar, colegio, { responseType: 'json' });
    },

    obtenerEscuelas: (idEscuela) => {
      let urlEscuelaObtener = 'administrador/Escuela/Leer';
      const id = {
        'id': idEscuela
      }
      return $http.post(urlEscuelaObtener, id, { responseType: 'json' });
    },

    actualizarEscuela: (datos) => {
      let urlEscuelactualizar = 'administrador/Escuela/ActualizarEscuela';
      const escuela = {
        'id': datos.id,
        'nombre': datos.nombre,
        'orientacion': datos.orientacion,
        'idCiudad': datos.ciudad
      }
      return $http.post(urlEscuelactualizar, escuela, { responseType: 'json' });
    },
    agregarTutor: (tutor) => {
      const tut = {
        'dni': tutor.dni,
        'first_name': tutor.nombre,
        'last_name': tutor.apellido,
        'email': tutor.email,
        'phone': tutor.telefono,
      }
      let urlTutorAgregar = 'administrador/Tutores/AgregarTutor';
      return $http.post(urlTutorAgregar, tut, { responseType: 'json' });
    },

    obtenerTutor: (idTutor) => {
      let urlTutorObtener = 'administrador/Tutores/Leer';
      const tutor = {
        'idTutor': idTutor
      }
      return $http.post(urlTutorObtener, tutor, { responseType: 'json' });
    },

    obtenerTutores: () => {
      let urlTutoresObtener = 'administrador/Tutores/ObtenerTutores';
      return $http.post(urlTutoresObtener, { responseType: 'json' });
    },

    actualizarTutor: (datos) => {
      let urlEscuelactualizar = 'administrador/Tutores/ActualizarTutor';
      const tutor = {
        'id': datos.id,
        'first_name': datos.nombre,
        'last_name': datos.apellido,
        'email': datos.email,
        'phone': datos.telefono,
      }
      return $http.post(urlEscuelactualizar, tutor, { responseType: 'json' });
    },








    getMaterias: () => {
        var materia1 = {'id': 1, 'nombre': 'Simulación'};

        var materias = {'materias': [materia1]};
      
        return {success: (otrafun) => { return otrafun(materias); }};
    },
  
    getAlumnos: () => {
        let urlAlumnosObtener='administrador/Alumnos/ObtenerAlumnos';
        return  $http.get(urlAlumnosObtener, { responseType: 'json' }); 
    },

    obtenerAlumno: (id) => {
      let urlAlumnosObtener='administrador/Alumnos/Leer';
      const alumno = {
        'idAlumno': id
      }
      return  $http.post(urlAlumnosObtener, alumno, { responseType: 'json' });
    },

    agregarAlumno: (alumno) => {
        const alumn = {
            'dni': alumno.dni,
            'first_name': alumno.nombre,
            'last_name': alumno.apellido,
            'email': alumno.email,
            'phone': alumno.telefono,
            'anioIngreso': alumno.anioIngreso,
            'carrera': alumno.carrera,
            'escuela': alumno.escuela
        }
      let urlAlumnoAgregar = 'administrador/Alumnos/AgregarAlumno';
      return $http.post(urlAlumnoAgregar, alumn, { responseType: 'json' });

    },

    actualizarAlumno: (alumno) => {
      const alumn = {
          'id': alumno.id,
          'dni': alumno.dni,
          'first_name': alumno.nombre,
          'last_name': alumno.apellido,
          'email': alumno.email,
          'phone': alumno.telefono,
          'anioIngreso': alumno.anioIngreso,
          'carrera': alumno.carrera,
          'escuela': alumno.escuela
      }
      console.log(alumn);
    let urlAlumnoActualizar = 'administrador/Alumnos/Actualizar';
    return $http.post(urlAlumnoActualizar, alumn, { responseType: 'json' });

  },

    getInformesAlumno: (dni) => {
        var informes = {};
        return informes;
        // obtener informes por DNI.
        // post>>
    },

    getInformeId: (id) => {
        // obtener informe por id
        // post>>
    },



    // MÉTODOS PARA EL USUARIO TIPO ALUMNO
    AlumnoObtenerCursadas: (idAlumno) => {
      let urlComisionObtener = 'alumno/Cursada/ObtenerCursadasUsuario';
      const idUsuario = {
        'idUsuario': idAlumno
      }
      return $http.post(urlComisionObtener, idUsuario, { responseType: 'json' });
    },

    AlumnoObtenerExamenes: (idCursada) => {
        const id = {
          'idCursada':idCursada,
        }
        let urlExamenesObtener = 'alumno/Examen/ObtenerExamenesCursada';
        return $http.post(urlExamenesObtener, id,{ responseType: 'json' });
      },
















      /*
        Tickets = Obtiene los tickets con sus respectivas lineas y sus conceptos aplicados
        code    = 200 | 0 
      */
      getTickets: function(ids=null,finalizado=null){
        let urlGetTickets='Tickets/getTickets';
        urlGetTickets+=(ids===null)?'':(finalizado===null)?'/'+ids:'/'+ids+'/'+finalizado;
        return  $http.get(urlGetTickets, { responseType: 'json' }); 
      },
  
      /*
        Establece como pago el ticketID y cierra la sesion de mesaID
        code    = 200 | 0 | 500
      */
      payTicket: function(ticketID, mesaID){
        let urlPagarTicketCerrarMesa='Tickets/pagar/'+ticketID+'/'+mesaID;
        return  $http.get(urlPagarTicketCerrarMesa, { responseType: 'json' }); 
      },
  
      /*
        Habilitar las mesasIDs
        code = 200 | 0 | 500
      */
      enableMesas: function(mesasIDs){
        let urlMesasIDs='Mesas/setHabilitad/'+mesasIDs+'/1';
        return  $http.get(urlMesasIDs, { responseType: 'json' }); 
      },
  
      /*
        Deshabilitar las mesasIDs
        code = 200 | 0 | 500
      */
      disableMesas: function(mesasIDs,estado=1){
        let urlMesasIDs='Mesas/setHabilitad/'+mesasIDs+'/0';
        return  $http.get(urlMesasIDs, { responseType: 'json' }); 
      },
  
      /*
        Obtiene las mesas con estado "state" o todas en caso de no recibir parametros
        code = 200 | 0
      */
      getMesasPorEstado: function(state=null){
        let urlGetMesasPorEstado = 'Mesas/getMesasPorEstado';
        let casaDeComidas = $rootScope.casaDeComidas;
        urlGetMesasPorEstado += (state === null) ? '' : '/' + state;
        return $http.post(urlGetMesasPorEstado, {'casaDeComidas': casaDeComidas }, { responseType: 'json' }); 
      },
      
      /*
        Habilita o deshabilita una mesa.
      */
      setMesaHabilitada: function (mesaID, habilitar) {
        const path = `Mesas/setHabilitada/${mesaID}/${habilitar}`;
        return $http.post(path, { 'casaDeComidas': $rootScope.casaDeComidas }, { responseType: 'json' }); 
      },
  
      /*
        Obtener una mesa existente por su ID.
      */
      getMesa: id => $http.get(`Mesas/get/${id}`, { responseType: 'json' }),
  
      /*
        Agregar una nueva mesa.
      */
      addMesa: mesa => {
        const payload = {
          'numero': mesa.numero,
          'habilitada': mesa.habilitada ? 1 : 0,
          'casaDeComidas': $rootScope.casaDeComidas
        }
  
        return $http.post('Mesas/add', payload, { responseType: 'json' }); 
      },
  
      /*
        Actualizar una mesa existente.
      */
      updateMesa: mesa => {
        const payload = {
          'id': mesa.id,
          'numero': mesa.numero,
          'habilitada': mesa.habilitada ? 1 : 0
        }
  
        return $http.put('Mesas/update', payload, { responseType: 'json' }); 
      },
  
      /*
        Cierra la sesion de las mesasIDs
        code = 200 | 500
      */
      closeMesas: function(mesasIDs){
        let urlCerrarMesas='Mesas/closeMesas/'+mesasIDs;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlCerrarMesas,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      /*
        Ciera la mesa y el ticket, dandolo por finalizado.
        code = 200 | 0 | 500
      */
      closeMesaAndTicket: function(mesaID, ticketID){
        let urlTicketCerrar='Tickets/payTicket/'+ticketID+'/'+mesaID;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlTicketCerrar,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      /*
        Obtiene el ticket actual (y que este abierto) en dicha mesa
        code = 200 | 0 | 500
      */
      openTicketOfMesa: function(mesaID){
        let urlTicketAbiertoDeLaMesa='Mesas/getTicketSesionActual/'+mesaID;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlTicketAbiertoDeLaMesa,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      /*
        Establece como atendidas las notificacionesIDs
        code = 200 | 500
      */
      atendNotificaciones: function(notificacionesIDs){
        let urlAtenderNotificaciones='Notificaciones/atendNotificaciones/'+notificacionesIDs;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlAtenderNotificaciones,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      /*
        Obtiene las notificaiones del tipo "tipo" con el estado "atendida" 
        code = 200 | 0
      */
      getNotificaciones: function(tipo='todas', atendida=null){
        let urlGetNotificaciones='Notificaciones/getNotificaciones/'+tipo;
        urlGetNotificaciones+=(atendida===null)?'':'/'+atendida;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlGetNotificaciones,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      removeElementoMenu: function(ids, valor=1){
        let urlSetComidaEliminada='Comidas/setEliminada/'+ids+'/'+valor;
        return  $http.post(urlSetComidaEliminada,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      enableElementoMenu: function(ids){
        let urlSetComidaDisponible='Comidas/setDisponible/'+ids+'/1';
        return  $http.post(urlSetComidaDisponible, { responseType: 'json' }); 
      },
  
      disableElementoMenu: function(ids){
        let urlSetComidaDisponible='Comidas/setDisponible/'+ids+'/0';
        return  $http.post(urlSetComidaDisponible, { responseType: 'json' }); 
      },
  
      /*
        Obtiene los elementops del menu con sus respectivos conceptos
        code = 200 | 0
      */
      getElementoMenu: function(catID=''){
        let urlGetComidas='Comidas/getElementoMenu/'+catID;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlGetComidas,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      /*
        Obtiene los conceptos del tipo "tipoIDs"
        code = 200 | 0
      */
      getConceptos: function(tipoIDs=''){
        let urlGetConceptos='Conceptos/getConceptos/'+tipoIDs;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlGetConceptos,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
  
      /*
        Obtiene los conceptos del tipo "tipoIDs"
        code = 200 | 0
      */
      getLinesByTicketsID: function(tipoIDs){
        let urlGetConceptos='Tickets/obtenerLineas/'+tipoIDs;
        let casaDeComidas=$rootScope.casaDeComidas;
        return  $http.post(urlGetConceptos,{'casaDeComidas':casaDeComidas,}, { responseType: 'json' }); 
      },
    }
  }]);