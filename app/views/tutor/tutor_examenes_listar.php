<main class="listar-container" ng-init="obtenerExamenes(idCursada)">
        
        <a href="#/tutor-cursadas/{{idAlumno}}" class="btn btn-volver">Volver</a>
        <h3> <strong>Examenes</strong> de <strong> {{alumno.first_name}} {{alumno.last_name}}</strong> en <strong> {{nombreMateria}}</strong> </h3>
        <div class="nav-wrapper">
            <form>
                <div class="row">
                  <div class="input-field  col s8 m4">
                    <input id="search" type="search" required ng-model="buscar">
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                  </div>
                </div>
            </form>
          </div>
    
          <table>
            <thead>
              <tr>
                  <th>
                      <a ng-click="revertirOrden(); sortType = 'fecha'">
                        Fecha
                        <span ng-show="sortType == 'fecha' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                        <span ng-show="sortType == 'fecha' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                      </a>
                    </th>
                    <th>
                      <a ng-click="revertirOrden(); sortType = 'nota'">
                        Nota
                        <span ng-show="sortType == 'nota' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                        <span ng-show="sortType == 'nota' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                      </a>
                    </th>
                    <th>
                      <a ng-click="revertirOrden(); sortType = 'tipo'">
                        Tipo
                        <span ng-show="sortType == 'tipo' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                        <span ng-show="sortType == 'tipo' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                      </a>
                    </th>
                    <th>
                      <a ng-click="revertirOrden(); sortType = 'descripcion'">
                        Descripción
                        <span ng-show="sortType == 'descripcion' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                        <span ng-show="sortType == 'descripcion' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                      </a>
                    </th>
                    <th>
                      <a ng-click="revertirOrden(); sortType = 'comentario'">
                        Comentario
                        <span ng-show="sortType == 'comentario' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                        <span ng-show="sortType == 'comentario' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                      </a>
                    </th>
              </tr>
            </thead>
    
            <tbody>
              <tr ng-repeat="examen in examenes | orderBy:sortType:sortReverse | filter: buscar">
                <td>{{examen.fecha}}</td>
                <td>{{examen.nota}}</td>
                <td>{{examen.tipo}}</td>
                <td>{{examen.descripcion}}</td>
                <td>{{examen.comentario}}</td>
                <!-- <td><a title="Ver cursada" href="#/cursada-ver/{{cursada.id}}"><i class="listar-iconos material-icons">find_in_page</i></a></td> -->
              </tr>
            </tbody>
          </table>    
    </main>
    
    <style>
        .listar-container{
          margin: 0 auto;
          width: 80% !important;
        }
        .elemento-lista{
          display: flex;
          justify-content: space-between;
        }
        .listar-iconos{
          margin-top: 10px;
          padding: 5px;
        }
        .btn-agregar{
          margin-top: 20px;
          margin-left: 20px;
        }
        .btn-volver{
          margin-top: 20px;
        }
        @media screen and (max-width:800px){
          .listar-container{
            width:100% !important;
          }
        }
      </style>