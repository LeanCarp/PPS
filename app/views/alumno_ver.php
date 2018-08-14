<main class="container" ng-init="obtenerAlumnos(idAlumno)">
    <a href="#/alumnos-listar" class="btn btn-volver">Volver</a>
     <a href="https://api.whatsapp.com/send?phone={{alumno.phone}}"  target="_blank" class="btn btn-volver">Enviar Mensaje   <i class="fa fa-whatsapp"></i> </a>

    <!--Para el icono de whatsapp-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <h2>{{alumno.first_name}} {{alumno.last_name}}</h2>
    <div class="row">
            <div class="row">
                <div class="input-field col s12">
                         <h5>DNI: <strong>{{alumno.username}}</strong></h5>
                    <br>
                         <h5>Carrera: <strong>{{alumno.carrera}}</strong></h5>
                    <br>
                        <h5>Email: <strong>{{alumno.email}}</strong></h5>
                    <br>
                         <h5>Teléfono: <strong>{{alumno.phone}}</strong></h5>
                    <br>
                        <h5>Ciudad: <strong>{{ciudad.nombre}}</strong>, {{ciudad.pais.nombre}} </h5>
                    <br>
                         <h5>Año de ingreso: <strong>{{alumno.anioIngreso}}</strong></h5>
                    <br>
                         <h5>Escuela: <strong>{{alumno.escuela.nombre}}</strong> - Orientación: <strong>{{alumno.escuela.orientacion}}</strong></h5>
                    <br>
                    <a title="Resetear contraseña" href="javascript:void(0)" ng-click="resetearContrasenia(alumno.id)" class="btn btn-agregar">Resetear contraseña</a>
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