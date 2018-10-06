app.config(['$routeProvider', function ($routeProvider) {
  /*
    'title' es utilizado en el título de la página (index.php) y
    en los breadcrumbs (header.html) para ubicar al usuario.
    Ver app.js. ;)
  */
  $routeProvider
    .when("/", {
      title: 'Inicio',
      templateUrl: BASE_URL + "runAngular/view/inicio",
      controller: "DefaultCtr"
    })
    .when("/alumnos-agregar", {
      title: 'Alumnos - Agregar',
      templateUrl: BASE_URL + "runAngular/view/alumno_agregar",
      controller: "AlumnosCtr"
    })
    .when("/alumnos-modificar/:id", {
      title: 'Alumnos - Modificar',
      templateUrl: BASE_URL + "runAngular/view/alumno_agregar",
      controller: "AlumnosCtr"
    })
    .when("/alumnos-listar", {
      title: 'Alumnos - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno_listar",
      controller: "AlumnosCtr"
    })
    .when("/alumnos-ver/:id", {
      title: 'Alumnos - Ver',
      templateUrl: BASE_URL + "runAngular/view/alumno_ver",
      controller: "AlumnosCtr"
    })
    .when("/informes-agregar/:id", {
      title: 'Informes - Agregar',
      templateUrl: BASE_URL + "runAngular/view/alumno_informe_agregar",
      controller: "InformeListarCtr"
    })
    .when("/informes-listar/:id", {
      title: 'Informes - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno_informe_listar",
      controller: "InformeListarCtr"
    })
    .when("/informes-modificar/:idInforme", {
      title: 'Informes - Modificar',
      templateUrl: BASE_URL + "runAngular/view/alumno_informe_agregar",
      controller: "InformeListarCtr"
    })
    .when("/informes-ver/:idInforme", {
      title: 'Informes - Ver',
      templateUrl: BASE_URL + "runAngular/view/alumno_informe_ver",
      controller: "InformeListarCtr"
    })
    .when("/actividad-agregar/:id", {
      title: 'Actividad',
      templateUrl: BASE_URL + "runAngular/view/actividad_agregar",
      controller: "ActividadCtr"
    })
    .when("/actividades-listar/:id", {
      title: 'Actividades',
      templateUrl: BASE_URL + "runAngular/view/actividad_listar",
      controller: "ActividadCtr"
    })
       .when("/actividades-ver/:id", {
      title: 'Actividad - Ver',
      templateUrl: BASE_URL + "runAngular/view/actividad_ver",
      controller: "ActividadCtr"
    })
    .when("/materias-listar", {
      title: 'Materias - Listar',
      templateUrl: BASE_URL + "runAngular/view/materia_listar",
      controller: "MateriaCtr"
    })
    .when("/materias-agregar", {
      title: 'Materias - Agregar',
      templateUrl: BASE_URL + "runAngular/view/materia_agregar",
      controller: "MateriaCtr"
    })
    .when("/materias-modificar/:id", {
      title: 'Materias - Modificar',
      templateUrl: BASE_URL + "runAngular/view/materia_agregar",
      controller: "MateriaCtr"
    })
    .when("/archivo-listar/:id", {
      title: 'Archivos - Listar',
      templateUrl: BASE_URL + "runAngular/view/archivo_listar",
      controller: "ArchivoCtr"
    })
    .when("/archivo-agregar", {
      title: 'Archivo - Agregar',
      templateUrl: BASE_URL + "runAngular/view/archivo_agregar",
      controller: "ArchivoCtr"
    })
    .when("/archivo-agregar/:id", {
      title: 'Archivo - Modificar',
      templateUrl: BASE_URL + "runAngular/view/archivo_agregar",
      controller: "ArchivoCtr"
    })
    .when("/profesores-listar", {
      title: 'Profesor - Listar',
      templateUrl: BASE_URL + "runAngular/view/profesor_listar",
      controller: "ProfesorCtr"
    })
    .when("/profesores-agregar", {
      title: 'Profesor - Agregar',
      templateUrl: BASE_URL + "runAngular/view/profesor_agregar",
      controller: "ProfesorCtr"
    })
    .when("/profesores-modificar/:id", {
      title: 'Profesor - Modificar',
      templateUrl: BASE_URL + "runAngular/view/profesor_agregar",
      controller: "ProfesorCtr"
    })
    .when("/cursadas-listar/:id", {
      title: 'Cursadas - Listar',
      templateUrl: BASE_URL + "runAngular/view/cursada_listar",
      controller: "CursadasCtr"
    })
    .when("/cursadas-agregar/:id", {
      title: 'Cursadas - Agregar',
      templateUrl: BASE_URL + "runAngular/view/cursada_agregar",
      controller: "CursadasCtr"
    })
    .when("/cursadas-modificar/:idCurs", {
      title: 'Cursadas - Modificar',
      templateUrl: BASE_URL + "runAngular/view/cursada_agregar",
      controller: "CursadasCtr"
    })
    .when("/cursadas-agregar-multiples", {
      title: 'Cursadas - Agregar múltiples',
      templateUrl: BASE_URL + "runAngular/view/cursadas_agregar_multiples",
      controller: "CursadasCtr"
    })
    .when("/comisiones-listar", {
      title: 'Comisiones - Listar',
      templateUrl: BASE_URL + "runAngular/view/comision_listar",
      controller: "ComisionesCtr"
    })
    .when("/comisiones-agregar", {
      title: 'Comisiones - Listar',
      templateUrl: BASE_URL + "runAngular/view/comision_agregar",
      controller: "ComisionesCtr"
    })
    .when("/comisiones-modificar/:id", {
      title: 'Comisiones - Modificar',
      templateUrl: BASE_URL + "runAngular/view/comision_agregar",
      controller: "ComisionesCtr"
    })
    .when("/comisiones-ver/:id", {
      title: 'Comisiones - Ver',
      templateUrl: BASE_URL + "runAngular/view/comision_ver",
      controller: "ComisionesCtr"
    })
      .when("/examenes-listar/:idCursada", {
      title: 'Examenes - Listar',
      templateUrl: BASE_URL + "runAngular/view/examenes_listar",
      controller: "ExamenesCtr"
    })
    .when("/examenes-agregar", {
      title: 'Examenes - Agregar',
      templateUrl: BASE_URL + "runAngular/view/examenes_agregar",
      controller: "ExamenesCtr"
    })
    .when("/paises-agregar", {
      title: 'Países - Agregar',
      templateUrl: BASE_URL + "runAngular/view/pais_agregar",
      controller: "PaisesCtr"
    })
    .when("/paises-modificar/:id", {
      title: 'Países - Modificar',
      templateUrl: BASE_URL + "runAngular/view/pais_agregar",
      controller: "PaisesCtr"
    })
    .when("/paises-listar", {
      title: 'Países - Listar',
      templateUrl: BASE_URL + "runAngular/view/pais_listar",
      controller: "PaisesCtr"
    })
    .when("/ciudades-agregar", {
      title: 'Ciudades - Agregar',
      templateUrl: BASE_URL + "runAngular/view/ciudad_agregar",
      controller: "CiudadesCtr"
    })
    .when("/ciudades-modificar/:id", {
      title: 'Ciudades - Modificar',
      templateUrl: BASE_URL + "runAngular/view/ciudad_agregar",
      controller: "CiudadesCtr"
    })
    .when("/ciudades-listar", {
      title: 'Ciudades - Listar',
      templateUrl: BASE_URL + "runAngular/view/ciudad_listar",
      controller: "CiudadesCtr"
    })
    .when("/escuelas-agregar", {
      title: 'Escuelas - Agregar',
      templateUrl: BASE_URL + "runAngular/view/escuela_agregar",
      controller: "EscuelasCtr"
    })
    .when("/escuelas-modificar/:id", {
      title: 'Escuelas - Modificar',
      templateUrl: BASE_URL + "runAngular/view/escuela_agregar",
      controller: "EscuelasCtr"
    })
    .when("/escuelas-listar", {
      title: 'Escuelas - Listar',
      templateUrl: BASE_URL + "runAngular/view/escuela_listar",
      controller: "EscuelasCtr"
    })
    .when("/tutores-agregar", {
      title: 'Tutores - Agregar',
      templateUrl: BASE_URL + "runAngular/view/tutores_agregar",
      controller: "TutoresCtr"
    })
    .when("/tutores-modificar/:idTutor", {
      title: 'Tutores - Modificar',
      templateUrl: BASE_URL + "runAngular/view/tutores_agregar",
      controller: "TutoresCtr"
    })
    .when("/tutores-listar", {
      title: 'Tutores - Listar',
      templateUrl: BASE_URL + "runAngular/view/tutores_listar",
      controller: "TutoresCtr"
    })
     .when("/tutores-listar-informes/:idTutor", {
      title: 'Informes Tutor',
      templateUrl: BASE_URL + "runAngular/view/tutores_listar_informes",
      controller: "TutoresCtr"
    })
    .when("/tutores-ver/:id", {
    title: 'Tutor - Ver',
    templateUrl: BASE_URL + "runAngular/view/tutor_ver",
    controller: "TutoresCtr"
    })


    .when("/alumno-cursadas-listar", {
      title: 'Cursadas - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_cursadas",
      controller: "UserAlumnoCtr"
    })
        .when("/alumno-archivo-listar/:id", {
      title: 'Archivos - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_archivo_listar",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-examenes-listar/:idCurs", {
      title: 'Exámenes - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_examenes",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-informes-listar", {
      title: 'Informes - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_informes",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-actividades-listar", {
      title: 'Actividades - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_actividades",
      controller: "UserAlumnoCtr"
    })
    .when("/alumno-perfil", {
      title: 'Alumno - Perfil',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_perfil",
      controller: "UserAlumnoCtr"
    })
    .when("/alumnos-perfil-editar", {
      title: 'Perfil - Editar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_editar",
      controller: "UserAlumnoCtr"
    })
          .when("/alumno-contactos-listar", {
      title: 'Contactos - Listar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_contactos_listar",
      controller: "UserAlumnoCtr"
    })


    .when("/tutor-alumnos", {
      title: 'Alumnos - Listar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_alumnos_listar",
      controller: "UserTutorCtr"
    })
    .when("/tutor-alumnos-ver/:id", {
      title: 'Alumnos - Ver',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_alumno_ver",
      controller: "UserTutorCtr"
    })
    .when("/tutor-cursadas/:id", {
      title: 'Cursadas - Listar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_cursadas_listar",
      controller: "UserTutorCtr"
    })
    .when("/tutor-examenes/:idCurs", {
      title: 'Exámenes - Listar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_examenes_listar",
      controller: "UserTutorCtr"
    })
    .when("/tutor-informes/:id", {
      title: 'Informes - Listar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_informes_listar",
      controller: "UserTutorCtr"
    })
        .when("/tutor-actividades/:id", {
      title: 'Actividades - Listar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_actividades_listar",
      controller: "UserTutorCtr"
    })
    .when("/tutor-informes-agregar/:id", {
      title: 'Informes - Agregar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_informes_agregar",
      controller: "UserTutorCtr"
    })
    .when("/tutor-informes-modificar/:idModif", {
      title: 'Informes - Modificar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_informes_agregar",
      controller: "UserTutorCtr"
    })
    .when("/tutor-informes-ver/:idInforme", {
      title: 'Informes - Ver',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_informes_ver",
      controller: "UserTutorCtr"
    })
    .when("/tutor-perfil", {
      title: 'Usuario - Perfil',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_perfil",
      controller: "UserTutorCtr"
    })
    .when("/tutor-perfil-editar", {
      title: 'Usuario - Perfil',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_editar",
      controller: "UserTutorCtr"
    })
    .when("/admin-ver", {
      title: 'Usuario - Perfil',
      templateUrl: BASE_URL + "runAngular/view/admin_ver",
      controller: "AdminCtr"
    })
    .when("/admin-perfil-editar", {
      title: 'Usuario - Perfil - Editar',
      templateUrl: BASE_URL + "runAngular/view/admin_editar",
      controller: "AdminCtr"
    })
    .when("/foro-admin", {
      title: 'Foro - Categorías',
      templateUrl: BASE_URL + "runAngular/view/admin_foro",
      controller: "ForoCtr"
    })
    .when("/foro-agregarCat", {
      title: 'Foro - Categorías - Agregar',
      templateUrl: BASE_URL + "runAngular/view/admin_foro_agregarCat",
      controller: "ForoCtr"
    })
    .when("/foro-modificarCat/:idCatMod", {
      title: 'Foro - Categorías - Modificar',
      templateUrl: BASE_URL + "runAngular/view/admin_foro_agregarCat",
      controller: "ForoCtr"
    })
    .when("/foro-agregarTema/:idCat", {
      title: 'Foro - Temas - Agregar',
      templateUrl: BASE_URL + "runAngular/view/admin_foro_agregarTema",
      controller: "ForoCtr"
    })
    .when("/foro-modificarTema/:idTemaMod", {
      title: 'Foro - Temas - Modificar',
      templateUrl: BASE_URL + "runAngular/view/admin_foro_agregarTema",
      controller: "ForoCtr"
    })
    .when("/foro-temas/:idCat", {
      title: 'Foro - Temas',
      templateUrl: BASE_URL + "runAngular/view/admin_foro_temas",
      controller: "ForoCtr"
    })
    .when("/foro-mensajes/:idTema", {
      title: 'Foro - Mensajes',
      templateUrl: BASE_URL + "runAngular/view/admin_foro_mensajes",
      controller: "ForoCtr"
    })
    .when("/foro-agregarMensaje/:idTema", {
      title: 'Foro - Mensajes - Agregar',
      templateUrl: BASE_URL + "runAngular/view/admin_foro_agregarMensaje",
      controller: "ForoCtr"
    })
    .when("/foro-alumno", {
      title: 'Foro - Categorías',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_foro",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-alumno-temas/:idCat", {
      title: 'Foro - Temas',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_foro_temas",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-alumno-mensajes/:idTema", {
      title: 'Foro - Mensajes',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_foro_mensajes",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-alumno-agregarMensaje/:idTema", {
      title: 'Foro - Mensajes - Agregar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_foro_agregarMensaje",
      controller: "ForoAlumnoCtr"
    })
        .when("/foro-alumno-agregarTema/:idCat", {
      title: 'Foro - Temas - Agregar',
      templateUrl: BASE_URL + "runAngular/view/alumno/alumno_foro_agregarTema",
      controller: "ForoAlumnoCtr"
    })
    .when("/foro-tutor", {
      title: 'Foro - Categorías',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_foro",
      controller: "ForoTutorCtr"
    })
    .when("/foro-tutor-temas/:idCat", {
      title: 'Foro - Temas',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_foro_temas",
      controller: "ForoTutorCtr"
    })
    .when("/foro-tutor-mensajes/:idTema", {
      title: 'Foro - Mensajes',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_foro_mensajes",
      controller: "ForoTutorCtr"
    })
    .when("/foro-tutor-agregarMensaje/:idTema", {
      title: 'Foro - Mensajes - Agregar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_foro_agregarMensaje",
      controller: "ForoTutorCtr"
    })
        .when("/foro-tutor-agregarTema/:idCat", {
      title: 'Foro - Temas - Agregar',
      templateUrl: BASE_URL + "runAngular/view/tutor/tutor_foro_agregarTema",
      controller: "ForoTutorCtr"
    })
    .when("/usuario-cambiar-contraseña/:id", {
      title: 'Cambiar contraseña',
      templateUrl: BASE_URL + "runAngular/view/usuario_cambiar_contraseña",
      controller: "AdminCtr"
    })
    







    .otherwise({
      templateUrl: BASE_URL + "runAngular/view/404",
      controller: "DefaultCtr"
    });
}]);