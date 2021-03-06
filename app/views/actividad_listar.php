<main class="listar-container" ng-init="obtenerActividades()">
    <a href="#/alumnos-listar" class="btn btn-volver">Volver</a>
    <a href="#/actividad-agregar/{{idAlumno}}" class="btn btn-agregar">Agregar actividad</a>
         <h3> <strong>Actividades</strong> de <strong> {{alumno.first_name}} {{alumno.last_name}}</strong> </h3>
    <div class="nav-wrapper">
        <form>
          <div class="input-field">
            <input id="search" type="search" required ng-model="buscar">
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>

      <table>
        <thead>
          <tr>
              <th>
                <a ng-click="revertirOrden(); sortType = 'descripcion'">
                  Descripción
                  <span ng-show="sortType == 'descripcion' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                  <span ng-show="sortType == 'descripcion' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                </a>
              </th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
          <tr ng-repeat="actividad in actividades | orderBy:sortType:sortReverse | filter: buscar">
            <td>{{actividad.descripcion}}</td>
            <td>
              <a title="Ver actividad" href="#/actividades-ver/{{actividad.id}}"><i class="listar-iconos material-icons">find_in_page</i></a>
               <a title="Eliminar"  style="cursor: pointer;" ng-click="eliminarActividad(actividad.id)"  ><i class="listar-iconos material-icons">delete</i></a>
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
    .btn-volver{
            margin-top: 20px;
    }
    @media screen and (max-width:800px){
      .listar-container{
        width:100% !important;
      }
    }
  </style>