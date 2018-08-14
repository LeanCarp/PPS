<main class="container" ng-init="obtenerMensajes(idTema)">

        <a href="#/foro-alumno-temas/{{idCategoria}}" class="btn btn-volver">Volver</a>
        <button title="Agregar mensaje" class="waves-effect waves-light btn" ng-show="!cerrado" ng-click="agregarMensajeNuevo(idTema)">Agregar mensaje</button>
    
        <ul class="collection with-header">
            <li class="collection-header"><h4>Mensajes</h4></li>
            <!-- <li class="collection-item" ng-repeat="mensaje in mensajes">{{mensaje.contenido}} | Fecha: {{mensaje.fecha}} | Usuario: {{mensaje.usuario.last_name}}, {{mensaje.usuario.first_name}}</li> -->
            <li class="collection-item" ng-repeat="mensaje in mensajes">
                <p>{{mensaje.contenido}}</p><p class="mensaje-info">Fecha: {{mensaje.fecha}} | Realizado por: {{mensaje.usuario.last_name}}, {{mensaje.usuario.first_name}}</p>
            </li>
        </ul>
        
    </main>
    
    <style>
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
    </style>