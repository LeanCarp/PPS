app.factory('service', ['$http','$rootScope','$location','Upload', function($http,$rootScope,$location,Upload) { 
    //Guardo en el $rootScope el id dl usuario logueado
    $rootScope.alumnoLog = angular.copy(USER_ID_LOG);
  
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
        'idMateria':idMateria
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
      
      const archivoInsertar = {
        'titulo': archivo.titulo,
        'descripcion': archivo.descripcion,
        'ruta': archivo.ruta,
        'idMateria': archivo.idMateria,
        'tipo':archivo.tipo
      }
      
       let archivoSubir = undefined;
       if(archivo.tipo==2)
        archivoSubir = archivo.archivoAsubir;

        //return $http.post(urlArchivoAgregar, archi, { responseType: 'json' });
        return Upload.upload({url:urlArchivoAgregar, method:'POST', file:archivoSubir, data:archivoInsertar});
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
      const Archivo = {
        'id':archivo.id,
        'titulo': archivo.titulo,
        'descripcion': archivo.descripcion,
        //'ruta': archivo.ruta,
        //'idMateria': archivo.idMateria,
        //'tipo':archivo.idCategoriaArchivo
      }
      return $http.post(urlArchivoctualizar, Archivo, { responseType: 'json' });
    },

    agregarComision: (comision) => {

      var profesores = [];
      angular.forEach(comision.profesores, function(value, key) {
        var profe = value.split('-');
        this.push([profe[0], profe[1]]);
      }, profesores);

      const comis = {
        'anio': comision.anio,
        'cuatrimestre': comision.cuatrimestre,
        'idMateria': comision.materia,
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

      eliminarCursada: (idCursada) => {
      let urlComisionObtener = 'administrador/Cursada/Eliminar';
     const idCurs = {
        'idCursada': idCursada
      }
      return $http.post(urlComisionObtener, idCurs, { responseType: 'json' });
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

      obtenerExamenes: (id) => {

      const idCurs=
      {
        'idCursada':id,
      }
        let urlExamenesObtener = 'administrador/Examen/ObtenerExamenes';
        return $http.post(urlExamenesObtener, idCurs,{ responseType: 'json' });
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
    eliminarInforme: (idInforme) => {
      let urlInformeEliminar='administrador/Informe/Eliminar';
      const id = {

        'idInforme': idInforme
      }
      return $http.post(urlInformeEliminar, id , { responseType: 'json' });
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
    obtenerInformesTutor: (idTutor) => {
      let urlInformeObtener='administrador/Tutores/ObtenerInformes';
      const id = {
        'idUsuario': idTutor
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
    

    obtenerActividad: (idActividad) => {
      let urActividadAgregar='administrador/Actividad/ObtenerActividad';
      const id = {
        'idActividad': idActividad
      }
      return  $http.post(urActividadAgregar, id, { responseType: 'json' });
    },
     eliminarActividad: (idActividad) => {
      let urActividadEliminar='administrador/Actividad/Eliminar';
      const id = {
        'idActividad': idActividad
      }
      return  $http.post(urActividadEliminar, id, { responseType: 'json' });
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
     obtenerPerfilTutor: (idTutor) => {
      let urlTutorObtener = 'tutor/Tutor/Leer';
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
    let urlAlumnoActualizar = 'administrador/Alumnos/Actualizar';
    return $http.post(urlAlumnoActualizar, alumn, { responseType: 'json' });

  },

   modificarUsuario: (usuario) => {
      const usr = {
          'id': usr.id,
          'password': usr.password,
 
      }
    let urlUsuarioActualizar = 'administrador/User/ModificarUsuario';
    return $http.post(urlUsuarioActualizar, usr, { responseType: 'json' });

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

        alumnoObtenerArchivosMateria: (idMateria) => {
      let urlArchivoObtener = 'alumno/Cursada/ObtenerArchivosMateria';
      const id = {
        'id':idMateria
      }
      return $http.post(urlArchivoObtener, id, { responseType: 'json' });
    },

    AlumnoObtenerExamenes: (idCursada) => {
      const id = {
        'idCursada':idCursada,
      }
      let urlExamenesObtener = 'alumno/Examen/ObtenerExamenesCursada';
      return $http.post(urlExamenesObtener, id,{ responseType: 'json' });
    },

    AlumnoObtenerInformes: (idUsuario) => {
      const id = {
        'idUsuario':idUsuario,
      }
      let urlInformesObtener = 'alumno/Informe/ObtenerInformesUsuario';
      return $http.post(urlInformesObtener, id,{ responseType: 'json' });
    },

    AlumnoObtenerActividades: (idUsuario) => {
      const id = {
        'idUsuario':idUsuario,
      }
      let urlActividadesObtener = 'alumno/Actividad/ObtenerActividadesUsuario';
      return $http.post(urlActividadesObtener, id,{ responseType: 'json' });
    },

    AlumnoObtenerAlumno: (idAlumno) => {
      const id = {
        'idAlumno':idAlumno,
      }
      let urlAlumnoObtener = 'alumno/Alumno/Leer';
      return $http.post(urlAlumnoObtener, id,{ responseType: 'json' });
    },
    AlumnoModificar: (alumno) => {
      const alumn = {
          'id': alumno.id,
          'email': alumno.email,
          'phone': alumno.phone,
      }
      let urlAlumnoActualizar = 'alumno/Alumno/Actualizar';
      return $http.post(urlAlumnoActualizar, alumn, { responseType: 'json' });
    },

    TutorObtenerAlumnos: () =>{

      let urlAlumnoObtener = 'tutor/Alumno/ObtenerAlumnos';
      return $http.post(urlAlumnoObtener, { responseType: 'json' });
    },
        TutorObtenerAlumno: (idAlumno) =>{
          const id = {
        'idAlumno':idAlumno,
      }
      let urlAlumnoObtener = 'tutor/Alumno/Leer';
      return $http.post(urlAlumnoObtener, id,{ responseType: 'json' });
    },

    TutorObtenerCursadas: (idUsuario) =>{
      let urlCursadasObtener = 'tutor/Cursada/ObtenerCursadasUsuario';
      const id = {
        'idUsuario': idUsuario
      }
      return $http.post(urlCursadasObtener, id, { responseType: 'json' });
    },
        TutorObtenerCursada: (idCursada) =>{
      let urlCursadasObtener = 'tutor/Cursada/ObtenerCursada';
      const id = {
        'idCursada': idCursada
      }
      return $http.post(urlCursadasObtener, id, { responseType: 'json' });
    },

    TutorObtenerExamenes: (idCursada) =>{
      let urlCursadasObtener = 'tutor/Examen/ObtenerExamenesCursada';
      const id = {
        'idCursada': idCursada
      }
      return $http.post(urlCursadasObtener, id, { responseType: 'json' });
    },

    TutorObtenerInformes: (idUsuario) =>{
      let urlInformesObtener = 'tutor/Informe/ObtenerInformesUsuario';
      const id = {
        'idUsuario': idUsuario
      }
      return $http.post(urlInformesObtener, id, { responseType: 'json' });
    },

    TutorObtenerInforme: (idInforme) =>{
      let urlInformeObtener = 'tutor/Informe/Leer';
      const id = {
        'idInforme': idInforme
      }
      return $http.post(urlInformeObtener, id, { responseType: 'json' });
    },

    TutorAgregarInforme: (informe) => {
      let urlInformeAgregar='tutor/Informe/AgregarInforme';
      const infor = {
        'titulo': informe.titulo,
        'fecha': informe.fecha,
        'descripcion': informe.descripcion,
        'idAlumno': informe.idAlumno,
        'idAutor': informe.idAutor
      }
      return $http.post(urlInformeAgregar, infor, { responseType: 'json' });
    },
        TutorObtenerActividades: (idUsuario) => {
      const id = {
        'idUsuario':idUsuario,
      }
      let urlActividadesObtener = 'tutor/Actividad/ObtenerActividadesUsuario';
      return $http.post(urlActividadesObtener, id,{ responseType: 'json' });
    },

    TutorActualizarInforme: (informe) => {
      let urlInformeActualizar='tutor/Informe/ActualizarInforme';
      const infor = {
        'titulo': informe.titulo,
        'fecha': informe.fecha,
        'descripcion': informe.descripcion,
        'idAlumno': informe.idAlumno,
        'idInforme': informe.id
      }
      return $http.post(urlInformeActualizar, infor, { responseType: 'json' });
    },

    TutorModificar: (tutor) => {
      const tut = {
          'id': tutor.id,
          'email': tutor.email,
          'phone': tutor.telefono,
      }
      let urlTutorActualizar = 'tutor/Tutor/ActualizarDatosContacto';
      return $http.post(urlTutorActualizar, tut, { responseType: 'json' });
    },

    AdminObtenerAdministrador: (idAdmin) => {
        let urlAdminObtener='administrador/Alumnos/Leer';
        const id = {
          'idAlumno': idAdmin,
        }
        return $http.post(urlAdminObtener, id, { responseType: 'json' });
    },

    AdminModificarAdministrador: (datos) => {
      let urlAdminActualizar = 'administrador/User/ModificarAdministrador';
      const admin = {
        'id': datos.id,
        'email': datos.email,
        'phone': datos.phone,
      }
      return $http.post(urlAdminActualizar, admin, { responseType: 'json' });
    },

    foroAgregarCategoria: (categoria) => {
      let urlForoAgregar='administrador/ForoAd/AgregarCategoria';
      const cat = {
        'nombre': categoria.nombre,
      }
      return $http.post(urlForoAgregar, cat, { responseType: 'json' });
    },

    foroActualizarCategoria: (categoria) => {
      let urlForoActualizar='administrador/ForoAd/ActualizarCategoria';
      const cat = {
        'id': categoria.id,
        'nombre': categoria.nombre,
      }
      return $http.post(urlForoActualizar, cat, { responseType: 'json' });
    },

    foroObtenerCategorias: (id) => {
      let urlForoObtener='administrador/ForoAd/LeerCategoria';
      const idCat = {
        'id': id
      }
      return $http.post(urlForoObtener, idCat, { responseType: 'json' });
    },
     foroObtenerCategoria: (id) => {
      let urlForoObtener='administrador/ForoAd/LeerCategoria';
      const idCat = {
        'id': id
      }
      return $http.post(urlForoObtener, idCat, { responseType: 'json' });
    },
    

    foroAgregarTema: (tema) => {
      let urlForoAgregar='administrador/ForoAd/AgregarTema';
      return $http.post(urlForoAgregar, tema, { responseType: 'json' });
    },
       foroAgregarTemaAlumno: (tema) => {
      let urlForoAgregar='alumno/ForoAl/AgregarTema';
      return $http.post(urlForoAgregar, tema, { responseType: 'json' });
    },
    

    foroActualizarTema: (tema) => {
      let urlForoAgregar='administrador/ForoAd/ActualizarTema';
      return $http.post(urlForoAgregar, tema, { responseType: 'json' });
    },

    foroObtenerTemasCategoria: (id) => {
      let urlForoObtener='administrador/ForoAd/ObtenerTemasCategoria';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoObtener, idTema, { responseType: 'json' });
    },

    foroEliminarCategoria: (id) => {
      let urlForoEliminar='administrador/ForoAd/EliminarCategoria';
      const idCategoria = {
        'id': id
      }
      return $http.post(urlForoEliminar, idCategoria, { responseType: 'json' });
    },

    foroEliminarMensaje: (id) => {
      let urlForoEliminar='administrador/ForoAd/EliminarMensaje';
      const idMensaje = {
        'id': id
      }
      return $http.post(urlForoEliminar, idMensaje, { responseType: 'json' });
    },

    foroObtenerTema: (id) => {
      let urlForoObtener='administrador/ForoAd/ObtenerTema';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoObtener, idTema, { responseType: 'json' });
    },

    foroEliminarTema: (id) => {
      let urlForoEliminar='administrador/ForoAd/EliminarTema';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoEliminar, idTema, { responseType: 'json' });
    },
    foroCerrarTema: (id) => {
      let urlForoCerrar='administrador/ForoAd/CerrarTema';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoCerrar, idTema, { responseType: 'json' });
    },
      foroAbrirTema: (id) => {
      let urlForoAbrir='administrador/ForoAd/AbrirTema';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoAbrir, idTema, { responseType: 'json' });
    },
    

    foroAgregarMensaje: (mensaje) => {
      let urlForoAgregar='administrador/ForoAd/AgregarMensaje';
      return $http.post(urlForoAgregar, mensaje, { responseType: 'json' });
    },

    foroObtenerMensajes: (id) => {
      let urlForoObtener='administrador/ForoAd/LeerMensaje';
      const idMensaje = {
        'id': id
      }
      return $http.post(urlForoObtener, idMensaje, { responseType: 'json' });
    },

    foroAlumnoObtenerCategorias: (id) => {
      let urlForoObtener='alumno/ForoAl/LeerCategoria';
      const idCat = {
        'id': id
      }
      return $http.post(urlForoObtener, idCat, { responseType: 'json' });
    },    

    foroAlumnoObtenerTema: (id) => {
      let urlForoObtener='alumno/ForoAl/ObtenerTema';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoObtener, idTema, { responseType: 'json' });
    },

    foroAlumnoObtenerTemasCategoria: (id) => {
      let urlForoObtener='alumno/ForoAl/ObtenerTemasPorCategoria';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoObtener, idTema, { responseType: 'json' });
    },

    foroAlumnoObtenerMensajes: (id) => {
      let urlForoObtener='alumno/ForoAl/LeerMensaje';
      const idMensaje = {
        'id': id
      }
      return $http.post(urlForoObtener, idMensaje, { responseType: 'json' });
    },

    foroAlumnoAgregarMensaje: (mensaje) => {
      let urlForoAgregar='alumno/ForoAl/AgregarMensaje';
      return $http.post(urlForoAgregar, mensaje, { responseType: 'json' });
    },

    foroTutorObtenerCategorias: (id) => {
      let urlForoObtener='tutor/ForoTu/LeerCategoria';
      const idCat = {
        'id': id
      }
      return $http.post(urlForoObtener, idCat, { responseType: 'json' });
    },    

    foroTutorObtenerTemasCategoria: (id) => {
      let urlForoObtener='tutor/ForoTu/ObtenerTemasPorCategoria';
      const idTema = {
        'id': id
      }
      return $http.post(urlForoObtener, idTema, { responseType: 'json' });
    },

    foroTutorObtenerMensajes: (id) => {
      let urlForoObtener='tutor/ForoTu/LeerMensaje';
      const idMensaje = {
        'id': id
      }
      return $http.post(urlForoObtener, idMensaje, { responseType: 'json' });
    },

    foroTutorAgregarMensaje: (mensaje) => {
      let urlForoAgregar='tutor/ForoTu/AgregarMensaje';
      return $http.post(urlForoAgregar, mensaje, { responseType: 'json' });
    },

    resetearContrasenia: (id) => {
      let urlResetear='administrador/Alumnos/resetearContrasenia';
      const idAlumno = {
        'id': id
      }
      return $http.post(urlResetear, idAlumno, { responseType: 'json' });
    },

    // service implementation
    GetPager: (totalItems, currentPage, pageSize) => {
      // default to first page
      currentPage = currentPage || 1;

      // default page size is 10
      pageSize = pageSize || 10;

      // calculate total pages
      var totalPages = Math.ceil(totalItems / pageSize);

      var startPage, endPage;
      if (totalPages <= 10) {
          // less than 10 total pages so show all
          startPage = 1;
          endPage = totalPages;
      } else {
          // more than 10 total pages so calculate start and end pages
          if (currentPage <= 6) {
              startPage = 1;
              endPage = 10;
          } else if (currentPage + 4 >= totalPages) {
              startPage = totalPages - 9;
              endPage = totalPages;
          } else {
              startPage = currentPage - 5;
              endPage = currentPage + 4;
          }
      }

      // calculate start and end item indexes
      var startIndex = (currentPage - 1) * pageSize;
      var endIndex = Math.min(startIndex + pageSize - 1, totalItems - 1);

      // create an array of pages to ng-repeat in the pager control
      // Crea un array con los rangos para la paginación
      input = [];
      for (var i=startPage; i<endPage+1; i++) {
        input.push(i);
      }

      pages = input;


      // return object with all pager properties required by the view
      return {
          totalItems: totalItems,
          currentPage: currentPage,
          pageSize: pageSize,
          totalPages: totalPages,
          startPage: startPage,
          endPage: endPage,
          startIndex: startIndex,
          endIndex: endIndex,
          pages: pages
      };
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