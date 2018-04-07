<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ingresar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="<?php echo BASE_URL()?>assets/css/main.css">
</head>
<body>

  <h1><?php echo lang('login_heading');?></h1>
  <p><?php echo lang('login_subheading');?></p>

  <div id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open("auth/login");?>

    <p>
      <?php echo lang('login_identity_label', 'identity');?>
      <?php echo form_input($identity);?>
    </p>

    <p>
      <?php echo lang('login_password_label', 'password');?>
      <?php echo form_input($password);?>
    </p>

    <p>
      <?php echo lang('login_remember_label', 'remember');?>
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
    </p>


    <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

  <?php echo form_close();?>

  <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</body>
</html>