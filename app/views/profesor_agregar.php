<main class="container">
        <a href="#/profesores-listar" class="btn btn-volver">Volver</a>

        <h2 ng-show="!isAdding">Agregar <strong>profesor</strong></h2>
        <h2 ng-show="isAdding">Modificar <strong>profesor</strong></h2>
    
        <div class="row">
            <form id="formProfesor" name="formProfesor" class="col s12" ng-submit="agregarProfesor(profesor)">
                <div class="row">
                    <div class="input-field col s6">
                        <input class="elementos" id="nombre" name="nombre" type="text" class="" ng-model="profesor.nombre" ng-required="true">
                        <label class="active" for="nombre">Nombre</label>
                        <p class="advertencia" ng-show="formProfesor.nombre.$error.required && !formProfesor.nombre.$pristine" class="help-block">El nombre no puede ser vacío</p>
                    </div>
                    <div class="input-field col s6">
                            <input class="elementos" id="apellido" name="apellido" type="text" class="" ng-model="profesor.apellido" ng-required="true">
                            <label class="active" for="nombre">Apellido</label>
                            <p class="advertencia" ng-show="formProfesor.apellido.$error.required && !formProfesor.apellido.$pristine" class="help-block">El apellido no puede ser vacío</p>
                    </div>
                </div>
                <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formProfesor.$invalid">
                <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formProfesor.$invalid">
            </form>
        </div>
    </main>
    
    <script>
        $(document).ready(function() {
        $('select').material_select();
      });
    
    
    </script>
    
<!--     <style>
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
    </style> -->