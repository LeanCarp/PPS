<main class="listar-container" ng-init="obtenerMaterias()">

    <a href="#/materias-agregar" class="btn btn-agregar">Agregar materia</a>

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
              <a ng-click="revertirOrden(); sortType = 'nombre'">
                Nombre
                <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
              </a>
            </th>
            <th>Opciones</th>
        </tr>
      </thead>
  
      <tbody>
        <tr ng-repeat="materia in materias | orderBy:sortType:sortReverse | filter:buscar | startFrom:currentPage*pageSize | limitTo:pageSize">
          <td>{{materia.nombre}}</td>
          <td>
            <a title="Editar" href="#/materias-modificar/{{materia.id}}"><i class="listar-iconos material-icons">edit</i></a>
            <a title="Ver archivos" href="#/archivo-listar/{{materia.id}}"><i class="listar-iconos material-icons">archive</i></a>
          </td>
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
            <li ng-class="{disabled:currentPage >= numberOfPages()}">
                <a class="botones" ng-click="currentPage=currentPage+1" ng-disabled="currentPage >= numberOfPages()">Siguiente</a> <!-- getData().length/pageSize - 1 -->
            </li>
            <li ng-class="{disabled:currentPage >= numberOfPages()-1}">
                <a class="botones" ng-click="currentPage=numberOfPages()-1" ng-disabled="currentPage >= numberOfPages()-1">Último</a> <!-- getData().length/pageSize - 1 -->
            </li>
        </ul>
    </div>     

  </main>