<main class="listar-container" ng-init="obtenerArchivosMateria()">
  <a href="#/alumno-cursadas-listar" class="btn btn-agregar">Volver</a>
   <h3> <strong>Archivos </strong> de la materia <strong> {{nombreMateria}} </strong> </h3>
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
          <th>Título</th>
          <th>Descripción</th>
          <th>Abrir</th>
      </tr>
    </thead>

    <tbody>
      <tr ng-repeat="archivo in archivos ">
        <td>{{archivo.titulo}}</td>
        <td>{{archivo.descripcion}}</td>
        <td>
          <a href="{{ (archivo.idCategoriaArchivo=='1' ? archivo.ruta : archivo.ruta_web) }}" target="_blank">
            <i title="Link" ng-if=" archivo.idCategoriaArchivo=='1' " class="material-icons">insert_link</i>
            <i title="Archivo" ng-if=" archivo.idCategoriaArchivo=='2' " class="material-icons">file_download</i>
          </a>
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