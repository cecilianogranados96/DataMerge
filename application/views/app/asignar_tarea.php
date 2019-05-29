<?php $data_email = array(
            array(
                'type' => 'text',
                'name' => 'nombre_objetivo',
                'placeholder' => 'Digite el nombre de la tarea',
                'class' => 'form-control form-control-user',
            ),
            array(
                'type' => 'date',
                'name' => 'fecha_limite',
                'placeholder' => 'Seleccione la fecha limite para la tarea',
                'class' => 'form-control form-control-user',
            )
        );
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Asignar tarea</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 mb-4">
        </div>
        <div class="col-lg-4 mb-4">
            <?= form_open('profesores/procesar_asignar_tarea/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'',"class = 'user' "); ?>
                <div class="form-group">
                    Nombre de la tarea:<br>
                    <h2><?= $this->tareas_m->get_nombre_tarea(); ?></h2>
                </div>
                <?= form_hidden(array('url'=>'nueva_tarea')); ?>
                <div class="form-group">
                    Responsable a asignar:
                    <select name='responsable' class="form-control select">
                        <?php
                            $datos = $this->tareas_m->get_estudiantes();
                            foreach($datos as $row)
                            { 
                              echo '<option value="'.$row->id_usuario.'">'.$row->nombre.'</option>';
                            }
                        ?>
                 </select>
                </div>
                <?=form_submit("Registrar",'Registrar', "class = 'btn btn-primary btn-user btn-block' "); ?>
            <?=form_close(); ?>
        </div>
    </div>
</div>