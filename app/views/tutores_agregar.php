<main class="container">
    
    <a href="#/tutores-listar" class="btn btn-volver">Volver</a>

    <h2 ng-show="!isAdding">Agregar <strong>tutor</strong></h2>
    <h2 ng-show="isAdding">Modificar <strong>tutor</strong></h2>

    <div class="row">
        <form id="formTutor" name="formTutor" class="col s12" ng-submit="agregarTutor(tutor)">
            <div class="row">
                <div class="input-field col s6">
                    <input class="elementos" id="nombre" name="nombre" type="text" ng-model="tutor.nombre" ng-required="true">
                    <label class="active" for="nombre">Nombre</label>
                    <p class="advertencia" ng-show="formTutor.nombre.$error.required && !formTutor.nombre.$pristine" class="help-block">El nombre no puede ser vacío</p>
                </div>
                <div class="input-field col s6">
                    <input class="elementos" id="apellido" name="apellido" type="text" class="" ng-model="tutor.apellido" ng-required="true">
                    <label class="active" for="apellido">Apellido</label>
                    <p class="advertencia" ng-show="formTutor.apellido.$error.required && !formTutor.apellido.$pristine" class="help-block">El apellido no puede ser vacío</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input class="elementos" id="dni" name="dni" type="number" min="1" class="" ng-model="tutor.dni" ng-required="true">
                    <label class="active" for="dni">DNI</label>
                    <p class="advertencia" ng-show="formTutor.dni.$error.required && !formTutor.dni.$pristine" class="help-block">El DNI no puede ser vacío</p>
                    <p class="advertencia" ng-show="formTutor.dni.$invalid && !formTutor.dni.$pristine" class="help-block">El DNI debe ser numérico</p>
                </div>
                <div class="input-field col s6">
                    <input class="elementos" id="email" name="email" type="email" class="" ng-model="tutor.email" ng-required="true">
                    <label class="active" for="email">Email</label>
                    <p class="advertencia" ng-show="formTutor.email.$error.required && !formTutor.email.$pristine" class="help-block">El email no puede ser vacío</p>
                    <p class="advertencia" ng-show="formTutor.email.$invalid && !formTutor.email.$pristine" class="help-block">Ingrese un email correcto</p>
                </div>       
            
                <div class="input-field col s4">
                    <input class="elementos" id="telefono" name="telefono"  min="11111111111"  max="9999999999999"   type="number" class="" ng-model="tutor.telefono"> <!-- No required -->
                    <label class="active" for="icon_telephone">Teléfono</label>
                    <!-- <p class="advertencia" ng-show="formAlumno.telefono.$error.required && !formAlumno.telefono.$pristine" class="help-block">El teléfono no puede ser vacío</p> -->
                    <p class="advertencia" ng-show="formTutor.telefono.$invalid && !formTutor.telefono.$pristine" class="help-block">El teléfono debe ser numérico</p>
                    <p class="advertencia" ng-show="validarTelefono(formTutor.telefono.$viewValue) && !formTutor.telefono.$pristine" class="help-block">Telefono inválido. Formato: XX X XXX XXX-XXXX sin espacios ni guiones. Ej 5493442348688</p>
                </div>
            </div>

            <input type="submit" class="btn" value="Agregar" ng-show="!isAdding" ng-disabled="formTutor.$invalid">
            <input type="submit" class="btn" value="Modificar" ng-show="isAdding" ng-disabled="formTutor.$invalid">
        </form>
    </div>
</main>

<!-- <style>
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