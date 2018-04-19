<!DOCTYPE html>
<!-- <html lang="es" ng-app="materializeApp"> -->
<html lang="es" ng-app="AlumnosApp">
  <head>
    <!--<title ng-bind="title ? title + ' • Cajero' : 'Cajero'">Cajero</title>-->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="X-UA-Compatible" content="ie=edge">-->

    <!-- Materialize y Material Icons. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL()?>assets/css/main.css">
 
    <!-- jQuery, Angular, Angular Route, Materialize, Angular-Materialize. -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-materialize/0.2.2/angular-materialize.min.js"></script>
 -->
    <!-- QRCode -->
    <!-- <script src="<?php echo BASE_URL().'assets/js/qrcode.min.js'?>"></script> -->

    <!-- //var CASADECOMIDAID = <?= $casadecomidaID ?>; -->
    <script id="relevantData">
      var BASE_URL='<?= BASE_URL() ?>';
    
    </script>

    <!-- App JS -->
    <script src="<?php echo BASE_URL().'app/app.js'?>"></script>
    <script src="<?php echo BASE_URL().'app/filters.js'?>"></script>
    <script src="<?php echo BASE_URL().'app/routes.js'?>"></script>
    <script src="<?php echo BASE_URL().'app/service.js'?>"></script>
    <script src="<?php echo BASE_URL().'app/controllers.js'?>"></script>
    
  </head>
  <body>
    <div ng-include='"<?php echo BASE_URL()?>app/views/header.html"'></div>
    <!-- <div ng-include='"<?php echo BASE_URL()?>app/views/alumno_agregar.html"'></div>
    <div ng-include='"<?php echo BASE_URL()?>app/views/alumno_listar.html"'></div> -->
    <div ng-view></div>
  </body>
</html>