<main class="container" ng-init="obtenerComision()">
    
        <a href="#/comisiones-listar" class="btn btn-volver">Volver</a>
        <h2>Ver <strong>comisión</strong></h2>
    
        <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <h5>Año: <strong>{{comision.anio}}</strong></h5>
                        <br>
                        <h5>Cuatrimestre: <strong>{{comision.cuatrimestre}}</strong></h5>
                        <br>
                        <h5>Materia: <strong>{{comision.materia.nombre}}</strong></h5>
                        <br>
                        <h5>Profesores:</h5>
                        <ul>
                            <li ng-repeat="profesor in comision.profesores"><h5>- <strong>{{profesor}}</strong></h5></li>
                        </ul>
                        <h5>Horario:</h5>
                        <ul>
                            <li ng-repeat="hora in horarios"><h5>- <strong>{{diaDeSemana(hora.dia)}}</strong> de {{hora.horaInicio}} a {{hora.horaFin}} </h5></li>
                        </ul>
                    </div>
                    <div class="input-field col s6">
                        
                    </div>
                </div>
        </div>
    </main>
    
<!--     <style>
        .btn-volver{
            margin-top: 20px;
        }
    </style> -->