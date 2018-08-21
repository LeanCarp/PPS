<main class="listar-container" ng-init="obtenerAlumnos()"> 
   <h3> Listado de <strong>Alumnos</strong> </h3>
        <div class="nav-wrapper">
          <form>
              <div class="row">
                  <div class="input-field col s8 m4">
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
                    <a ng-click="revertirOrden(); sortType = 'dni'">
                      DNI
                      <span ng-show="sortType == 'dni' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                      <span ng-show="sortType == 'dni' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                    </a>
                  </th>
                  <th>
                    <a ng-click="revertirOrden(); sortType = 'nombre'">
                      Nombre
                      <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                      <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                    </a>
                  </th>
                  <th>
                    <a ng-click="revertirOrden(); sortType = 'apellido'">
                      Apellido
                      <span ng-show="sortType == 'apellido' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                      <span ng-show="sortType == 'apellido' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                    </a>
                  </th>
                <th>Opciones</th>
            </tr>
          </thead>
      
          <tbody>
            <tr ng-repeat="alumno in alumnos | orderBy:sortType:sortReverse | filter: buscar">
              <td>{{alumno.username}}</td>
              <td>{{alumno.first_name}}</td>
              <td>{{alumno.last_name}}</td>
              <td>
                <a title="Cursadas" href="#/tutor-cursadas/{{alumno.id}}"><i class="listar-iconos material-icons">class</i></a>
                <a title="Ver informes" href="#/tutor-informes/{{alumno.id}}"><i class="listar-iconos material-icons">library_books</i></a>
                <a title="Ver actividades" href="#/tutor-actividades/{{alumno.id}}"><i class="listar-iconos material-icons">watch_later</i></a>
                <a title="Ver alumno" href="#/tutor-alumnos-ver/{{alumno.id}}"><i title="Ver" class="listar-iconos material-icons">search</i></a></td>
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
        th, td{
          text-align: center;
        }
        @media screen and (max-width:800px){
          .listar-container{
            width:100% !important;
          }
        }
      </style>