<main class="container" ng-init="obtenerAdministrador(idAdmin)">
    
    <h2>Ver <strong>Perfil</strong> <a href="#/admin-perfil-editar"><i title="Editar" class="listar-iconos material-icons">edit</i></a></h2>
    
    <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <h5>DNI: <strong>{{administrador.username}}</strong></h5>
                    <br>
                    <h5>Nombre: <strong>{{administrador.first_name}}</strong></h5>
                    <br>
                    <h5>Apellido: <strong>{{administrador.last_name}}</strong></h5>
                    <br>
                    <h5>Email: <strong>{{administrador.email}}</strong></h5>
                    <br>
                    <h5>Teléfono: <strong>{{administrador.phone}}</strong></h5>
                    <br>

                    <a title="Cambiar contraseña" href="javascript:void(0)" onclick="location.href=(BASE_URL+'auth/change_password');" class="btn btn-agregar">Cambiar contraseña</a>
                </div>
                <div class="input-field col s6">
                    
                </div>
            </div>
    </div>
</main>