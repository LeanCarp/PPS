<main class="container" ng-init="obtenerActividad()">
    
        <a href="#/actividades-listar/{{idAlumno}}" class="btn btn-volver">Volver</a>
        <h2>Ver <strong>actividad</strong></h2>
    
        <div class="row">
                <div class="row">
                    <div class="col s6">
                        <ul class="browser-default">
                            <li>
                                <h5>Descripción: <strong>{{actividad.descripcion}}</strong></h5>
                            </li>
                            <br>
                            <li>
                                <h5>Fecha:</h5>
                                <ul class="browser-default">
                                    <li><h5>Inicio: <strong>{{actividad.fechaInicio}}</strong> </h5></li>
                                    <li><h5> Fin: <strong>{{actividad.fechaFin}}</strong></h5></li>
                                </ul>
                            </li>
                            <br>
                            <li>    
                                <h5>Horario:</h5>
                                <ul class="browser-default">
                                    <li ng-repeat="hora in actividad.horario"><h5> <strong>{{diaDeSemana(hora.dia)}}</strong> de {{hora.horaInicio}} a {{hora.horaFin}} </h5></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col s6">
                        
                    </div>
                </div>
        </div>
    </main>
    
    <style>
        .btn-volver{
            margin-top: 20px;
        }
    </style>