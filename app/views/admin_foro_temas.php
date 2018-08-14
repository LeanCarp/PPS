<main class="container" ng-init="obtenerTemas(idCategoria)">

    <a href="#/foro-admin" class="btn btn-volver">Volver</a>
    <a href="#/foro-agregarTema/{{idCategoria}}" class="btn btn-agregar">Agregar tema</a>

    <ul class="collection with-header">
        <li class="collection-header"><h4>Temas de categoria <strong> {{categoria.nombre}}</strong> </h4></li>
        <li class="collection-item" ng-repeat="tema in temas">
            <a href="#/foro-mensajes/{{tema.id}}">{{tema.titulo}}</a> Estado: {{tema.estado}} | Visitas: {{tema.visitas}} 
            <a title="Editar" href="#/foro-modificarTema/{{tema.id}}"> <i class="material-icons btn-opciones">edit</i></a>
            <button title="Eliminar" class="btn-remove" ng-click="eliminarTema(tema.id)"><i class="material-icons btn-opciones" style="color: red;">close</i></button>
            <button title="Cerrar" class="btn-remove" ng-show="tema.estado =='abierto'" ng-click="cerrarTema(tema.id)"><i class="material-icons btn-opciones" style="color: gray;">speaker_notes_off</i></button>
            <button title="Abrir" class="btn-remove" ng-show="tema.estado =='cerrado'" ng-click="abrirTema(tema.id)"><i class="material-icons btn-opciones" style="color: green;">loop</i></button>

        </li>
    </ul>
</main>

<style>
    .btn-opciones{
        font-size: 20px;
    }
    .btn-remove{
        background: white;
        border: 0;
        padding: 0;
        margin: 0;
    }
    .btn-remove:hover{
        background: white;
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