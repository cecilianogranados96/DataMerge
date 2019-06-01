<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                    <br>
        <br>
        <center>
        <img src="<?php echo base_url(); ?>/dist/img/datamerge.png" style="width: 75%;">
        </center><br>

        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/app/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span></a>
        </li>
             <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/app/">
          <i class="fas fa-fw fa-file-import"></i>
          <span>Importador</span></a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Constructor
        </div>

        <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/app/construir_consulta">
          <i class="fas fa-fw fa-object-ungroup"></i>
          <span>Constructor</span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/app/nuevo_objetivo">
          <i class="fas fa-fw fa-object-ungroup"></i>
          <span>Visualizador</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/app/nueva_tarea">
          <i class="fas fa-fw fa-project-diagram"></i>
          <span>Exportar</span></a>
        </li>


        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Seguridad
        </div>
        <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/app/cuenta">
          <i class="fas fa-fw fa-users-cog"></i>
          <span>Proteger</span></a>
            <a class="nav-link" href="#" data-target="#logoutModal"  data-toggle="modal">
          <i class="fas fa-fw fa-sign-in-alt"></i>
          <span>Salir</span></a>


        </li>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <?= fecha(); ?>
                </div>

                 <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                     <h6>Hola, <?= nombre_persona() ?></h6>
                </span>


            </nav>
