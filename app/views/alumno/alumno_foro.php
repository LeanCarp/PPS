<main class="container" ng-init="obtenerCategorias()">
    
        <ul class="collection with-header">
            <li class="collection-header"><h4><i class="material-icons left centrado" style="padding-top: 6px;">forum</i> Foro</h4></li>
            <li class="collection-item" ng-repeat="categoria in categorias"><a href="#/foro-alumno-temas/{{categoria.id}}">{{categoria.nombre}}</a></li>
        </ul>
        
    </main>
    
    <style>
        .btn-agregar{
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>