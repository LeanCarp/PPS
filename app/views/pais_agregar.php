<main class="container">
        <a href="#/paises-listar" class="btn btn-volver">Volver</a>

        <h2 ng-show="!isAdding">Agregar <strong>país</strong></h2>
        <h2 ng-show="isAdding">Modificar <strong>país</strong></h2>
    
        <div class="row">
            <form id="formPais" name="formPais" class="col s12" ng-submit="agregarPais(pais)">
                <div class="row">
                    <div class="input-field col s8 m6">
                        <input class="elementos" id="nombre" name="nombre" type="text" class="" ng-model="pais.nombre" ng-required="true">
                        <label class="active" for="nombre">Nombre</label>
                        <p class="advertencia" ng-show="formPais.nombre.$error.required && !formPais.nombre.$pristine" class="help-block">El nombre no puede ser vacío</p>
                    </div>
                </div>
                <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formPais.$invalid">
                <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formPais.$invalid">
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