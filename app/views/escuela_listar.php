<main class="listar-container" ng-init="obtenerEscuelas()">

    <a href="#/escuelas-agregar" class="btn btn-agregar">Agregar escuela</a>
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
                <a ng-click="revertirOrden(); sortType = 'nombre'">
                  Nombre
                  <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                  <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                </a>
              </th>
              <th>
                <a ng-click="revertirOrden(); sortType = 'orientacion'">
                  Orientación
                  <span ng-show="sortType == 'orientacion' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                  <span ng-show="sortType == 'orientacion' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                </a>
              </th>
              <th>
                <a ng-click="revertirOrden(); sortType = 'ciudad.nombre'">
                  Ciudad
                  <span ng-show="sortType == 'orientacion' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                  <span ng-show="sortType == 'orientacion' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                </a>
              </th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
          <tr ng-repeat="escuela in escuelas | orderBy:sortType:sortReverse | filter: buscar">
            <td>{{escuela.nombre}}</td>
            <td>{{escuela.orientacion}}</td>
            <td>{{escuela.ciudad.nombre}}</td>
            <td><a title="Editar" href="#/escuelas-modificar/{{escuela.id}}"><i class="listar-iconos material-icons">edit</i></a></td>
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