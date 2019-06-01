<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Importar tareas de Asana</h1>
    </div>
    <div class="row">
       <div class="col-lg-4 mb-4">
        </div>
            <div class="col-lg-4 mb-4">
                <?= form_open_multipart('app/proceso_importacion',"class = 'user' "); ?>
                    <div class="form-group">
                        Seleccione un archivo:
                        <input type="file" name="archivo" size="20" class="form-control" multiple/>
                    </div>
                    <?=form_submit("Enviar",'Enviar', "class = 'btn btn-primary btn-user btn-block' "); ?>
                <?=form_close(); ?>
            </div>
    </div>
</div>