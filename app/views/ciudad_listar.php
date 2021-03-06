<main class="listar-container" ng-init="obtenerCiudades()">

    <a href="#/ciudades-agregar" class="btn btn-agregar">Agregar ciudad</a>
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
              <th>Nombre</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
          <tr ng-repeat="ciudad in ciudades">
            <td>{{ciudad.nombre}}</td>
            <td><a title="Editar" href="#/ciudades-modificar/{{ciudad.id}}"><i class="listar-iconos material-icons">edit</i></a></td>
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