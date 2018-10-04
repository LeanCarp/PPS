<main class="listar-container" ng-init="obtenerComisiones()">

        <a href="#/comisiones-agregar" class="btn btn-agregar">Agregar comisión</a>
    
        <div class="nav-wrapper">
          <form>
            <div class="row">
              <div class="input-field">
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
                  <a ng-click="revertirOrden(); sortType = 'anio'">
                    Año
                    <span ng-show="sortType == 'anio' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                    <span ng-show="sortType == 'anio' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                  </a>
                </th>
                <th>
                  <a ng-click="revertirOrden(); sortType = 'cuatrimestre'">
                    Cuatrimestre
                    <span ng-show="sortType == 'cuatrimestre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                    <span ng-show="sortType == 'cuatrimestre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                  </a>
                </th>
                <th>
                  <a ng-click="revertirOrden(); sortType = 'nombreMateria'">
                    Materia
                    <span ng-show="sortType == 'nombreMateria' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                    <span ng-show="sortType == 'nombreMateria' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                  </a>
                </th>
                <th>Opciones</th>
            </tr>
          </thead>
      
          <tbody>
            <tr ng-repeat="comision in comisiones | orderBy:sortType:sortReverse | startFrom:currentPage*pageSize | limitTo:pageSize">
              <td>{{comision.anio}}</td>
              <td>{{comision.cuatrimestre}}</td>
              <td>{{comision.materia.nombre}}</td>
              <td><a title="Editar" href="#/comisiones-modificar/{{comision.id}}"><i class="listar-iconos material-icons">edit</i></a>
                  <a href="#/comisiones-ver/{{comision.id}}"><i title="Ver" class="listar-iconos material-icons">search</i></a> </td>
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
        @media screen and (max-width:800px){
          .listar-container{
            width:100% !important;
          }
        }
      </style>