<?php $data_registro =
    array(
        array('type' => 'text','name' => 'nombre','placeholder' => 'Digite su nombre completo ','class' => 'form-control form-control-user','value' => nombre_persona()),
        array('type' => 'email','name' => 'email','placeholder' => 'Digite su email','class' => 'form-control form-control-user','value' => email_persona()),
        array('type' => 'password','name' => 'password','placeholder' => 'Digite su contraseña','class' => 'form-control form-control-user')
    );
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cuenta</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 mb-4">
        </div>
        <div class="col-lg-4 mb-4">
            <?= form_open_multipart('login/actualizar',"class = 'user' "); ?>
                <div class="form-group">
                    Nombre:
                    <?= form_input($data_registro[0]); ?>
                </div>
                <div class="form-group">
                    Email:
                    <?= form_input($data_registro[1]); ?>
                </div>
                <div class="form-group">
                    Contraseña:
                    <?= form_input($data_registro[2]); ?>
                </div>
                <?=form_submit("Actualizar",'Actualizar', "class = 'btn btn-primary btn-user btn-block' "); ?>
                <?=form_close(); ?>
        </div>
    </div>
</div>
