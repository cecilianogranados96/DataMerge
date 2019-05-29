<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body id="page-top">
        <div class="container-fluid">
            <center>
          <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
            </center>    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center>Usuarios registrados en el sistema</center></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        $datos = $this->login_m->get_usuarios();
                        foreach($datos as $row)
                        { 
                          echo '
                          <tr> 
                            <td>'.$row->nombre.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->rol.'</td>
                            <td><center><a href="modificar_usuario/'.$row->id_usuario.'" class="btn btn-warning">Editar</a></center></td>
                
                          </tr>';
                        }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>