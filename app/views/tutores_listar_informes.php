<main class="listar-container" ng-init="obtenerInformesTutor()">
    <a href="#/tutores-listar" class="btn btn-volver">Volver</a>
      <h3> <strong>Informes</strong> realizados por <strong> {{tutor.nombre}} {{tutor.apellido}}</strong> </h3>
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
                <a ng-click="revertirOrden(); sortType = 'fecha'">
                  Fecha
                  <span ng-show="sortType == 'fecha' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                  <span ng-show="sortType == 'fecha' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                </a>
              </th>
              <th>Alumno</th>
              <th>Título</th>
              <th>Descripción</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
          <tr ng-repeat="informe in informes | orderBy:sortType:sortReverse | filter: buscar">
            <td>{{informe.fecha}}</td>
            <td>{{informe.usuario.first_name}} {{informe.usuario.last_name}}</td>
            <td>{{informe.titulo}}</td>
            <td>{{informe.descripcion}}</td>
            <td>
              <a title="Eliminar"  style="cursor: pointer;" ng-click="eliminarInforme(informe.id)"  ><i class="listar-iconos material-icons">delete</i></a>
                <!-- <a href="#/informes-modificar/{{informe.id}}"><i title="Editar" class="listar-iconos material-icons">edit</i></a> -->
            </td> 
          </tr>
        </tbody>
      </table>
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
    .btn-volver{
            margin-top: 20px;
    }
    @media screen and (max-width:800px){
      .listar-container{
        width:100% !important;
      }
    }
  </style> -->