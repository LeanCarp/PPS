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
        <tr ng-repeat="materia in vm.items | orderBy:sortType:sortReverse | filter: buscar">
          <td>{{materia.nombre}}</td>
          <td>
            <a title="Editar" href="#/materias-modificar/{{materia.id}}"><i class="listar-iconos material-icons">edit</i></a>
            <a title="Ver archivos" href="#/archivo-listar/{{materia.id}}"><i class="listar-iconos material-icons">archive</i></a>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="text-center menuPaginacion">     
        <ul class="pagination"><!-- ng-if="vm.pager.pages.length" -->
            <li ng-class="{disabled:vm.pager.currentPage === 1}">
                <a class="botones" ng-click="vm.setPage(1)">Primero</a>
            </li>
            <li ng-class="{disabled:vm.pager.currentPage === 1}">
                <a class="botones" ng-click="vm.setPage(vm.pager.currentPage - 1)">Anterior</a>
            </li>
            <li ng-repeat="page in vm.pager.pages" ng-class="{active:vm.pager.currentPage === page}">
                <a class="botones indicesPaginacion" ng-click="vm.setPage(page)">{{page}}</a>
            </li>                
            <li ng-class="{disabled:vm.pager.currentPage === vm.pager.totalPages}">
                <a class="botones" ng-click="vm.setPage(vm.pager.currentPage + 1)">Siguiente</a>
            </li>
            <li ng-class="{disabled:vm.pager.currentPage === vm.pager.totalPages}">
                <a class="botones" ng-click="vm.setPage(vm.pager.totalPages)">Último</a>
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
    .botones{
      cursor: pointer;
    }

    .botones:hover{
      background: #333333;
      color: white;
    }

    .pagination li.active a{
      background: #26A69A;
    }

    .menuPaginacion{
      text-align: center;
    }
    @media screen and (max-width:800px){
      .listar-container{
        width:100% !important;
      }
    }
  </style>