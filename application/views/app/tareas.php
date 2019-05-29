<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body id="page-top">
        <div class="container-fluid">
            <center>
                <h1 class="h3 mb-2 text-gray-800">Tareas</h1>
            </center>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center><?= $this->tareas_m->get_nombre_objetivo(); ?></center></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Persona a cargo</th>
                        <th>Fecha inicio</th>
                        <th>Fecha límite</th>
                        <th>Tiempo Transcurrido</th>
                        <th>Progreso</th>
                        <th>Ver bitácora</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Persona a cargo</th>
                        <th>Fecha inicio</th>
                        <th>Fecha límite</th>
                        <th>Tiempo Transcurrido</th>
                        <th>Progreso</th>
                        <th>Ver bitácora</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php 
                        $datos = $this->tareas_m->get_tareas();
                        foreach($datos as $row)
                        {
                          echo ($row->estado != 0) ? "<tr>" : "<tr class='table-success'>";
                          echo ' 
                            <td>'.$row->nombre.'</td>
                            
                            <td>'.(($row->encargado == "*No Asignado*") ? $row->encargado."<br><center><a href='../asignar_tarea/$row->id/".$this->uri->segment(3)."' class='btn btn-info'>Asignar</a>" : $row->encargado).'</center></td>
                            
                            <td>'.$row->fecha_creacion.'</td>
                            
                            <td>'.$row->fecha_limite.'</td>
                            
                            '.$this->tareas_m->progreso($row->tiempo).'
                            
                            <td>'.$this->tareas_m->avance_tarea($row->id).'</td>
                            
                            </td><td><a href="../bitacora/'.$row->id.'" class="btn btn-success">Ver tareas</a></td>  
                            
                          </tr>
                          ';
                        }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>