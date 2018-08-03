<main class="container" ng-init="obtenerDatosAlumnoAgregar()">
    
    <a href="#/alumnos-listar" class="btn btn-volver">Volver</a>

    <h2 ng-show="!isAdding">Agregar <strong>alumno</strong></h2>
    <h2 ng-show="isAdding">Modificar <strong>alumno</strong></h2>

    <div class="row">
        <form id="formAlumno" name="formAlumno" class="col s12" ng-submit="agregarAlumno(alumno)">
            <div class="row">
                <div class="input-field col s6">
                    <input class="elementos" id="nombre" name="nombre" type="text" ng-model="alumno.nombre" ng-required="true">
                    <label class="active" for="nombre">Nombre</label>
                    <p class="advertencia" ng-show="formAlumno.nombre.$error.required && !formAlumno.nombre.$pristine" class="help-block">El nombre no puede ser vacío</p>
                </div>
                <div class="input-field col s6">
                    <input class="elementos" id="apellido" name="apellido" type="text" class="" ng-model="alumno.apellido" ng-required="true">
                    <label class="active" for="apellido">Apellido</label>
                    <p class="advertencia" ng-show="formAlumno.apellido.$error.required && !formAlumno.apellido.$pristine" class="help-block">El apellido no puede ser vacío</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input class="elementos" id="dni" name="dni" type="number" min="1" class="" ng-model="alumno.dni" ng-required="true">
                    <label class="active" for="dni">DNI</label>
                    <p class="advertencia" ng-show="formAlumno.dni.$error.required && !formAlumno.dni.$pristine" class="help-block">El DNI no puede ser vacío</p>
                    <p class="advertencia" ng-show="formAlumno.dni.$invalid && !formAlumno.dni.$pristine" class="help-block">El DNI debe ser numérico</p>
                </div>
                <div class="input-field col s6">
                    <input class="elementos" id="email" name="email" type="email" class="" ng-model="alumno.email" ng-required="true">
                    <label class="active" for="email">Email</label>
                    <p class="advertencia" ng-show="formAlumno.email.$error.required && !formAlumno.email.$pristine" class="help-block">El email no puede ser vacío</p>
                    <p class="advertencia" ng-show="formAlumno.email.$invalid && !formAlumno.email.$pristine" class="help-block">Ingrese un email correcto</p>
                </div>       
            
                <div class="input-field col s4">
                    <input class="elementos" id="telefono" name="telefono"  min="11111111111"  max="9999999999999"   type="number" class="" ng-model="alumno.telefono"> <!-- No required -->
                    <label class="active" for="icon_telephone">Teléfono</label>
                    <!-- <p class="advertencia" ng-show="formAlumno.telefono.$error.required && !formAlumno.telefono.$pristine" class="help-block">El teléfono no puede ser vacío</p> -->
                    <p class="advertencia" ng-show="formAlumno.telefono.$invalid && !formAlumno.telefono.$pristine" class="help-block">El teléfono debe ser numérico</p>
                    <p class="advertencia" ng-show="validarTelefono(formAlumno.telefono.$viewValue) && !formExamen.telefono.$pristine" class="help-block">Telefono inválido. Formato: XX X XXX XXX-XXXX sin espacios ni guiones. Ej 5493442348688</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input class="elementos" id="anioIngreso" name="anioIngreso" min="2000 "max="2100" type="number" class="" ng-model="alumno.anioIngreso" ng-required="true">
                    <label class="active" for="anioIngreso">Año de ingreso</label>
                    <p class="advertencia" ng-show="formAlumno.anioIngreso.$error.required && !formAlumno.anioIngreso.$pristine" class="help-block">El año de ingreso no puede ser vacío</p>
                    <p class="advertencia" ng-show="formAlumno.anioIngreso.$invalid && !formAlumno.anioIngreso.$pristine" class="help-block">Ingrese un año correcto</p>
                </div>
                <div class="input-field col s6 selects">
                    <select id="carrera" name="carrera" ng-model="alumno.carrera" ng-required="true">
                        <option value="" disabled selected>Seleccione una carrera:</option>
                        <option value="ISI">Ingeniería en Sistemas de Información</option>
                        <option value="CIVIL">Ingeniería Civil</option>
                        <option value="ELECTRO">Ingeniería Electromecánica</option>
                        <option value="LOI">Licenciatura en Organización Industrial</option>
                        <option value="ING">Ingresante</option>                    
                    </select>         
                    <p class="advertencia" ng-show="formAlumno.carrera.$error.required && !formAlumno.carrera.$pristine" class="help-block">Debe seleccionar una carrera</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2 selects">
                        <select id="pais" name="pais" ng-model="alumno.pais" ng-change="cargarCiudades(alumno.pais)" ng-required="true"> <!-- No required -->
                            <option ng-repeat="pais in paises" value="{{pais.id}}">{{pais.nombre}}</option>
                        </select>
                        <label for="pais">Seleccione un pais:</label>
                        <!-- <p class="advertencia" ng-show="formAlumno.escuela.$error.required && !formAlumno.escuela.$pristine" class="help-block">Debe seleccionar una escuela</p> -->
                </div>
                <div class="input-field col s3 selects">
                        <select id="ciudad" name="ciudad" ng-model="alumno.ciudad" ng-change="cargarColegios(alumno.ciudad)" ng-required="true"> <!-- No required -->
                            <option ng-repeat="ciudad in ciudades" value="{{ciudad.id}}">{{ciudad.nombre}} </option>
                        </select>
                        <label for="ciudad">Seleccione una ciudad:</label>
                        <!-- <p class="advertencia" ng-show="formAlumno.escuela.$error.required && !formAlumno.escuela.$pristine" class="help-block">Debe seleccionar una escuela</p> -->
                </div>
                <div class="input-field col s6 selects">
                        <select id="escuela" name="escuela" ng-model="alumno.escuela"  ng-required="true"> <!-- No required -->
                            <option ng-repeat="colegio in colegios" value="{{colegio.id}}"> {{colegio.nombre}} (Orientación: {{colegio.orientacion}})</option>
                        </select>
                        <label for="escuela">Seleccione una escuela:</label>
                        <!-- <p class="advertencia" ng-show="formAlumno.escuela.$error.required && !formAlumno.escuela.$pristine" class="help-block">Debe seleccionar una escuela</p> -->
                </div>
            </div>
            <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formAlumno.$invalid">
            <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formAlumno.$invalid">
        </form>
    </div>
</main>

<style>
    .selects{
        padding:  0 .75rem;


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
      
          