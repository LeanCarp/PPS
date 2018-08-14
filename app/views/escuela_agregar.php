<main class="container" ng-init="obtenerDatosAgregarEscuela()">
    <a href="#/escuelas-listar" class="btn btn-volver">Volver</a>

    <h2 ng-show="!isAdding">Agregar <strong>escuela</strong></h2>
    <h2 ng-show="isAdding">Modificar <strong>escuela</strong></h2>

    <div class="row">
        <form id="formEscuela" name="formEscuela" class="col s12" ng-submit="agregarEscuela(escuela)">
            <div class="row">
                <div class="input-field col s8 m6">
                    <input class="elementos" id="nombre" name="nombre" type="text" class="" ng-model="escuela.nombre" ng-required="true">
                    <label class="active" for="nombre">Nombre</label>
                    <p class="advertencia" ng-show="formEscuela.nombre.$error.required && !formEscuela.nombre.$pristine" class="help-block">El nombre no puede ser vacío</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 m6">
                    <input class="elementos" id="orientacion" name="orientacion" type="text" class="" ng-model="escuela.orientacion" ng-required="true">
                    <label class="active" for="orientacion">Orientación</label>
                    <p class="advertencia" ng-show="formEscuela.orientacion.$error.required && !formEscuela.orientacion.$pristine" class="help-block">La orientación no puede ser vacía</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 m6">
                    <select id="pais" name="pais" ng-model="escuela.pais" ng-change="cargarCiudades(escuela.pais)" ng-required="true"> <!-- No required -->
                        <option ng-repeat="pais in paises" value="{{pais.id}}">{{pais.nombre}}</option>
                    </select>
                    <label for="pais">Seleccione un pais:</label>
                    <!-- <p class="advertencia" ng-show="formAlumno.escuela.$error.required && !formAlumno.escuela.$pristine" class="help-block">Debe seleccionar una escuela</p> -->
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 m6">
                    <select id="ciudad" name="ciudad" ng-required="true" ng-model="escuela.ciudad">
                        <option ng-repeat="ciudad in ciudades" value="{{ciudad.id}}">{{ciudad.nombre}}</option>
                    </select>
                    <label for="ciudad">Ciudad:</label><!-- ng-options="profesor as profesor.apellido + ', ' + profesor.nombre for profesor in profesores track by profesor.id" -->
                </div>
            </div>
            <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formEscuela.$invalid">
            <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formEscuela.$invalid">
        </form>
    </div>
</main>

<style>
    .selects{
        padding: 0 !important;
    }

    .advertencia{
        margin: 0;
        font-size: 12px;
        color: #EA2E49;
    }
    .btn-volver{
        margin-top: 20px;
    }
    .elementos{
        margin: 0 !important;
    }
</style>