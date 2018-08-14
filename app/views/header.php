  <nav>
    <div class="nav-wrapper menu">
      <a href="#/" class="brand-logo"><img src="assets/img/logo-utn.png" alt=""></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> <!-- Icono menú responsive -->
      <ul class="right hide-on-med-and-down">
          <li><a href="#/foro-admin" class="">Foro<i class="material-icons right">forum</i></a></li>
          <li><a href="#/tutores-listar" class="">Tutores<i class="material-icons right">account_box</i></a></li> 
          <li><a href="#/alumnos-listar" class="">Alumnos<i class="material-icons right">group</i></a></li>
          <li><a class="dropdown-button" data-activates="dropdownConfiguracion">Configuración<i class="material-icons right">menu</i></a></li>
          <li><a class="dropdown-button" data-activates="dropdownUsuario"><img src="assets/img/default-user-image.png" alt="" class="circle img-profile-small"><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
          <li><a href="#!" class="disabled">Foro</a></li>
          <li><a href="#/" class="subitem">Administrar</a></li>
          <li><a href="#!" class="disabled">Tutores</a></li>
          <li><a href="#/tutores-listar" class="subitem">Administrar</a></li>
          <li><a href="#!" class="disabled">Alumnos</a></li>
          <li><a href="#/alumnos-listar" class="subitem">Administrar</a></li>
          <li><a href="#!" class="disabled">Configuración</a></li>
          <li><a href="#/materias-listar" class="subitem">Materias</a></li>
          <li><a href="#/profesores-listar" class="subitem">Profesores</a></li>
          <li><a href="#/comisiones-listar" class="subitem">Comisiones</a></li>
          <li><a href="#/escuelas-listar" class="subitem">Escuelas</a></li>
          <li><a href="#/ciudades-listar" class="subitem">Ciudades</a></li>
          <li><a href="#/paises-listar" class="subitem">Países</a></li>
          <li><a href="#!" class="subitem">Perfil</a></li>
          <li><a href="javascript:void(0)" onclick="location.href=(BASE_URL+'auth/logout');" class="subitem">Salir</a></li>
        </ul>
    </div>
  </nav>    
  
  <ul id="dropdownUsuario" class="dropdown-content">
    <li><a href="#/admin-ver">Perfil</a></li>
    <li class="divider"></li>
    <li><a href="javascript:void(0)" onclick="location.href=(BASE_URL+'auth/logout');">Salir</a></li>
  </ul>
  <ul id="dropdownConfiguracion" class="dropdown-content">
    <li><a href="#/materias-listar">Materias</a></li>
    <li><a href="#/profesores-listar">Profesores</a></li>
    <li><a href="#/comisiones-listar">Comisiones</a></li>
    <li><a href="#/escuelas-listar">Escuelas</a></li>
    <li><a href="#/ciudades-listar">Ciudades</a></li>
    <li><a href="#/paises-listar">Países</a></li>
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