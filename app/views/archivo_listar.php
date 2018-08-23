<main class="listar-container" ng-init="initialize()">
  <a href="#/materias-listar" class="btn btn-agregar">Volver</a>
  <a href="#/archivo-agregar" class="btn btn-agregar">Agregar Archivo</a>

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
          <th><a ng-click="revertirOrden(); sortType = 'titulo'">
                Título
                <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
              </a>
          </th>
          <th><a ng-click="revertirOrden(); sortType = 'descripcion'">
                Descripción
                <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
              </a>
          </th>
          <th>Abrir</th>
          <th>Opciones</th>
      </tr>
    </thead>

    <tbody>
      <tr ng-repeat="archivo in archivos | orderBy:sortType:sortReverse | filter: buscar">
        <td>{{archivo.titulo}}</td>
        <td>{{archivo.descripcion}}</td>
        <td>
          <a href="{{ (archivo.idCategoriaArchivo=='1' ? archivo.ruta : archivo.ruta_web) }}" target="_blank">
            <i title="Link" ng-if=" archivo.idCategoriaArchivo=='1' " class="material-icons">insert_link</i>
            <i title="Archivo" ng-if=" archivo.idCategoriaArchivo=='2' " class="material-icons">file_download</i>
          </a>
        </td>
        <td>
            <a href="#/archivo-agregar/{{archivo.id}}"><i title="Editar" class="listar-iconos material-icons">edit</i></a>
        </td>
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
  @media screen and (max-width:800px){
    .listar-container{
      width:100% !important;
    }
  }
</style>