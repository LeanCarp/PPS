<main class="container">
        <a href="#/tutor-informes/{{idAlumno}}" class="btn btn-agregar">Volver</a>

        <h2 ng-show="!isAdding">Agregar <strong>informe</strong></h2>
        <h2 ng-show="isAdding">Modificar <strong>informe</strong></h2>
    
        <div class="row">
            <form id="formInforme" name="formInforme" class="col s12" ng-submit="agregarInforme(informe)">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input class="elementos" id="titulo" name="titulo" type="text" class="" ng-model="informe.titulo" ng-required="true">
                        <label class="active" for="titulo">Título</label>
                        <p class="advertencia" ng-show="formInforme.titulo.$error.required && !formInforme.titulo.$pristine" class="help-block">El título no puede ser vacío</p>
                    </div>
                    <div class="input-field col s6 m2">
                            <input class="elementos" id="fecha" name="fecha" type="date" ng-model="informe.fecha" ng-required="true">
                            <label class="active" for="fecha">Fecha</label>
                            <p class="advertencia" ng-show="formInforme.fecha.$error.required && !formInforme.fecha.$pristine" class="help-block">La fecha no puede ser vacía</p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m9">
                        <textarea id="descripcion" name="descripcion" class="materialize-textarea" ng-model="informe.descripcion" ng-required="true"></textarea>
                        <label class="active" for="descripcion">Descripción</label>
                        <p class="advertencia" ng-show="formInforme.descripcion.$error.required && !formInforme.descripcion.$pristine" class="help-block">La descripción no puede ser vacía</p>
                    </div>
                </div>
                <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formInforme.$invalid">
                <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formInforme.$invalid">
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
        .btn-agregar{
            margin-top: 20px;
            margin-left: 20px;
        }
        .elementos{
            margin: 0 !important;
        }
    </style>