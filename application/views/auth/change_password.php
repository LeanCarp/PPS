<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cambiar contraseña</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="<?php echo BASE_URL()?>assets/css/main.css">
</head>
<body class="body-login">
  <main class="container-login z-depth-2">

<h1><!-- <?php echo lang('change_password_heading');?> -->Cambiar contraseña</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>

      <p>
            <!-- <?php echo lang('change_password_old_password_label', 'old_password');?> -->
            <label for="">Contraseña anterior:</label> <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <!-- <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> --> <br />
            <label for="">Contraseña nueva (al menos 8 caracteres):</label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p>
            <!-- <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> --> <br />
            <label for="">Confirmar contraseña nueva:</label>
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p><!-- <?php echo form_submit('submit', 'Cambiar');?> --> <input type="submit" value="Cambiar" class="btn"></p>

<?php echo form_close();?>

  </main>
</body>
</html>
