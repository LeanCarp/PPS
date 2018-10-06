<main class="listar-container" ng-init="obtenerContactos()">
   <h3> <strong>Contactos </strong> </h3>


 <table>
    <thead>
      <tr>
          <th>
            <a ng-click="revertirOrden(); sortType = 'funcion'">
              Función
              <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
              <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
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
          <th>Teléfono</th>
           <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      <tr class="collection-item" ng-repeat="persona in personas | orderBy:sortType:sortReverse | filter:buscar | startFrom:currentPage*pageSize | limitTo:pageSize">
        <td>{{persona.funcion}}</td>
        <td>{{persona.first_name}}</td>
        <td>{{persona.last_name}}</td>
        <td>{{persona.phone}}</td>
        <td>
         <a href="https://api.whatsapp.com/send?phone={{persona.phone}}"  target="_blank" class="btn btn-volver">Enviar Mensaje   <i class="fa fa-whatsapp"></i> </a>
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