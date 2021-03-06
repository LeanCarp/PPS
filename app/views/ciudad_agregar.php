<main class="container" ng-init="obtenerDatosAgregarCiudad()">
    <a href="#/ciudades-listar" class="btn btn-volver">Volver</a>

    <h2 ng-show="!isAdding">Agregar <strong>ciudad</strong></h2>
    <h2 ng-show="isAdding">Modificar <strong>ciudad</strong></h2>

    <div class="row">
        <form id="formCiudad" name="formCiudad" class="col s12" ng-submit="agregarCiudad(ciudad)">
            <div class="row">
                <div class="input-field col s8 m6">
                    <input class="elementos" id="nombre" name="nombre" type="text" class="" ng-model="ciudad.nombre" ng-required="true">
                    <label class="active" for="nombre">Nombre</label>
                    <p class="advertencia" ng-show="formCiudad.nombre.$error.required && !formCiudad.nombre.$pristine" class="help-block">El nombre no puede ser vacío</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 m6">
                    <select id="pais" name="pais" ng-required="true" ng-model="ciudad.pais">
                        <option ng-repeat="pais in paises" value="{{pais.id}}">{{pais.nombre}}</option>
                    </select>
                    <label for="pais">País:</label><!-- ng-options="profesor as profesor.apellido + ', ' + profesor.nombre for profesor in profesores track by profesor.id" -->
                </div>
            </div>
            <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formCiudad.$invalid">
            <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formCiudad.$invalid">
        </form>
    </div>
</main>

<script>
    $(document).ready(function() {
    $('select').material_select();
  });


</script>

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