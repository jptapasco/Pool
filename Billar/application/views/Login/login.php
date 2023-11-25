<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ingresar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="https://www.civinext.com/whale.aspx" class="h1"><b>Inova</b>Byte</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresa para empezar tu sesión</p>

      <?php echo form_open('Login/validar_datos'); ?>
        <div class="input-group mb-3">
            <?php
                $data = [
                    'name' => 'correo',
                    'required' => true,
                    'type' => 'email',
                    'placeholder' => 'Ingrese su correo electronico',
                    'class' => 'form-control',
                ];
                echo form_input($data);
            ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <?php
            $data = [
                'name' => 'passw',
                'required' => true,
                'type' => 'password',
                'placeholder' => 'Ingrese la contraseña',
                'class' => 'form-control',
            ];
            echo form_input($data);
        ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <?php echo form_submit('mysubmit', 'Sign In', 'class="btn btn-primary btn-block"'); ?>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close(); ?>
      <div class="row mt-3">
            <div class="col">
              <?php
                $alert = $this->session->flashdata('alert');
                if (!empty($alert)) {
                    ?>
                    <div class="alert alert-<?php echo $alert['color']; ?>" role="alert">
                        <?php echo $alert['mensaje']; ?>
                    </div>
                    <?php
                }
              ?>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>
</body>
</html>