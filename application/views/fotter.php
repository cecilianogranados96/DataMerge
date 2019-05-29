    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Realmente desea salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/login/salir">Salir</a>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/sb-admin-2.min.js"></script>

  <script src="<?php echo base_url(); ?>dist/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/demo/chart-pie-demo.js"></script>

  <script src="<?php echo base_url(); ?>dist/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>dist/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/demo/datatables-demo.js"></script>
</body>
</html>