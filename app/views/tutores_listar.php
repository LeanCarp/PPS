<main class="listar-container" ng-init="obtenerTutores()">

    <a href="#/tutores-agregar" class="btn btn-agregar">Agregar tutor</a>
  
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
              <a ng-click="revertirOrden(); sortType = 'username'">
                DNI
                <span ng-show="sortType == 'username' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                <span ng-show="sortType == 'username' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
              </a>
            </th>
            <th>
              <a ng-click="revertirOrden(); sortType = 'first_name'">
                Nombre
                <span ng-show="sortType == 'first_name' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                <span ng-show="sortType == 'first_name' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
              </a>
            </th>
            <th>
              <a ng-click="revertirOrden(); sortType = 'last_name'">
                Apellido
                <span ng-show="sortType == 'last_name' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                <span ng-show="sortType == 'last_name' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
              </a>
            </th>
            <th>Opciones</th>
        </tr>
      </thead>
  
      <tbody>
        <tr class="collection-item" ng-repeat="tutor in tutores | orderBy:sortType:sortReverse | filter: buscar">
          <td>{{tutor.username}}</td>
          <td>{{tutor.first_name}}</td>
          <td>{{tutor.last_name}}</td>
          <td>
            <a href="#/tutores-modificar/{{tutor.id}}"><i title="Editar" class="listar-iconos material-icons">edit</i></a>
            <a href="#/tutores-ver/{{tutor.id}}"><i title="Ver tutor" class="listar-iconos material-icons">search</i></a>
            <a href="#/tutores-listar-informes/{{tutor.id}}"><i title="Ver informes realizados" class="listar-iconos material-icons">assignment</i></a>
          </td>
         </tr>
      </tbody>
    </table>
  </main>
  
<!--   <style>
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
  </style> -->