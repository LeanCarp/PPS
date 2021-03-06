<main class="listar-container" ng-init="obtenerPaises()">

        <a href="#/paises-agregar" class="btn btn-agregar">Agregar país</a>
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
              <tr ng-repeat="pais in paises | orderBy:sortType:sortReverse | filter: buscar">
                <td>{{pais.nombre}}</td>
                <td>
                    <a title="Editar" href="#/paises-modificar/{{pais.id}}"><i class="listar-iconos material-icons">edit</i></a>
                    <a title="Eliminar"  style="cursor: pointer;" ng-show="pais.ciudad==undefined" ng-click="eliminarPais(pais.id)"  ><i class="listar-iconos material-icons">delete</i></a>
                </td>
              </tr>
            </tbody>
          </table>
    </main>
    
<!--     <style>
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
      </style> -->