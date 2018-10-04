<main id="container" class="container" ng-init="obtenerDatosMultiples()">
        <a href="#/alumnos-listar" class="btn btn-volver">Volver</a>
    
        <h2>Agregar <strong>cursada</strong></h2>
        
        <div class="row">
            <form id="formCursada" name="formCursada" class="col s12" ng-submit="agregarMultiplesCursadas(cursada)">
                <div class="row">
                    <div class="input-field col s12 selects">
                        <select id="comision" name="comision" ng-model="cursada.comision"  ng-required="true"> <!-- ng-options="comision as 'Año: '+comision.anio + '; Cuatrimestre: ' + comision.cuatrimestre + '; Profesores: ' + comision.dicta[0].nombreProfesor for comision in comisiones" -->
                            <option ng-repeat="comision in comisiones" 
                                    ng-selected="infoComision(comision)" 
                                    value="{{comision.id}}">{{comision.materia.nombre}}   Cuatrimestre: {{comision.cuatrimestre}} Año: {{comision.anio}} 
                            </option>
                        </select>
                        <label for="comision">Seleccione una comisión:</label>
                        <p class="advertencia" ng-show="formCursada.comision.$error.required && !formCursada.comision.$pristine" class="help-block">Debe seleccionar una comisión</p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 selects">
                        <select id="estado" name="estado" ng-model="cursada.estado" ng-required="true">
                            <option value="Libre">Libre</option>
                            <option value="Cursando">Cursando</option>
                            <option value="Desaprobado">Desaprobado</option>
                            <option value="Regular">Regular</option>
                            <option value="Promocionado">Promocionado</option>
                            <option value="Aprobado">Aprobado</option>              
                        </select>
                        <label for="comision">Seleccione un estado:</label>
                        <p class="advertencia" ng-show="formCursada.estado.$error.required && !formCursada.estado.$pristine" class="help-block">Debe seleccionar un estado</p>
                    </div>
                    <div class="input-field col s4">
                        <input type="number" id="nota" name="nota" min="1" max="10" maxlength = "2" ng-model="cursada.nota" ng-required="false">
                        <label class="active" for="comision">Ingrese una nota: (No obligatorio)</label>
                    </div>
                </div>
                <div class="row">
                    <h5>Seleccionar <strong>alumnos</strong> para las cursadas</h5>
                    <div class="input-field">
                        <input id="search" type="search"  ng-model="buscar">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                    <div class="input-field col s6 m3">
                        <input id="search" type="search" ng-model="filtro1">
                        <label class="" for="search">Año ingreso</label>
                        <i class="material-icons">close</i>
                    </div>
                    <div class="input-field col s6 m3">
                        <input id="search" type="search" ng-model="filtro2">
                        <label class="" for="search">Carrera</label>
                        <i class="material-icons">close</i>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>
                                <a ng-click="revertirOrden(); sortType = 'dni'">
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
                                <a ng-click="revertirOrden(); sortType = 'nombre'">
                                Nombre
                                <span ng-show="sortType == 'nombre' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                                <span ng-show="sortType == 'nombre' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                                </a>
                            </th>
                            <th>
                                <a ng-click="revertirOrden(); sortType = 'apellido'">
                                Apellido
                                <span ng-show="sortType == 'apellido' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                                <span ng-show="sortType == 'apellido' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                                </a>
                            </th>
                            <th>
                                <a ng-click="revertirOrden(); sortType = ''">
                                Año de ingreso
                                <span ng-show="sortType == 'apellido' && sortReverse == true" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_up</i></span>
                                <span ng-show="sortType == 'apellido' && sortReverse == false" class="fa fa-caret-down"><i class="tiny material-icons">arrow_drop_down</i></span>
                                </a>
                            </th>
                            <th>Seleccionar</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            <tr ng-repeat="alumno in items | orderBy:sortType:sortReverse | filter:buscar | startFrom:currentPage*pageSize | limitTo:pageSize">                           
                                <td>{{alumno.username}}</td>
                                <td>{{alumno.carrera}}</td>
                                <td>{{alumno.first_name}}</td>
                                <td>{{alumno.last_name}}</td>
                                <td>{{alumno.anioIngreso}}</td>
                                <td><input type="checkbox" class="filled-in" id="{{alumno.id}}" value="{{alumno.id}}"  ng-model="selectedList[alumno.id]"/><label for="{{alumno.id}}"></label></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center menuPaginacion">     
                        <ul class="pagination">
                            <li ng-class="{disabled:currentPage == 0}">
                            <a class="botones" ng-click="currentPage=0" ng-disabled="currentPage == 0">Primero</a>
                            </li>
                            <li ng-class="{disabled:currentPage == 0}">
                                <a class="botones" ng-click="currentPage=currentPage-1" ng-disabled="currentPage == 0">Anterior</a>
                            </li>
                            <li class="indicePaginacion">{{currentPage+1}}/{{numberOfPages()}} </li>     
                            <li ng-repeat="num in numberOfPages()"></li>      
                            <li ng-class="{disabled:currentPage >= numberOfPages()}">
                                <a class="botones" ng-click="currentPage=currentPage+1" ng-disabled="currentPage >= numberOfPages()">Siguiente</a> <!-- getData().length/pageSize - 1 -->
                            </li>
                            <li ng-class="{disabled:currentPage >= numberOfPages()-1}">
                                <a class="botones" ng-click="currentPage=numberOfPages()-1" ng-disabled="currentPage >= numberOfPages()-1">Último</a> <!-- getData().length/pageSize - 1 -->
                            </li>
                        </ul>
                    </div>  
                </div>

                <input type="submit" class="btn" value="Agregar" ng-disabled="formCursada.$invalid">
            </form>
        </div>

    </main>
    
    <style>
        .collection li{
            background: #eaeaea !important;
        }
        .collection-item{
            display: flex;
            justify-content: space-between;
        }
        .collection-item p{
            margin: 0;
            padding: 0;
        }
        .botonHorario{
            margin: 17px;
        }
        .selects{
            padding: 0 !important;
        }
    
        .advertencia{
            margin: 0;
            font-size: 12px;
            color: #EA2E49;
        }
        .btn-volver{
                margin-top: 20px;
        }
        .elementos{
            margin: 0 !important;
        }
    </style>