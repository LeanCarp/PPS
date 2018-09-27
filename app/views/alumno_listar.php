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
    <!-- <ul>
      <li ng-show="busqueda" ng-repeat="alumno in alumnos | filter: buscar">{{alumno.username}}</li>
    </ul> -->
    <table ng-show="busqueda">
      <thead>
        <tr>
            <th>DNI</th>
            <th>Carrera</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr class="collection-item"  ng-repeat="alumno in alumnos | filter: buscar">
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
  </div>

  <table ng-show="!busqueda">
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
      <tr class="collection-item" ng-repeat="alumno in vm.items | orderBy:sortType:sortReverse">
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

<!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
  <div class="text-center menuPaginacion" ng-show="!busqueda">     
        <!-- pager -->
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

<!-- <style>
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
</style> -->