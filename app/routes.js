app.config(['$routeProvider', function ($routeProvider) {
  /*
    'title' es utilizado en el título de la página (index.php) y
    en los breadcrumbs (header.html) para ubicar al usuario.
    Ver app.js. ;)
  */
  $routeProvider
    .when("/", {
      title: 'Inicio',
      templateUrl: BASE_URL + "app/views/inicio.html",
      controller: "DefaultCtr"
    })
    .when("/alumnos-agregar", {
      title: 'Alumnos - Agregar',
      templateUrl: BASE_URL + "app/views/alumno_agregar.html",
      controller: "AlumnosCtr"
    })
    .when("/alumnos-agregar/:id", {
      title: 'Alumnos - Modificar',
      templateUrl: BASE_URL + "app/views/alumno_agregar.html",
      controller: "AlumnosCtr"
    })
    .when("/alumnos-listar", {
      title: 'Alumnos - Listar',
      templateUrl: BASE_URL + "app/views/alumno_listar.html",
      controller: "AlumnosCtr"
    })
    .when("/alumnos-ver/:id", {
      title: 'Alumnos - Ver',
      templateUrl: BASE_URL + "app/views/alumno_ver.html",
      controller: "AlumnosCtr"
    })
    .when("/informes-agregar/:id", {
      title: 'Informes - Agregar',
      templateUrl: BASE_URL + "app/views/alumno_informe_agregar.html",
      controller: "InformeListarCtr"
    })
    .when("/informes-listar/:id", {
      title: 'Informes - Listar',
      templateUrl: BASE_URL + "app/views/alumno_informe_listar.html",
      controller: "InformeListarCtr"
    })
    .when("/informes-modificar/:idInforme", {
      title: 'Informes - Modificar',
      templateUrl: BASE_URL + "app/views/alumno_informe_agregar.html",
      controller: "InformeListarCtr"
    })
    .when("/actividad-agregar/:id", {
      title: 'Actividad',
      templateUrl: BASE_URL + "app/views/actividad_agregar.html",
      controller: "ActividadCtr"
    })
    .when("/actividades-listar/:id", {
      title: 'Actividades',
      templateUrl: BASE_URL + "app/views/actividad_listar.html",
      controller: "ActividadCtr"
    })
       .when("/actividades-ver/:id", {
      title: 'Actividad - Ver',
      templateUrl: BASE_URL + "app/views/actividad_ver.html",
      controller: "ActividadCtr"
    })
    .when("/materias-listar", {
      title: 'Materias - Listar',
      templateUrl: BASE_URL + "app/views/materia_listar.html",
      controller: "MateriaCtr"
    })
    .when("/materias-agregar", {
      title: 'Materias - Agregar',
      templateUrl: BASE_URL + "app/views/materia_agregar.html",
      controller: "MateriaCtr"
    })
    .when("/materias-agregar/:id", {
      title: 'Materias - Modificar',
      templateUrl: BASE_URL + "app/views/materia_agregar.html",
      controller: "MateriaCtr"
    })
    .when("/archivo-listar/:id", {
      title: 'Archivos - Listar',
      templateUrl: BASE_URL + "app/views/archivo_listar.html",
      controller: "ArchivoCtr"
    })
    .when("/archivo-agregar", {
      title: 'Archivo - Agregar',
      templateUrl: BASE_URL + "app/views/archivo_agregar.html",
      controller: "ArchivoCtr"
    })
    .when("/archivo-agregar/:id", {
      title: 'Archivo - Modificar',
      templateUrl: BASE_URL + "app/views/archivo_agregar.html",
      controller: "ArchivoCtr"
    })
    .when("/profesores-listar", {
      title: 'Profesor - Listar',
      templateUrl: BASE_URL + "app/views/profesor_listar.html",
      controller: "ProfesorCtr"
    })
    .when("/profesores-agregar", {
      title: 'Profesor - Agregar',
      templateUrl: BASE_URL + "app/views/profesor_agregar.html",
      controller: "ProfesorCtr"
    })
    .when("/profesores-agregar/:id", {
      title: 'Profesor - Modificar',
      templateUrl: BASE_URL + "app/views/profesor_agregar.html",
      controller: "ProfesorCtr"
    })
    .when("/cursadas-listar/:id", {
      title: 'Cursadas - Listar',
      templateUrl: BASE_URL + "app/views/cursada_listar.html",
      controller: "CursadasCtr"
    })
    .when("/cursadas-agregar/:id", {
      title: 'Cursadas - Agregar',
      templateUrl: BASE_URL + "app/views/cursada_agregar.html",
      controller: "CursadasCtr"
    })
    .when("/cursadas-modificar/:idCurs", {
      title: 'Cursadas - Modificar',
      templateUrl: BASE_URL + "app/views/cursada_agregar.html",
      controller: "CursadasCtr"
    })
    .when("/cursadas-agregar-multiples", {
      title: 'Cursadas - Agregar múltiples',
      templateUrl: BASE_URL + "app/views/cursadas_agregar_multiples.html",
      controller: "CursadasCtr"
    })
    .when("/comisiones-listar", {
      title: 'Comisiones - Listar',
      templateUrl: BASE_URL + "app/views/comision_listar.html",
      controller: "ComisionesCtr"
    })
    .when("/comisiones-agregar", {
      title: 'Comisiones - Listar',
      templateUrl: BASE_URL + "app/views/comision_agregar.html",
      controller: "ComisionesCtr"
    })
    .when("/comisiones-agregar/:id", {
      title: 'Comisiones - Modificar',
      templateUrl: BASE_URL + "app/views/comision_agregar.html",
      controller: "ComisionesCtr"
    })
    .when("/comisiones-ver/:id", {
      title: 'Comisiones - Ver',
      templateUrl: BASE_URL + "app/views/comision_ver.html",
      controller: "ComisionesCtr"
    })
      .when("/examenes-listar/:idCursada", {
      title: 'Examenes - Listar',
      templateUrl: BASE_URL + "app/views/examenes_listar.html",
      controller: "ExamenesCtr"
    })
    .when("/examenes-agregar", {
      title: 'Examenes - Agregar',
      templateUrl: BASE_URL + "app/views/examenes_agregar.html",
      controller: "ExamenesCtr"
    })
    .when("/paises-agregar", {
      title: 'Países - Agregar',
      templateUrl: BASE_URL + "app/views/pais_agregar.html",
      controller: "PaisesCtr"
    })
    .when("/paises-agregar/:id", {
      title: 'Países - Modificar',
      templateUrl: BASE_URL + "app/views/pais_agregar.html",
      controller: "PaisesCtr"
    })
    .when("/paises-listar", {
      title: 'Países - Listar',
      templateUrl: BASE_URL + "app/views/pais_listar.html",
      controller: "PaisesCtr"
    })
    .when("/ciudades-agregar", {
      title: 'Ciudades - Agregar',
      templateUrl: BASE_URL + "app/views/ciudad_agregar.html",
      controller: "CiudadesCtr"
    })
    .when("/ciudades-agregar/:id", {
      title: 'Ciudades - Modificar',
      templateUrl: BASE_URL + "app/views/ciudad_agregar.html",
      controller: "CiudadesCtr"
    })
    .when("/ciudades-listar", {
      title: 'Países - Listar',
      templateUrl: BASE_URL + "app/views/ciudad_listar.html",
      controller: "CiudadesCtr"
    })
    .when("/escuelas-agregar", {
      title: 'Escuelas - Agregar',
      templateUrl: BASE_URL + "app/views/escuela_agregar.html",
      controller: "EscuelasCtr"
    })
    .when("/escuelas-agregar/:id", {
      title: 'Ciudades - Modificar',
      templateUrl: BASE_URL + "app/views/escuela_agregar.html",
      controller: "EscuelasCtr"
    })
    .when("/escuelas-listar", {
      title: 'Países - Listar',
      templateUrl: BASE_URL + "app/views/escuela_listar.html",
      controller: "EscuelasCtr"
    })
    .when("/tutores-agregar", {
      title: 'Tutores - Agregar',
      templateUrl: BASE_URL + "app/views/tutores_agregar.html",
      controller: "TutoresCtr"
    })
    .when("/tutores-agregar/:idTutor", {
      title: 'Tutores - Modificar',
      templateUrl: BASE_URL + "app/views/tutores_agregar.html",
      controller: "TutoresCtr"
    })
    .when("/tutores-listar", {
      title: 'Tutores - Listar',
      templateUrl: BASE_URL + "app/views/tutores_listar.html",
      controller: "TutoresCtr"
    })
     .when("/tutores-listar-informes/:idTutor", {
      title: 'Informes Tutor',
      templateUrl: BASE_URL + "app/views/tutores_listar_informes.html",
      controller: "TutoresCtr"
    })
        .when("/tutores-ver/:id", {
      title: 'Tutor - Ver',
      templateUrl: BASE_URL + "app/views/tutor_ver.html",
      controller: "TutoresCtr"
    })


    .when("/alumno-cursadas-listar", {
      title: 'Cursadas - Listar',
      templateUrl: BASE_URL + "app/views/alumno/alumno_cursadas.html",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-examenes-listar/:idCurs", {
      title: 'Exámenes - Listar',
      templateUrl: BASE_URL + "app/views/alumno/alumno_examenes.html",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-informes-listar", {
      title: 'Informes - Listar',
      templateUrl: BASE_URL + "app/views/alumno/alumno_informes.html",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-actividades-listar", {
      title: 'Actividades - Listar',
      templateUrl: BASE_URL + "app/views/alumno/alumno_actividades.html",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-perfil", {
      title: 'Alumno - Perfil',
      templateUrl: BASE_URL + "app/views/alumno/alumno_perfil.html",
      controller: "UserAlumnoCtr"
    })
    .when("/alumnos-perfil-editar", {
      title: 'Perfil - Editar',
      templateUrl: BASE_URL + "app/views/alumno/alumno_editar.html",
      controller: "UserAlumnoCtr"
    })


    .when("/tutor-alumnos", {
      title: 'Alumnos - Listar',
      templateUrl: BASE_URL + "app/views/tutor/tutor_alumnos_listar.html",
      controller: "UserTutorCtr"
    })
    .when("/tutor-cursadas/:id", {
      title: 'Cursadas - Listar',
      templateUrl: BASE_URL + "app/views/tutor/tutor_cursadas_listar.html",
      controller: "UserTutorCtr"
    })
    .when("/tutor-examenes/:idCurs", {
      title: 'Exámenes - Listar',
      templateUrl: BASE_URL + "app/views/tutor/tutor_examenes_listar.html",
      controller: "UserTutorCtr"
    })
    .when("/tutor-informes/:id", {
      title: 'Informes - Listar',
      templateUrl: BASE_URL + "app/views/tutor/tutor_informes_listar.html",
      controller: "UserTutorCtr"
    })
    .when("/tutor-informes-agregar/:id", {
      title: 'Informes - Agregar',
      templateUrl: BASE_URL + "app/views/tutor/tutor_informes_agregar.html",
      controller: "UserTutorCtr"
    })
    .when("/tutor-informes-modificar/:idModif", {
      title: 'Informes - Modificar',
      templateUrl: BASE_URL + "app/views/tutor/tutor_informes_agregar.html",
      controller: "UserTutorCtr"
    })
    .when("/tutor-ver", {
      title: 'Usuario - Perfil',
      templateUrl: BASE_URL + "app/views/tutor_ver.html",
      controller: "AdminCtr"
    })
    .when("/admin-ver", {
      title: 'Usuario - Perfil',
      templateUrl: BASE_URL + "app/views/admin_ver.html",
      controller: "AdminCtr"
    })
    .when("/foro-admin", {
      title: 'Foro - Categorías',
      templateUrl: BASE_URL + "app/views/admin_foro.html",
      controller: "ForoCtr"
    })
    .when("/foro-agregarCat", {
      title: 'Foro - Categorías - Agregar',
      templateUrl: BASE_URL + "app/views/admin_foro_agregarCat.html",
      controller: "ForoCtr"
    })
    .when("/foro-modificarCat/:idCatMod", {
      title: 'Foro - Categorías - Modificar',
      templateUrl: BASE_URL + "app/views/admin_foro_agregarCat.html",
      controller: "ForoCtr"
    })
    .when("/foro-agregarTema/:idCat", {
      title: 'Foro - Temas - Agregar',
      templateUrl: BASE_URL + "app/views/admin_foro_agregarTema.html",
      controller: "ForoCtr"
    })
    .when("/foro-modificarTema/:idTemaMod", {
      title: 'Foro - Temas - Modificar',
      templateUrl: BASE_URL + "app/views/admin_foro_agregarTema.html",
      controller: "ForoCtr"
    })
    .when("/foro-temas/:idCat", {
      title: 'Foro - Temas',
      templateUrl: BASE_URL + "app/views/admin_foro_temas.html",
      controller: "ForoCtr"
    })
    .when("/foro-mensajes/:idTema", {
      title: 'Foro - Mensajes',
      templateUrl: BASE_URL + "app/views/admin_foro_mensajes.html",
      controller: "ForoCtr"
    })
    .when("/foro-agregarMensaje/:idTema", {
      title: 'Foro - Mensajes - Agregar',
      templateUrl: BASE_URL + "app/views/admin_foro_agregarMensaje.html",
      controller: "ForoCtr"
    })
    .when("/foro-alumno", {
      title: 'Foro - Categorías',
      templateUrl: BASE_URL + "app/views/alumno/alumno_foro.html",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-alumno-temas/:idCat", {
      title: 'Foro - Temas',
      templateUrl: BASE_URL + "app/views/alumno/alumno_foro_temas.html",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-alumno-mensajes/:idTema", {
      title: 'Foro - Mensajes',
      templateUrl: BASE_URL + "app/views/alumno/alumno_foro_mensajes.html",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-alumno-agregarMensaje/:idTema", {
      title: 'Foro - Mensajes - Agregar',
      templateUrl: BASE_URL + "app/views/alumno/alumno_foro_agregarMensaje.html",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-tutor", {
      title: 'Foro - Categorías',
      templateUrl: BASE_URL + "app/views/tutor/tutor_foro.html",
      controller: "ForoTutorCtr"
    })
    .when("/foro-tutor-temas/:idCat", {
      title: 'Foro - Temas',
      templateUrl: BASE_URL + "app/views/tutor/tutor_foro_temas.html",
      controller: "ForoTutorCtr"
    })
    .when("/foro-tutor-mensajes/:idTema", {
      title: 'Foro - Mensajes',
      templateUrl: BASE_URL + "app/views/tutor/tutor_foro_mensajes.html",
      controller: "ForoTutorCtr"
    })
    .when("/foro-tutor-agregarMensaje/:idTema", {
      title: 'Foro - Mensajes - Agregar',
      templateUrl: BASE_URL + "app/views/tutor/tutor_foro_agregarMensaje.html",
      controller: "ForoTutorCtr"
    })
    







    .otherwise({
      templateUrl: BASE_URL + "app/views/404.html",
      controller: "DefaultCtr"
    });
}]);