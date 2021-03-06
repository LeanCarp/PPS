<nav>
        <div class="nav-wrapper menu">
          <a href="#/" class="brand-logo"><img src="assets/img/logo-utn.png" alt=""></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> <!-- Icono menú responsive -->
          <ul class="right hide-on-med-and-down">
              <li><a href="#/foro-alumno" class="">Foro<i class="material-icons right">forum</i></a></li>
            <li><a href="#/alumno-cursadas-listar" class="">Cursadas<i class="material-icons right">class</i></a></li>
             <li><a href="#/alumno-contactos-listar" class="">Contacto<i class="material-icons right">contact_phone</i></a></li>           
              <!-- <li><a class="dropdown-button" data-activates="dropdownConfiguracion">Configuración<i class="material-icons right">menu</i></a></li> -->
              <li><a class="dropdown-button" data-activates="dropdownUsuario"><img src="assets/img/default-user-image.png" alt="" class="circle img-profile-small"><i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
              <!--  <li><a href="#!" class="disabled">Foro</a></li>
              <li><a href="#!" class="disabled">Alumno</a></li>-->
              <li><a href="#/alumno-cursadas-listar" class="">Cursadas<i class="material-icons right">class</i></a></li>
              <li><a href="#/alumno-cursadas-listar" class="">Contacto<i class="material-icons right">contact_phone</i></a></li>  
              <!-- <li><a href="#!" class="disabled">Configuración</a></li>
              <li><a href="#!" class="subitem">Ejemplo</a></li> -->
              <li><a href="#!" class="disabled">Usuario</a></li>
              <li><a href="#/alumno-perfil" class="subitem">Perfil</a></li>
              <li><a href="javascript:void(0)" onclick="location.href=(BASE_URL+'auth/logout');" class="subitem">Salir</a></li>
            </ul>
        </div>
      </nav>    

      <ul id="dropdownUsuario" class="dropdown-content">
        <li><a href="#/alumno-perfil">Perfil</a></li>
        <li class="divider"></li>
        <li><a href="javascript:void(0)" onclick="location.href=(BASE_URL+'auth/logout');">Salir</a></li>
      </ul>
      <ul id="dropdownConfiguracion" class="dropdown-content">
        <li><a href="#!">Ejemplo</a></li>
        <li class="divider"></li>
      </ul>
    
    <script>
        $(document).ready(function () {   
          $(".dropdown-button").dropdown();  
          $(".button-collapse").sideNav();      
        })
      </script>
    
    <style>
      .menu{
        background: #333333;
      }
      #sidenav-overlay{
        z-index: 0;
      }
      .disabled {
        pointer-events: none;
        cursor: default;
        opacity: 0.6;
      }
      .subitem{
        margin-left: 15px;
      }
    </style>