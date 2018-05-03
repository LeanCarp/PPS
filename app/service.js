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

    obtenerProfesores: () => {
      let urlProfesorObtener = 'administrador/Profesor/Leer';
      return  $http.post(urlProfesorObtener, { responseType: 'json' });
    },

    agregarMateria: (materia) => {
      let urlMateriaAgregar = 'administrador/Materia/AgregarMateria';
      return $http.post(urlMateriaAgregar, materia, { responseType: 'json' });
    },

    obtenerMaterias: () => {
      let urlMateriaObtener = 'administrador/Materia/Leer';
      return $http.post(urlMateriaObtener, { responseType: 'json' });
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

    obtenerComisiones: () => {
      let urlComisionObtener = 'administrador/Comision/Leer';
      return  $http.post(urlComisionObtener, { responseType: 'json' });
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

    getExamenes: (idCursada) => {
        let urlExamenesObtener = 'administrador/Examen/ObtenerExamenesCursada';
        return $http.post(urlExamenesObtener, 1,{ responseType: 'json' });
      },

    agregarExamen: (examen) => {
    const exam = {
      'fecha': examen.fecha,
      'tipo': examen.tipo,
      'idCursada': examen.idCursada,
      'comentario': examen.comentario,
      'descripcion': examen.descripcion
    }
    let urlExamenAgregar='administrador/Examen/Agregar';
    return  $http.post(urlExamenAgregar, exam, { responseType: 'json' });
    },










    getMaterias: () => {
        var materia1 = {'id': 1, 'nombre': 'Simulación'};

        var materias = {'materias': [materia1]};
      
        return {success: (otrafun) => { return otrafun(materias); }};
    },
  
    getAlumnos: () => {
        let urlAlumnosObtener='administrador/Alumnos/obtenerTodos';
        return  $http.get(urlAlumnosObtener, { responseType: 'json' }); 
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

        console.log(alumn);
        // post>>>
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