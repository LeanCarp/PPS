<main class="container">
    <a href="#/foro-admin" class="btn btn-agregar">Volver</a>

    <h2 ng-show="!isAdding">Agregar <strong>categoría</strong></h2>
    <h2 ng-show="isAdding">Modificar <strong>categoría</strong></h2>

    <div class="row">
        <form id="formCategoriaForo" name="formCategoriaForo" class="col s12" ng-submit="agregarCategoria(categoria)">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input class="elementos" id="nombre" name="nombre" type="text" class="" ng-model="categoria.nombre" ng-required="true">
                    <label class="active" for="nombre">Categoría</label>
                    <p class="advertencia" ng-show="formformCategoriaForo.nombre.$error.required && !formformCategoriaForo.nombre.$pristine" class="help-block">La categoría no puede ser vacía</p>
                </div>
            </div>
            <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formCategoriaForo.$invalid">
            <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formCategoriaForo.$invalid">
        </form>
    </div>
</main>

<!-- <style>
    .botonHorario{
        margin: 17px;
    }

    .selects{
        padding: 0 !important;
    }

    .advertencia{
        margin: 0;
        font-size: 12px;
        color: #EA2E49;
    }
    .btn-agregar{
        margin-top: 20px;
        margin-left: 20px;
    }
    .elementos{
        margin: 0 !important;
    }
</style> -->