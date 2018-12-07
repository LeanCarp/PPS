<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ingresar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="<?php echo BASE_URL()?>assets/css/main.css">
</head>
<body class="body-login">
  <main class="container-login z-depth-2">
    <div class="row">
      <div class="col s12">
        <h1 class="title-login"><img src="<?php echo BASE_URL().'assets/img/logo-login-utn.png'?>" alt=""></h1>
        <p>Por favor, ingresa tu usuario y contraseña.</p>

        <div id="infoMessage"><?php echo $message;?></div>
      </div>
    </div>

    <?php echo form_open("auth/login");?>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="identity" value="" id="identity">
          <label for="identity" class="active">Usuario</label>
        </div>
        <div class="input-field col s12">
          <input type="password" name="password" value="" id="password">
          <label for="password" class="active">Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="col s5">
          <input type="submit" name="submit" value="Ingresar" class="waves-effect waves-light btn">
        </div>
        <div class="col s7">
          <input type="checkbox" name="remember" value="1" id="remember" class="filled-in" >
          <label for="remember" class="checkbox-login">Recordarme</label>
        </div>
      </div>
    <?php echo form_close();?>

    <div class="row"> 
      <div class="col s12">
        <a href="forgot_password">¿Olvidaste tu contraseña?</a>
      </div>
    </div>
  </main>
</body>
</html>