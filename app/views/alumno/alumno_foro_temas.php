<main class="container" ng-init="obtenerTemas(idCategoria)">

    <a href="#/foro-alumno" class="btn btn-volver">Volver</a>
    <a href="#/foro-alumno-agregarTema/{{idCategoria}}" class="btn btn-agregar">Agregar tema</a>

    <ul class="collection with-header">
        <li class="collection-header"><h4>Temas</h4></li>
        <li class="collection-item" ng-repeat="tema in temas"><a href="#/foro-alumno-mensajes/{{tema.id}}">{{tema.titulo}}</a> Estado: {{tema.estado}} | Visitas: {{tema.visitas}}</li>
    </ul>
</main>

<style>
.btn-agregar{
    margin-top: 20px;
    margin-left: 10px;
    margin-bottom: 20px;
}
.btn-volver{
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>