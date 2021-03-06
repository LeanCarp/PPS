<main class="container" ng-init="obtenerDatosMateriaAgregar()">
        <a href="#/materias-listar" class="btn btn-volver">Volver</a>

        <h2 ng-show="!isAdding">Agregar <strong>materia</strong></h2>
        <h2 ng-show="isAdding">Modificar <strong>materia</strong></h2>
    
        <div class="row">
            <form id="formMateria" name="formMateria" class="col s12" ng-submit="agregarMateria(materia)">
                <div class="row">
                    <div class="input-field col s8 m6">
                        <input class="elementos" id="nombre" name="nombre" type="text" class="" ng-model="materia.nombre" ng-required="true">
                        <label class="active" for="nombre">Nombre</label>
                        <p class="advertencia" ng-show="formMateria.nombre.$error.required && !formMateria.nombre.$pristine" class="help-block">El nombre no puede ser vacío</p>
                    </div>
                </div>
                <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formMateria.$invalid">
                <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formMateria.$invalid">
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