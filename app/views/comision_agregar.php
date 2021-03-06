<main id="container" class="container" ng-init="obtenerDatosAgregarComision()">
        <a href="#/comisiones-listar" class="btn btn-volver">Volver</a>

        <h2 ng-show="!isAdding">Agregar <strong>comisión</strong></h2>
        <h2 ng-show="isAdding">Modificar <strong>comisión</strong></h2>
    
        <div class="row">
            <form id="formComision" name="formComision" class="col s12" ng-submit="agregarComision(comision)">
                <div class="row">
                    <div class="input-field col s8 m4">
                        <input class="elementos" id="anio" name="anio" min="1" type="number" class="" ng-model="comision.anio" ng-required="true">
                        <label class="active" for="anio">Año:</label>
                        <p class="advertencia" ng-show="formComision.anio.$error.required && !formComision.anio.$pristine" class="help-block">El año no puede ser vacío</p>
                        <p class="advertencia" ng-show="formComision.anio.$invalid && !formComision.anio.$pristine" class="help-block">El año debe ser numérico</p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 m4">
                        <select id="cuatrimestre" name="cuatrimestre" ng-model="comision.cuatrimestre" ng-required="true">
                            <option value="anual">Anual</option> 
                            <option value="primero">Primero</option> 
                            <option value="segundo">Segundo</option>               
                        </select>
                        <label for="cuatrimestre">Seleccione un cuatrimestre:</label>
                        <p class="advertencia" ng-show="formComision.cuatrimestre.$error.required && !formComision.cuatrimestre.$pristine" class="help-block">Debe seleccionar un período</p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select id="materia" name="materia" ng-model="comision.materia"  ng-required="true">       
                            <option ng-repeat="materia in materias" value="{{materia.id}}">{{materia.nombre}}</option>
                        </select>
                        <label for="materia">Materia:</label>
                        <p class="advertencia" ng-show="formComision.materia.$error.required && !formComision.materia.$pristine" class="help-block">Debe seleccionar una materia</p>
                    </div>
                    <div class="input-field col s6">
                        <select id="profesor" name="profesor" multiple ng-required="true" ng-model="comision.profesores">
                            <option ng-repeat="profesor in profesores" value="{{profesor.id}}-{{profesor.apellido}}, {{profesor.nombre}}">{{profesor.apellido}}, {{profesor.nombre}}</option>
                        </select>
                        <label for="profesor">Profesores:</label><!-- ng-options="profesor as profesor.apellido + ', ' + profesor.nombre for profesor in profesores track by profesor.id" -->
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
                <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formComision.$invalid">
                <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formComision.$invalid">
            </form>
        </div>
    </main>
    
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
        .btn-volver{
            margin-top: 20px;
        }
        .elementos{
            margin: 0 !important;
        }
    </style>