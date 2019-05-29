<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body id="page-top">
        <div class="container-fluid">
            <center>
          <h1 class="h3 mb-2 text-gray-800">Bitácora</h1>
            </center>    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center><?= $this->tareas_m->get_nombre_tarea(); ?></center></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Registrador</th>
                        <th>Nombre</th>
                        <th>Fecha de registro</th>
                        <th>Descripción</th>
                        <th>Porcentaje Total</th>
                        <th>Evidencias</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Registrador</th>
                        <th>Nombre</th>
                        <th>Fecha de registro</th>
                        <th>Descripción</th>
                        <th>Porcentaje Total</th>
                        <th>Evidencias</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        $datos = $this->tareas_m->get_bitacora();
                        foreach($datos as $row)
                        { 
                          echo '
                          <tr> 
                            <td>'.$row->encargado.'</td>
                            <td>'.$row->nombre.'</td>
                            <td>'.$row->fecha_registro.'</td>
                            <td>'.$row->descripcion.'</td>
                            <td>'.$this->tareas_m->avance_bitacora($row->porcentaje).'</td>
                            <td>'.$this->tareas_m->print_evidencias($row->evidencias).'</td>
                          </tr>';
                        }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>