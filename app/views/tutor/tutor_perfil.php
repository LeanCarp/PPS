<main class="container" ng-init="obtenerTutor()">

        <h2>Ver <strong>tutor</strong> <a href="#/tutor-perfil-editar"><i title="Editar" class="listar-iconos material-icons">edit</i></a></h2>
    
        <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                            <h5>DNI: <strong>{{tutor.dni}}</strong></h5>
                            <br>
                            <h5>Nombre: <strong>{{tutor.nombre}}</strong></h5>
                            <br>
                            <h5>Apellido: <strong>{{tutor.apellido}}</strong></h5>
                            <br>
                            <h5>Email: <strong>{{tutor.email}}</strong></h5>
                            <br>
                            <h5>Teléfono: <strong>{{tutor.telefono}}</strong></h5>
                            <br>
                        <a title="Cambiar contraseña" href="javascript:void(0)" onclick="location.href=(BASE_URL+'auth/change_password');" class="btn btn-agregar">Cambiar contraseña</a>
                    </div>
                    <div class="input-field col s6">
                        
                    </div>
                </div>
        </div>
    </main>
    
    <style>
        .btn-volver{
            margin-top: 20px;
        }
    </style>