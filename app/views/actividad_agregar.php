<main class="container">
        <a href="#/actividades-listar/{{idAlumno}}" class="btn btn-agregar">Volver</a>

        <h2 ng-show="!isAdding">Agregar <strong>actividad</strong></h2>
        <h2 ng-show="isAdding">Modificar <strong>actividad</strong></h2>
    
        <div class="row">
            <form id="formActividad" name="formActividad" class="col s12" ng-submit="agregarActividad(actividad)">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input class="elementos" id="descripcion" name="descripcion" type="text" class="" ng-model="actividad.descripcion" ng-required="true">
                        <label class="active" for="descripcion">Descripción</label>
                        <p class="advertencia" ng-show="formformActividad.descripcion.$error.required && !formformActividad.descripcion.$pristine" class="help-block">La descripción no puede ser vacío</p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s3 m3">
                        <input type="date" name="fechaInicio" ng-model="actividad.fechaInicio" ng-required="true">
                        <label class="active" for="horaInicio">Fecha inicio:</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <input type="date" name="fechaFin" ng-model="actividad.fechaFin" ng-required="false">
                        <label class="active" for="fechaFin">Fecha fin:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 m4">
                            <select name="dias" id="dias" ng-model="dias" ng-required="true">
                                <option value="" disabled selected>Elige un día</option>
                                <option value="1">Lunes</option>
                                <option value="2">Martes</option>
                                <option value="3">Miércoles</option>
                                <option value="4">Jueves</option>
                                <option value="5">Viernes</option>     
                                <option value="6">Sábado</option>
                                <option value="7">Domingo</option>                          
                            </select>
                            <label for="">Días:</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <input type="time" name="horaInicio" ng-model="horaInicio" ng-required="true">
                        <label class="active" for="horaInicio">Hora inicio:</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <input type="time" name="horaFin" ng-model="horaFin" ng-required="true">
                        <label class="active" for="horaFin">Hora fin:</label>
                    </div>
                    <input class="btn botonHorario col s1 m1" type="button" value="+" ng-click="agregarHorario(dias, horaInicio, horaFin)">
                </div>
                <div class="row">
                    <ul>
                        <li ng-repeat="hora in horarios">Día: {{hora.dia}} - Hora inicio: {{hora.horaInicio}} Hora fin: {{hora.horaFin}} <input class="botonCancelarHorario" type="button" value="X" ng-click="eliminarHorario(horario)"></li>
                    </ul>
                </div>
                <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formActividad.$invalid">
                <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formActividad.$invalid">
            </form>
        </div>
    </main>
    
    <script>
        $('select').material_select();
    </script>

    <style>
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
    </style>