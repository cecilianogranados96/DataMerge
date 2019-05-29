<?php $data_email = array(
            array(
                'type' => 'text',
                'name' => 'nombre_objetivo',
                'placeholder' => 'Digite el nombre del objetivo',
                'class' => 'form-control form-control-user',
            ),
            array(
                'type' => 'date',
                'name' => 'fecha_limite',
                'placeholder' => 'Seleccione la fecha límite para la tarea',
                'class' => 'form-control form-control-user',
            )
        );
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nuevo Objetivo</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Imprimir</a>
    </div>
    <div class="row">
       <div class="col-lg-4 mb-4">
        </div>
            <div class="col-lg-4 mb-4">
                <?= form_open('profesores/registrar_objetivo',"class = 'user' "); ?>
                    <div class="form-group">
                        Nombre de la tarea:
                        <?= form_input($data_email[0]); ?>
                    </div>
                    <div class="form-group">
                        Fecha límite para el objetivo: 
                        <?= form_input($data_email[1]); ?>
                    </div>
                    <?= form_hidden(array('url'=>'nuevo_objetivo')); ?>
                    <div class="form-group">
                        Descripción de la tarea: 
                        <?= form_textarea("descripcion_objetivo","",'class="form-control"'); ?>
                    </div>
                    <?=form_submit("Registrar",'Registrar', "class = 'btn btn-primary btn-user btn-block' "); ?>
                <?=form_close(); ?>
            </div>
    </div>
</div>