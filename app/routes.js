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
    .when("/estado-pedidos", {
      title: 'Estado de los pedidos',
      templateUrl: BASE_URL + "app/views/estado-pedidos.html",
      controller: "PedidosCtr"
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