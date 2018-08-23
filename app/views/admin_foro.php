<main class="container" ng-init="obtenerCategorias()">

    <a href="#/foro-agregarCat" class="btn btn-agregar">Agregar categoría</a>

    <ul class="collection with-header">
        <li class="collection-header"><h4><i class="material-icons left centrado" style="padding-top: 6px;">forum</i> Foro</h4></li>
        <li class="collection-item" ng-repeat="categoria in categorias">
            <div class="foro-titulo">
                <div>
                    <a href="#/foro-temas/{{categoria.id}}">{{categoria.nombre}}</a>
                </div>
                <div class="foro-opciones">
                    <a title="Editar" href="#/foro-modificarCat/{{categoria.id}}">
                    <i class="material-icons btn-opciones">edit</i></a><button title="Eliminar" class="btn-remove" ng-click="eliminarCategoria(categoria.id)"><i class="material-icons btn-opciones" style="color: red;">close</i></button>
                </div>
            </div>
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

    .foro-titulo{
        display: flex;
        justify-content: space-between;
    }

    @media screen and (max-width:800px){
        .foro-titulo{
            flex-direction: column;
        }

        .foro-opciones{
            margin-top: 10px;
        }
    }
</style>