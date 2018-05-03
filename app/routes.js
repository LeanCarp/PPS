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
      title: 'Estado de los pedidos',
      templateUrl: BASE_URL + "app/views/alumno_listar.html",
      controller: "AlumnosCtr"
    })
    .when("/informes-listar/:dni", {
      title: 'Informes',
      templateUrl: BASE_URL + "app/views/alumno_informe_listar.html",
      controller: "InformeListarCtr"
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







    .when("/estado-mesas", {
      title: 'Estado de las mesas',
      templateUrl: BASE_URL + "app/views/estado-mesas.html",
      controller: "EstadoMesasController"
    })
    .when("/aderezos/:idcategoria", {
      title: 'Listado de aderezos',
      templateUrl: BASE_URL + "app/views/aderezos.html",
      controller: "DefaultCtr"
    })
    .when("/aderezos/agregar", {
      title: 'Agregar un aderezo',
      templateUrl: BASE_URL + "app/views/agregar-aderezo.html",
      controller: "DefaultCtr"
    })
    .when("/aderezos/modificar/:id", {
      title: 'Modificar un aderezo',
      templateUrl: BASE_URL + "app/views/agregar-aderezo.html",
      controller: "DefaultCtr"
    })
    .when("/categorias-aderezos", {
      title: 'Listado de categorías de aderezos',
      templateUrl: BASE_URL + "app/views/categorias-aderezos.html",
      controller: "CategoriasAderezosCtr"
    })
    .when("/categorias-aderezos/agregar", {
      title: 'Agregar una categoría de aderezos',
      templateUrl: BASE_URL + "app/views/agregar-categoria-aderezos.html",
      controller: "DefaultCtr"
    })
    .when("/categorias-aderezos/modificar/:id", {
      title: 'Modificar una categoría de aderezos',
      templateUrl: BASE_URL + "app/views/agregar-categoria-aderezos.html",
      controller: "DefaultCtr"
    })
    .when("/categorias-menu", {
      title: 'Listado de categorías del menú',
      templateUrl: BASE_URL + "app/views/categorias-menu.html",
      controller: "DefaultCtr"
    })
    .when("/categorias-menu/agregar", {
      title: 'Agregar una categoría del menú',
      templateUrl: BASE_URL + "app/views/agregar-categoria-menu.html",
      controller: "DefaultCtr"
    })
    .when("/categorias-menu/modificar/:id", {
      title: 'Modificar una categoría del menú',
      templateUrl: BASE_URL + "app/views/agregar-categoria-menu.html",
      controller: "DefaultCtr"
    })
    .when("/elementos-menu", {
      title: 'Listado de elementos del menú',
      templateUrl: BASE_URL + "app/views/elementos-menu.html",
      controller: "DefaultCtr"
    })
    .when("/elementos-menu/agregar", {
      title: 'Agregar un elemento del menú',
      templateUrl: BASE_URL + "app/views/agregar-elemento-menu.html",
      controller: "DefaultCtr"
    })
    .when("/elementos-menu/modificar/:id", {
      title: 'Modificar un elemento del menú',
      templateUrl: BASE_URL + "app/views/agregar-elemento-menu.html",
      controller: "DefaultCtr"
    })
    .when("/mesas", {
      title: 'Listado de mesas',
      templateUrl: BASE_URL + "app/views/mesas.html",
      controller: "MesasCtr"
    })
    .when("/mesas/agregar", {
      title: 'Agregar una mesa',
      templateUrl: BASE_URL + "app/views/agregar-mesa.html",
      controller: "MesasCtr"
    })
    .when("/mesas/modificar/:id", {
      title: 'Modificar una mesa',
      templateUrl: BASE_URL + "app/views/agregar-mesa.html",
      controller: "MesasCtr"
    })
    .otherwise({
      templateUrl: BASE_URL + "app/views/404.html",
      controller: "DefaultCtr"
    });
}]);