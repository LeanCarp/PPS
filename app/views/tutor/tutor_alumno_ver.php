<main class="container" ng-init="obtenerAlumno(idAlumno)">
    <a href="#/tutor-alumnos" class="btn btn-volver">Volver</a>

    <h2>Ver <strong>Alumno</strong></h2>

    <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <h5>DNI: <strong>{{alumno.username}}</strong></h5>
                    <br>
                    <h5>Carrera: <strong>{{alumno.carrera}}</strong></h5>
                    <br>
                    <h5>Nombre: <strong>{{alumno.first_name}}</strong></h5>
                    <br>
                    <h5>Apellido: <strong>{{alumno.last_name}}</strong></h5>
                    <br>
                    <h5>Email: <strong>{{alumno.email}}</strong></h5>
                    <br>
                    <h5>Teléfono: <strong>{{alumno.phone}}</strong></h5>
                    <br>
                    <h5>Año de ingreso: <strong>{{alumno.anioIngreso}}</strong></h5>
                    <br>
                    <h5>Escuela: <strong>{{alumno.escuela.nombre}}</strong> - Orientación: <strong>{{alumno.escuela.orientacion}}</strong></h5>
                    <br>
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