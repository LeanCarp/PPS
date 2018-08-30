<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

app.config(['$routeProvider', function ($routeProvider) {
  /*
    'title' es utilizado en el título de la página (index.php) y
    en los breadcrumbs (header.html) para ubicar al usuario.
    Ver app.js. ;)
  */
  $routeProvider
  <?php foreach ($routes as $r) { ?>  
    .when('<?= $r['url'] ?>', {
      title: '<?= $r['title'] ?>',
      templateUrl: BASE_URL + "runAngular/view<?= $r['view'] ?>",
      controller: "<?= $r['controller'] ?>"
	})
  <?php } ?>
    .otherwise({
      title: '<?= $default['title'] ?>',
      templateUrl: BASE_URL + "runAngular/view<?= $default['view'] ?>",
      controller: "<?= $default['controller'] ?>"
    });
}]);