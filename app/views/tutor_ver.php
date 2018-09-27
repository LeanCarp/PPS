<main class="container" ng-init="obtenerTutor()">
    
    <a href="#/tutores-listar" class="btn btn-volver">Volver</a>
    <a href="https://api.whatsapp.com/send?phone={{tutor.phone}}"  target="_blank" class="btn btn-volver">Enviar Mensaje   <i class="fa fa-whatsapp"></i> </a>

    <!--Para el icono de whatsapp-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <h2> <strong>Perfil</strong></h2>

    <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <h5>DNI: <strong>{{tutor.username}}</strong></h5>
                    <br>
                    <h5>Nombre: <strong>{{tutor.first_name}}</strong></h5>
                    <br>
                    <h5>Apellido: <strong>{{tutor.last_name}}</strong></h5>
                    <br>
                    <h5>Email: <strong>{{tutor.email}}</strong></h5>
                    <br>
                    <h5>Teléfono: <strong>{{tutor.phone}}</strong></h5>
                    <br>
                    <a title="Resetear contraseña" href="javascript:void(0)" ng-click="resetearContrasenia(tutor.id)" class="btn btn-agregar">Resetear contraseña</a>
                </div>
            </div>
    </div>
</main>