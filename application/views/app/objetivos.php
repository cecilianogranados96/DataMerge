body id="page-top">
        <div class="container-fluid">
            <center>
          <h1 class="h3 mb-2 text-gray-800">Objetivos</h1>
                <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Imprimir</a>
            </center>

          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Objetivos del proyecto</h6>
            <pre>  <?php
            $base = $this->db->database;
            print_r($base);
            ?>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Encargado Principal</th>
                        <th>Nombre</th>
                        <th>Fecha Límite</th>
                        <th>Tareas</th>
                        <th>Ver</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Encargado Principal</th>
                        <th>Nombre</th>
                        <th>Fecha Límite</th>
                        <th>Tareas</th>
                        <th>Ver</th>
                    </tr>
                  </tfoot>
                  <tbody>
                       <?php
                        $datos = $this->objetivos_m->get_objetivos();
                        foreach($datos as $row)
                        {
                          echo '
                          <tr>
                            <td>'.$row->encargado.'</td>
                            <td>'.$row->nombre.'</td>
                            <td>'.$row->fecha_limite.'</td>
                            <td>'.$this->objetivos_m->avance_objetivo($row->id).'</td>
                            <td><a href="tareas/'.$row->id.'" class="btn btn-success">Ver tareas</a></td>
                          </tr>';
                        }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
