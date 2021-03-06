<main class="container" ng-init="obtenerMensajes(idTema)">

    <a href="#/foro-temas/{{idCategoria}}" class="btn btn-volver">Volver</a>
    <!-- <a href="#/foro-agregarMensaje/{{idTema}}" ng-show="false" class="btn btn-agregar">Agregar mensaje</a> -->
    <button title="Agregar mensaje" class="waves-effect waves-light btn btn-agregar" ng-show="!cerrado" ng-click="agregarMensajeNuevo(idTema)">Agregar mensaje</button>


    <ul class="collection with-header">
        <li class="collection-header"><h4><strong> {{tema.titulo}}</strong> </h4></li>
        <!-- <li class="collection-item" ng-repeat="mensaje in mensajes">{{mensaje.contenido}} | Fecha: {{mensaje.fecha}} | Usuario: {{mensaje.usuario.last_name}}, {{mensaje.usuario.first_name}}</li> -->
        <li class="collection-item" ng-repeat="mensaje in mensajes">
            <p>{{mensaje.contenido}}</p><p class="mensaje-info">Fecha: {{mensaje.fecha}} | Realizado por: {{mensaje.usuario.last_name}}, {{mensaje.usuario.first_name}}<button title="Eliminar" class="btn-remove" ng-click="eliminarMensaje(mensaje.id)"><i class="material-icons btn-opciones" style="color: red;">close</i></button></p>
        </li>
    </ul>
    
</main>

<!-- <style>
    .btn-opciones{
        font-size: 13px;
    }
    .btn-remove{
        background: white;
        border: 0;
        padding: 0;
        margin: 0;
    }
    .mensaje-info{
        font-size: 11px;
    }
    .btn-agregar{
        margin-top: 20px;
        margin-left: 10px;
        margin-bottom: 20px;
    }
    .btn-volver{
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style> -->