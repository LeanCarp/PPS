<main class="container" ng-init="obtenerCategorias()">

    <a href="#/foro-agregarCat" class="btn btn-agregar">Agregar categoría</a>

    <ul class="collection with-header">
        <li class="collection-header"><h4><i class="material-icons left centrado" style="padding-top: 6px;">forum</i> Foro</h4></li>
        <li class="collection-item" ng-repeat="categoria in categorias"><a href="#/foro-temas/{{categoria.id}}">{{categoria.nombre}}</a>
            <a title="Editar" href="#/foro-modificarCat/{{categoria.id}}">
            <i class="material-icons btn-opciones">edit</i></a><button title="Eliminar" class="btn-remove" ng-click="eliminarCategoria(categoria.id)"><i class="material-icons btn-opciones" style="color: red;">close</i></button>
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
        margin-bottom: 20px;
    }
</style>