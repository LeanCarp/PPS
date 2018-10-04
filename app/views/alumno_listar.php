<main class="listar-container" ng-init="getAlumnos()">

  <a href="#/alumnos-agregar" class="btn btn-agregar">Agregar alumno</a>
  <a href="#/cursadas-agregar-multiples" class="btn btn-agregar">Generar múltiples cursadas</a>

  <div class="nav-wrapper">
    <form>
        <div class="row">
            <div class="input-field col s8 m4">
                <input id="search" type="search" required ng-model="buscar" ng-change="activarBusqueda();">
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
            <a ng-click="revertirOrden(); sortType = 'username'">
              DNI
              <span ng-show="sortType == 'dni' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
              <span ng-show="sortType == 'dni' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
            </a>
          </th>
          <th>
            <a ng-click="revertirOrden(); sortType = 'carrera'">
              Carrera
              <span ng-show="sortType == 'carrera' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
              <span ng-show="sortType == 'carrera' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
            </a>
          </th>
          <th>
            <a ng-click="revertirOrden(); sortType = 'first_name'">
              Nombre
              <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
              <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
            </a>
          </th>
          <th>
            <a ng-click="revertirOrden(); sortType = 'last_name'">
              Apellido
              <span ng-show="sortType == 'apellido' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
              <span ng-show="sortType == 'apellido' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
            </a>
          </th>
          <th>Opciones</th>
      </tr>
    </thead>

    <tbody>
      <tr class="collection-item" ng-repeat="alumno in alumnos | orderBy:sortType:sortReverse | filter:buscar | startFrom:currentPage*pageSize | limitTo:pageSize">
        <td>{{alumno.username}}</td>
        <td>{{alumno.carrera}}</td>
        <td>{{alumno.first_name}}</td>
        <td>{{alumno.last_name}}</td>
        <td>
          <a title="Cursadas" href="#/cursadas-listar/{{alumno.id}}"><i class="listar-iconos material-icons">class</i></a>
          <a title="Ver informes" href="#/informes-listar/{{alumno.id}}"><i class="listar-iconos material-icons">library_books</i></a>
          <a title="Ver Actividades" href="#/actividades-listar/{{alumno.id}}"><i class="listar-iconos material-icons">watch_later</i></a>
          <a href="#/alumnos-modificar/{{alumno.id}}"><i title="Editar" class="listar-iconos material-icons">edit</i></a>
          <a href="#/alumnos-ver/{{alumno.id}}"><i title="Ver" class="listar-iconos material-icons">search</i></a></td>
        </tr>
    </tbody>
  </table>

    <div class="text-center menuPaginacion">     
        <ul class="pagination">
            <li ng-class="{disabled:currentPage == 0}">
              <a class="botones" ng-click="currentPage=0" ng-disabled="currentPage == 0">Primero</a>
            </li>
            <li ng-class="{disabled:currentPage == 0}">
                <a class="botones" ng-click="currentPage=currentPage-1" ng-disabled="currentPage == 0">Anterior</a>
            </li>
            <li class="indicePaginacion">{{currentPage+1}}/{{numberOfPages()}} </li>     
            <li ng-repeat="num in numberOfPages()"></li>      
            <li ng-class="{disabled:currentPage >= numberOfPages()-1}">
                <a class="botones" ng-click="currentPage=currentPage+1" ng-disabled="currentPage >= numberOfPages()-1">Siguiente</a> <!-- getData().length/pageSize - 1 -->
            </li>
            <li ng-class="{disabled:currentPage >= numberOfPages()-1}">
                <a class="botones" ng-click="currentPage=numberOfPages()-1" ng-disabled="currentPage >= numberOfPages()-1">Último</a> <!-- getData().length/pageSize - 1 -->
            </li>
        </ul>
    </div>              
</main>