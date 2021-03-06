<main class="container">
     
    <h2 ng-show="isAdding">Modificar <strong>Examen</strong></h2>
    <h2 ng-show="!isAdding">Agregar <strong>Examen</strong></h2>
    <a href="#/examenes-listar/{{idCursada}}" class="btn btn-volver">Volver</a>
    <a></a>

    <div class="row">
        <form id="formExamen" name="formExamen" class="col s12" ng-submit="agregarExamen(examen)">

            <div class="row">
                <div class="input-field col s12">
                <input class="elementos" id="descripcion" name="descripcion" type="text" ng-model="examen.descripcion" ng-required="true">
                <label class="active" for="descripcion">Descripcion</label>
                <p class="advertencia" ng-show="formExamen.descripcion.$error.required && !formExamen.descripcion.$pristine" class="help-block">La descripción no puede ser vacía</p>
                </div>
            </div>         
            <div class="input-field col s12 selects">
                <select id="tipo" name="tipo" ng-model="examen.tipo" ng-required="true">
                    <option value="" disabled selected>Seleccione un tipo de examen:</option>
                    <option value="Parcial">Parcial</option>
                    <option value="Recuperatorio">Recuperatorio</option>
                    <option value="Final">Final</option>
                    <option value="Diagnóstico">Diagnóstico</option>
                    <option value="Otro">Otro</option>                    
                </select>
                <p class="advertencia" ng-show="formExamenformExamen.tipo.$error.required && !formExamen.tipo.$pristine" class="help-block">Debe seleccionar un tipo</p>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input class="elementos" id="fecha" name="fecha" type="date" ng-model="examen.fecha" ng-required="true">
                    <label class="active" for="fecha">Fecha</label>
                    <p class="advertencia" ng-show="formExamen.fecha.$error.required && !formExamen.fecha.$pristine" class="help-block">La fecha no puede ser vacía</p>
                </div>
                <div class="input-field col s1">
                    <input class="elementos" id="nota" name="nota" type="number" min="1"  max="10"   class="" ng-model="examen.nota" ng-required="true">
                    <label class="active" for="nota">nota</label>
                    <p class="advertencia" ng-show="formExamen.nota.$error.required && !formExamen.nota.$pristine" class="help-block">La nota no puede ser vacía</p>
                    <p class="advertencia" ng-show="validarNota(formExamen.nota.$viewValue) && !formExamen.nota.$pristine" class="help-block">La nota debe estar entre 1-10</p>
                </div>
             </div>
            <div class="row">
                 <div class="input-field col s12">
                <input class="elementos" id="comentario" name="comentario" type="text" ng-model="examen.comentario" ng-required="false">
                <label class="active" for="comentario">Comentario</label>
                </div>
            </div>
            
            <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formExamen.$invalid">
            <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formExamen.$invalid">
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

    .elementos{
        margin: 0 !important;
    }
</style>
      