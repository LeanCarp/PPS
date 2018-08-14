<main class="container" ng-init="">
        <a href="#/informes-listar/{{idAlumno}}" class="btn btn-volver">Volver</a>

        <h2>Informe de <strong>Alumno</strong></h2>
    
        <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <h4>Título: <strong>{{informe.titulo}}</strong></h4>
                        <br>
                        <h5>Autor: <strong>{{informe.autor.last_name}}, {{informe.autor.first_name}}</strong></h5>
                        <br>
                        <h6>Descripción: {{informe.descripcion}}</h6>
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