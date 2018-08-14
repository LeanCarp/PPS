<main class="container" ng-init="obtenerAdministrador(idAdmin)">
    <a href="#/admin-ver" class="btn btn-volver">Volver</a>

    <h2>Modificar <strong>datos de contacto</strong></h2>

    <div class="row">
        <form id="formAdmin" name="formAdmin" class="col s12" ng-submit="modificarAdministrador(administrador)">
            <div class="row">
                <div class="input-field col s6">
                    <input class="elementos" id="email" name="email" type="email" class="" ng-model="administrador.email" ng-required="true">
                    <label class="active" for="email">Email</label>
                    <p class="advertencia" ng-show="formAdmin.email.$error.required && !formAdmin.email.$pristine" class="help-block">El email no puede ser vacío</p>
                    <p class="advertencia" ng-show="formAdmin.email.$invalid && !formAdmin.email.$pristine" class="help-block">Ingrese un email correcto</p>
                </div>
            </div>
            <div class="row">
                    <div class="input-field col s6">
                      <input class="elementos" id="phone" name="phone" min="11111111111"  max="9999999999999" type="number" class="" ng-model="administrador.phone"> <!-- No required -->
                      <label class="active" for="icon_telephone">Teléfono</label>
                      <p class="advertencia" ng-show="validarTelefono(formAdmin.phone.$viewValue) && !formAdmin.phone.$pristine" class="help-block">Telefono inválido. Formato: XX X XXX XXX-XXXX sin espacios ni guiones. Ej 5493442348688</p>
                      <p class="advertencia" ng-show="formAdmin.phone.$invalid && !formAdmin.phone.$pristine" class="help-block">El teléfono debe ser numérico</p>
                    </div>
                  </div>
            <input type="submit" class="btn" value="Modificar" ng-disabled="formAdmin.$invalid">
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
    .btn-volver{
        margin-top: 20px;
    }
    .elementos{
        margin: 0 !important;
    }
</style>