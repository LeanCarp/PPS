<main class="container">
    <a href="#/foro-mensajes/{{idTema}}" class="btn btn-agregar">Volver</a>

    <h2 ng-show="!isAdding">Agregar <strong>mensaje</strong></h2>
    <h2 ng-show="isAdding">Modificar <strong>mensaje</strong></h2>

    <div class="row">
        <form id="formMensaje" name="formMensaje" class="col s12" ng-submit="agregarMensaje(mensaje)">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input class="elementos" id="contenido" name="contenido" type="text" class="" ng-model="mensaje.contenido" ng-required="true">
                    <label class="active" for="contenido">Contenido</label>
                    <p class="advertencia" ng-show="formMensaje.contenido.$error.required && !formMensaje.contenido.$pristine" class="help-block">El mensaje no puede ser vacía</p>
                </div>
            </div>
            <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formMensaje.$invalid">
            <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formMensaje.$invalid">
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