<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data_email = array(
            array(
                'type' => 'email',
                'name' => 'email',
                'class' => 'form-control form-control-user',
                'placeholder' => 'Digite su email'
            ),
            array(
                'type' => 'password',
                'name' => 'password',
                'class' => 'form-control form-control-user',
                'placeholder' => 'Digite su contraseña'
            )
        );
?>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url(); ?>dist/img/datamerge.png" style="width: 50%;">
                    <br><br>
                      <?php if(isset($_GET['error_login'])){
                                if($_GET['error_login'] == 1){
                                    echo "Email Incorrecto";
                                }else{
                                    echo "Password Incorrecto";
                                }
                            }
                      ?>
                  </div>
                    <?= form_open('login/ingresar','class="user" '); ?>
                    <div class="form-group">
                    <?= form_input($data_email[0]); ?>
                    </div>
                    <div class="form-group">
                      <?= form_input($data_email[1]); ?>
                    </div>
                    <?=form_submit("Ingresar",'Ingresar', "class = 'btn btn-primary btn-user btn-block' "); ?>
                  <?=form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/sb-admin-2.min.js"></script>
</body>
</html>
